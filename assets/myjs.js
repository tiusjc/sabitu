$( document ).ready(function() {

  // ------------------------------------------------------------------------
  // REGRAS PARA VALIDAR CAMPOS NO CADASTRO DOS USUÁRIOS
  // EX: CEP: 99.999-999
  // ------------------------------------------------------------------------
  $("#field-cpf").inputmask("mask", {"mask": "999.999.999-99",showMaskOnFocus: true});
  $("#field-foneFixo").inputmask("mask", {"mask": "+99 (99) 9999-9999",showMaskOnFocus: true });

  if( $("#field-foneFixo").val() =="" ){
      $("#field-foneFixo").val(55);
  }

  $("#field-foneCel").inputmask("mask", {"mask": "+99 (99) 99999-9999",showMaskOnFocus: true });

  if( $("#field-foneCel").val() =="" ){
    $("#field-foneCel").val(55);
  }

  $("#field-cep").inputmask("mask", {"mask": "99.999-999",showMaskOnFocus: false,removeMaskOnSubmit:true });
  $("#field-notaPoscomp").inputmask("mask", {"mask": "[9]9.9",showMaskOnFocus: true });
  $("#field-anoPoscomp").inputmask("mask", {"mask": "9999",showMaskOnFocus: true });
  $("#field-email").inputmask('Regex', { regex: "[a-zA-Z0-9._%-]+@[a-zA-Z0-9-]+\\.[a-zA-Z]+\\.[a-zA-Z]{2,4}" });

  // COLOCAR placeholder NOS CAMPOS DO FORMULÁRIO DO USUÁRIO
  $("#field-type").change(function(){
      switch( $("#field-type").val() ){
        case  "INT":
         $("#field-size").attr("placeholder", "11").blur();
         break;
        case  "VARCHAR":
         $("#field-size").attr("placeholder", "100").blur();
         break;
        case  "ENUM":
         $("#field-size").attr("placeholder", "'MASCULINO','FEMININO'").blur();
         break;
        case  "SET":
         $("#field-size").attr("placeholder", "'ATIVO','INATVO'").blur();
         break;
        case  "DECIMAL":
         $("#field-size").attr("placeholder", "10,2").blur();
         break;
        default:
         $("#field-size").attr("placeholder", "Deixe vazio").blur();
         break;
      }
  });


  // ------------------------------------------------------------------------------------------------------------------------
  // REGRAS PARA O COMBOBOX COM A AS OPÇÕES DE FORMULÁRIO NO FORMULÁRIO DE LOGIN
  // ------------------------------------------------------------------------------------------------------------------------
  $("#form_nome").attr('value',$("#form_id option:selected").html());

  $("#form_id").change(function(){
    $("#form_nome").attr('value',$("#form_id option:selected").html());
  });

  // ------------------------------------------------------------------------------------------------------------------------
  // REGRAS PARA COLOCAR OS CAMPOS DOS FORMULÁRIOS EM 2 COLUNAS NO grocery_crud
  // ------------------------------------------------------------------------------------------------------------------------
  $('div.form-field-box').each( function(index, value) {

    if(index % 2 == 0){
        $(this).addClass(' '+index+' ');
    } else {
        $(this).addClass(' '+index-1+' ');
    }
  });

  $('div.form-field-box').each(function(index, value){
         $( '.'+index).wrapAll( "<div class='row' />");
  });

  $( '.form-field-box' ).wrap( "<div class='col-md-6'></div>" );

  // REGRAS PARA ESCONDER O BOTÃO SALVAR NOS FORMULÁRIOS
  $('#form-button-save').hide();

  $('.actions a > span.ui-button-text').html("&nbsp;");

  // ------------------------------------------------------------------------
  // REGRAS PARA ADICIONAR UM BOTÃO + AO LADO DOS CAMPOS UM-PARA-MUITO NOS FORMULÁRIOS
  // EX: OPÇÕES [+]
  // ------------------------------------------------------------------------
  if( window.location.href.indexOf("form_cadastro/form/add/") >= 0){

    $('div.form-input-box').each(function(index, value){
      var strhtml = $.trim($(this).html());
      var strhref = window.location.hostname;

      strhtml = strhtml.replace('Please add','Por favor adicione');
      strhtml = strhtml.replace('first','primeiro');

      var strid = $(this).attr('id').substring(0,$(this).attr('id').indexOf("_"));

      if( strhtml.substring(0,9) == 'Por favor'){
        $(this).html(strhtml+'<br><a class="add_button ui-button ui-widget" href="http://'+strhref+'/sabitu/umpara/index/'+ strid +'"><div style="height:32px;border-radius: 0px" class="btn btn-primary"><span class="glyphicon glyphicon-plus read-icon Mff75d76a"></span></div></span></a>');
      }

      if( strhtml.substring(0,7) == '<select'){
        $('#'+strid +'_input_box').after('<a style="border-top-left-radius: 0px;border-bottom-left-radius: 0px;" class="add_button ui-button ui-widget" href="http://'+strhref+'/sabitu/umpara/index/'+ strid +'"><div  style="height:32px;border-radius: 0px;" class="btn btn-primary"><span class="glyphicon glyphicon-plus read-icon Mff75d76a"></span></div></a>');
      }
    });
    $( 'a.add_button' ).wrap( "<div style='float:left;width:25px;height:30px'>");
  }

  // ------------------------------------------------------------------------
  // REGRAS PARA COLOCAR O NOME DA TABELA APÓS O TEXTO ADICIONAR NO CADASTRO DE CAMPOS UM-PARA-MUITOS
  // EX: ADICIONAR <TABELA>
  // ------------------------------------------------------------------------
  if( window.location.href.indexOf("umpara/index/") >= 0){
    strhref = window.location.href;
    strhref = strhref.substring(strhref.lastIndexOf('/')+1);
    strtext = $('.ui-button-text').html();
    strtext = strtext.replace('0',strhref);
    $('.datatables-add-button a span.ui-button-text').html(strtext);
  }

  $('.datatables-add-button span.ui-button-icon-primary.ui-icon.ui-icon-circle-plus').addClass('btn btn-info glyphicon glyphicon-plus');
  $('.datatables-add-button span.ui-button-icon-primary.ui-icon.ui-icon-circle-plus').removeClass('ui-button-icon-primary ui-icon ui-icon-circle-plus');


  // $('tfoot tr th a span.ui-button-text').html( $('tfoot tr th a span.ui-button-text').html().replace('Limpar','') );

  // ------------------------------------------------------------------------
  // REGRAS PARA OS CADASTRO DE CAMPOS
  // ------------------------------------------------------------------------
  if( window.location.href.indexOf("campos/index/") >= 0){
    strregras = $.trim($('div#Regras_display_as_box.form-display-as-box').html());

    regrastxt =
    '<span id="lgreater_4" style="display:none">Maior que <input  id="greater_4" class="numregras form-control" name="rules" type="text" maxlength="20" style="width:20px;height:20px;padding:2px 2px 2px 2px;font-size:11px;margin-bottom:2px"></span>'+
    '<span id="lmenorque_6" style="display:none">Menor que <input  id="menorque_6" class="numregras form-control" name="rules" type="text" maxlength="20" style="width:20px;height:20px;padding:2px 2px 2px 2px;font-size:11px;margin-bottom:2px"></span>'+
    '<span id="lmax_7" style="display:none">Máx <input        id="max_7"      class="numregras form-control" name="rules" type="text" maxlength="20" style="width:20px;height:20px;padding:2px 2px 2px 2px;font-size:11px;margin-bottom:2px"></span>'+
    '<span id="lmin_8" style="display:none">Min <input        id="min_8"      class="numregras form-control" name="rules" type="text" maxlength="20" style="width:20px;height:20px;padding:2px 2px 2px 2px;font-size:11px;margin-bottom:2px"></span>'+
    '<span id="lexa_3" style="display:none">Exatamente <input id="exa_3"      class="numregras form-control" name="rules" type="text" maxlength="20" style="width:20px;height:20px;padding:2px 2px 2px 2px;font-size:11px;margin-bottom:2px"></span>';

    $('div#Regras_display_as_box.form-display-as-box').html(strregras + regrastxt);

    var xTriggered = 1;
    var idcamposel;
    var poscamposel;

    $( ".numregras" ).keydown(function( event ) {


      if ( event.which == 37 ) {
        xTriggered=0;
      }

      if ( event.which == 39 ) {
        xTriggered+=5;
      }

      if ( event.which == 38 ) {
        xTriggered--;
      }

      if ( event.which == 40 ) {
        xTriggered++;
      }

      $(this).attr('value', xTriggered);


      // ------------------------------------------------------------------------------------------------------------------------
      // REGRAS PARA O CAMPOS REGRAS DE VALIDAÇÃO NO FORMULÁRIO DE CAMPOS
      // ------------------------------------------------------------------------------------------------------------------------
      idcamposel    = $(this).attr('id');
      posbecamposel = idcamposel.indexOf('_');
      becamposel    = idcamposel.substring(0,posbecamposel);

      poscamposel   = idcamposel.indexOf('_')+1;
      idcamposel = idcamposel.substring(poscamposel);
      idcampoval = $(this).attr('value');

      // VERIFICA SE A REGRA JÁ ESTÁ PRESENTE SENÃO INSERE A MESMA
      $( "ul.chzn-choices li" ).each(function( index, element ) {

        if($(this).is("#field_Regras_chzn_c_"+idcamposel)){
          regraconteudo = $("#field_Regras_chzn_c_"+idcamposel+ ">span").html();
          posregraconteudo = regraconteudo.indexOf('[');
          if(posregraconteudo > 0){
            regrasubstitu = regraconteudo.substring(posregraconteudo);
            regraconteudo = regraconteudo.replace(regrasubstitu,'');
          }

          // $('#l'+idcamposel).show();
          $("#field_Regras_chzn_c_"+idcamposel+ ">span").html(regraconteudo+"["+idcampoval+"]");
        }else{
        //  $(".search-field").before('<li class="search-choice" id="field_Regras_chzn_c_'+idcamposel+'"><span>'+becamposel+'['+idcampoval+']</span><a href="javascript:void(0)" class="search-choice-close" rel="'+idcamposel+'"></a></li>');
        }
      });
      $("ul.chzn-choices").change(function(){
        alert('alterou');
      });
    });
  }
});
