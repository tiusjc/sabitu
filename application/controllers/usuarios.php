<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

  class Usuarios extends MY_Controller {

    function __construct(){

      parent::__construct();
      $this->load->model('form_cadastro_model');

      $this->session->set_userdata( 'check_id', $this->usuario_id );
      $this->output->enable_profiler(TRUE);
    }


    public function index(){

      $this->crud->set_table('usuarios');

      if (!$this->adm){
         $this->crud->where('id',$this->usuario_id);
         $this->crud->unset_add();
         $this->crud->unset_print();
         $this->crud->unset_export();
         $this->crud->unset_delete();
      }

      $this->crud->set_rules('cpf'      ,'cpf'     ,'required|callback_valid_cpf|callback_unique[usuarios.cpf]');
      $this->crud->set_rules('cep'      ,'cep'     ,'required|callback_valid_campo[8]');
      $this->crud->set_rules('foneFixo' ,'foneFixo','required|callback_valid_campo[12]');
      $this->crud->set_rules('foneCel'  ,'foneCel' ,'required|callback_valid_campo[13]');

      $this->crud->required_fields('nome' , 'sexo','cpf','rg','email','endereco','bairro','cidade','uf','cep','estadoCivil','foneFixo','FoneCel');
      $this->crud->columns('nome','email','foneFixo','foneCel','dataCadastro');

      $this->crud->callback_before_update(array($this, '_prepare_field'));
      $this->crud->callback_before_insert(array($this, '_prepare_field'));

      $this->crud->field_type( 'senha', 'hidden');
      $this->crud->field_type( 'dataCadastro', 'hidden');


      $this->load->vars($this->crud->render());
      $this->load->view( 'gerenciar');
    }

    /**
  	 * Unique
  	 *
  	 * Verifica se o valor já está cadastrado no banco
  	 * unique[users.login] retorna FALSE se o valor postado já estiver no campo login da tabela users
  	 * unique[users.login.10] retorna FALSE se o valor postado já estiver no campo login da tabela users, desde que o id seja diferente de 10.
  	 * 						isso é útil quando for atualizar os dados
  	 * unique[users.city.10:id_cidade] retorna FALSE se o valor postado já estiver no campo city da tabela users, desde que o id_cidade seja diferente de 10.
  	 *     						se não for passado o valor após o : será usado o id.
  	 * @access	public
  	 * @param	string - dados que será buscado
  	 * @param	string - campo, tabela e id
  	 *
  	 * @return	bool
  	 */
  	function unique($str = '', $field = '')
  	{
  		$CI =& get_instance();

  		$res = explode('.', $field, 3);

  		$table	= $res[0];
  		$column	= $res[1];

  		$CI->form_validation->set_message('unique', 'O %s informado não está disponível.');


  		$CI->db->select('COUNT(*) as total');
  		$CI->db->where($column, $str);

  		if( isset($res[2]) )
  		{
  			$res2 = explode(':', $res[2], 2);
  			$ignore_value = $res2[0];

  			if( isset($res2[1]) )
  				$ignore_field = $res2[1];
  			else
  				$ignore_field = 'id';

  			$CI->db->where($ignore_field . ' !=', $ignore_value);
  		}

  		$total = $CI->db->get($table)->row()->total;
  		return ($total > 0) ? FALSE : TRUE;
  	}

        /**
         *
         * valid_cpf
         *
         * Verifica CPF é válido
         * @access	public
         * @param	string
         * @return	bool
         */
        function valid_cpf($cpf)
        {
            $CI =& get_instance();

            $CI->form_validation->set_message('valid_cpf', 'O %s informado não é válido.');

            $cpf = preg_replace('/[^0-9]/','',$cpf);

            if(strlen($cpf) != 11 || preg_match('/^([0-9])\1+$/', $cpf))
            {
                return false;
            }

            // 9 primeiros digitos do cpf
            $digit = substr($cpf, 0, 9);

            // calculo dos 2 digitos verificadores
            for($j=10; $j <= 11; $j++)
            {
                $sum = 0;
                for($i=0; $i< $j-1; $i++)
                {
                    $sum += ($j-$i) * ((int) $digit[$i]);
                }

                $summod11 = $sum % 11;
                $digit[$j-1] = $summod11 < 2 ? 0 : 11 - $summod11;
            }

            return $digit[9] == ((int)$cpf[9]) && $digit[10] == ((int)$cpf[10]);
        }


    function valid_campo($campo,$tamanho){
      $CI =& get_instance();
      $CI->form_validation->set_message('valid_campo', 'O %s informado não é válido.');

      $campo = preg_replace('/[^0-9]/','',$campo);

      if( strlen($campo) != $tamanho || preg_match('/^([0-9])\1+$/', $campo )){
        return false;
      }
      return true;
    }

    public function _prepare_field( $array_post ) {
      if($this->crud->getState() == 'update' || $this->crud->getState() == 'add') {
        $array_post['dataCadastro'] = date('Y-m-d H:i:s');
      }

      return $array_post;
    }

    public function after_delete( $primary_key ) {
       $this->session->set_userdata( 'inscricao_id', 0 );
       $this->inscricao_id = 0;
       return $this->db->insert('user_logs', array('usuario_id' => $this->usuario_id,'form_id' => $primary_key,'action'=>'delete', 'data' => date('Y-m-d H:i:s')));
    }
  }
