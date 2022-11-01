$(document).ready(function(){
   // inicio de sesión 
   $("#frmLogin").on('submit',function(e){
      e.preventDefault();
      var campos = $("#frmLogin").serialize()+"&accion=iniciaSesion";
      $("#mensaje").html('');
      $.ajax({
         url: 'login.php',
         type: 'POST',
         dataType: 'json',
         data: campos,
         beforeSend:function(){
            $("#loading").html('<div id="preview-area" class=""><div class="dots-loader" id="Spinner">Loading...</div></div>');
         },
         success:function(data){
            $("#loading").html("");
            if (!data.ErrorStatus) {
               location.href=data.UrlDestino;
            }else{
               $("#mensaje").html('<div class="alert alert-danger " id="altLogin">\
                                    <button type="button" class="close" data-dismiss="alert">\
                                       <i class="ace-icon fa fa-times"></i>\
                                    </button>\
                                    <small>'+data.Msj+'</small>\
                                 </div>');
               $("#txtUsuario").focus();
            } 
         },
         error:function(){
            $("#loading").html("");
            $("#mensaje").html('<div class="alert alert-danger " id="altLogin">\
                                 <button type="button" class="close" data-dismiss="alert">\
                                    <i class="ace-icon fa fa-times"></i>\
                                 </button>\
                                 <small>Error al intentar comunicarse con el servidor.</small>\
                              </div>');
            $("#txtUsuario").focus();
         }
      });
   });

});
