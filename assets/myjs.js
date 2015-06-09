$( document ).ready(function() {

   $("#field-cpf").inputmask("mask", {"mask": "999.999.999-99",showMaskOnFocus: true});
   $("#field-foneFixo").inputmask("mask", {"mask": "+99 (99) 9999-9999",showMaskOnFocus: true });

   if( $("#field-foneFixo").val() =="" ){
      $("#field-foneFixo").val(55);
   }
   $("#field-foneCel").inputmask("mask", {"mask": "+99 (99) 99999-9999",showMaskOnFocus: true });
   if( $("#field-foneCel").val() =="" ){
    $("#field-foneCel").val(55);
   }

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


   $("#field-cep").inputmask("mask", {"mask": "99.999-999",showMaskOnFocus: false,removeMaskOnSubmit:true });
   $("#field-notaPoscomp").inputmask("mask", {"mask": "[9]9.9",showMaskOnFocus: true });
   $("#field-anoPoscomp").inputmask("mask", {"mask": "9999",showMaskOnFocus: true });

   $("#field-email").inputmask('Regex', { regex: "[a-zA-Z0-9._%-]+@[a-zA-Z0-9-]+\\.[a-zA-Z]+\\.[a-zA-Z]{2,4}" });
   //$("#field-emailInstitucional").inputmask('Regex', { regex: "[a-zA-Z0-9._%-]+@[a-zA-Z0-9-]+\\.[a-zA-Z]+\\.[a-zA-Z]{2,4}" });
   //$("#field-placa").inputmask("mask", {"mask": "AAA-9999",showMaskOnFocus: true });
   //$("#field-ano").inputmask("mask", {"mask": "9999",showMaskOnFocus: true });


   $("#form_nome").attr('value',$("#form_id option:selected").html());

   $("#form_id").change(function(){
      $("#form_nome").attr('value',$("#form_id option:selected").html());
   });

   $('div.form-field-box').each( function(index, value) {

     if(index % 2 == 0){
      $(this).addClass(' '+index+' ');
     }else{
      $(this).addClass(' '+index-1+' ');
     }


    });
    $('div.form-field-box').each(function(index, value){
         $( '.'+index).wrapAll( "<div class='row' />");
    });

    $( '.form-field-box' ).wrap( "<div class='col-md-6'></div>" );
    // $( '.form-field-box' ).wrap( "<div class='form-group'><div class='input-group'></div></div>");


    $('#form-button-save').hide();

  //  $("a.image-thumbnail img").attr({src:"x"});

  $('.actions a > span.ui-button-text').html("&nbsp;");

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
  strhref = window.location.href;
  strhref = strhref.substring(strhref.lastIndexOf('/')+1);
  strtext = $('.ui-button-text').html();
  strtext = strtext.replace('0',strhref);
  $('.datatables-add-button a span.ui-button-text').html(strtext);
});
