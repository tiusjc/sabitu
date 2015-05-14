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

    $('#form-button-save').hide();
   
  //  $("a.image-thumbnail img").attr({src:"x"});

});