function ajaxConsulta(Url,Type,DataType,Datos){
	var resultado;
	$.ajax({
      url:Url,
      type:Type,
      dataType:DataType,
      async: false,
      data:Datos,
      beforeSend:function(){
         $("#loading").html('<div id="preview-area" class=""><div class="dots-loader" id="Spinner">Loading...</div></div>');
      },
      success:function(data){
         $("#loading").html("");
         resultado = data;
      },
      error:function(){
         $("#loading").html("");
         resultado = {ErrorStatus:"true", Error:"003", Msj:"Error al intentar comunicarse con el servidor."};
      }
   });
   return resultado;
}