$(document).ready(function(){
	
})
//Guardado de Datos - Formulario de Registro 
function guardarDatos(){
    var idCliente   =   $('#idCliente').val();
    var nombre      =   $('#nombre').val();
    var apellido    =   $('#apellido').val();
    var email       =   $('#email').val();
    var telefono    =   $('#telefono').val();
    var comentario  =   $('#comentario').val();
    
    var emailRegex = /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;
    if(nombre.length == 0 ){
        Swal.fire(
            'Avertencia!',
            'El campo nombre se encuentra vacio',
            'warning'
        )
    }else if(apellido.length == 0 ){
        Swal.fire(
            'Avertencia!',
            'El campo apellido se encuentra vacio',
            'warning'
        )
    }else if(email.length == 0 ){
        Swal.fire(
            'Avertencia!',
            'El campo email se encuentra vacio',
            'warning'
        )
    }else if(!emailRegex.test(email) ){
        Swal.fire(
            'Avertencia!',
            'Correo electrónico inválido',
            'warning'
        )
    }else if(telefono.length == 0 ){
        Swal.fire(
            'Avertencia!',
            'El campo teléfono se encuentra vacio',
            'warning'
        )
    }else if(telefono.length != 7 ){
        Swal.fire(
            'Avertencia!',
            'El campo teléfono debe contar con 7 caracteres',
            'warning'
        )
    }else if(comentario.length == 0 ){
        Swal.fire(
            'Avertencia!',
            'El campo comentario se encuentra vacio',
            'error'
        )
    }else{
        if(idCliente == ''){
            var accion      =   'guardarCliente';
            $.ajax({
                type: "POST",
                dataType:"html",
                url: 'crtDashboard.php',
                data:{
                    'nombre'        :   nombre,
                    'apellido'      :   apellido,
                    'email'         :   email,
                    'telefono'      :   telefono,
                    'comentario'    :   comentario,
                    'accion'        :   accion
                },
                success: function(data) {
                    Swal.fire(
                        'Buen Trabajo!',
                        data,
                        'success'
                    )
    
                    location.href=('../../site/dashboard/dashboard')
                }
             });
        }else{
            var accion      =   'editarCliente';
            $.ajax({
                type: "POST",
                dataType:"html",
                url: 'crtDashboard.php',
                data:{
                    'idCliente'     :   idCliente,
                    'nombre'        :   nombre,
                    'apellido'      :   apellido,
                    'email'         :   email,
                    'telefono'      :   telefono,
                    'comentario'    :   comentario,
                    'accion'        :   accion
                },
                success: function(data) {
                    Swal.fire(
                        'Correcto!',
                        data,
                        'success'
                    )
    
                   location.href=('../../site/dashboard/dashboard')
                }
             });
        }
        
    }

  

}

//Edicion de datos del Cliente
function editarCliente(idCliente){
    var accion = 'consultarCliente'

    $.ajax({
        type: "POST",
        dataType:"html",
        url: 'crtDashboard.php',
        data:{
            'idCliente'     :   idCliente,
            'accion'        :   accion
        },
        success: function(data) {
            var data =  JSON.parse(data);
            
            $('#idCliente').val(data.id);
            $('#nombre').val(data.firstname);
            $('#apellido').val(data.lastname);
            $('#email').val(data.email);
            $('#telefono').val(data.phone);
            $('#comentario').val(data.commentary);

        }
     });



}

//Eliminar Cliente
function eliminarCliente(idCliente){

    Swal.fire({
        title: 'Estas Seguro?',
        text: "No podras revertir esta accion!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, Eliminar!',
        cancelButtonText: 'Cancelar',
      }).then((result) => {
        if (result.value) {
            $.ajax({
                type: "POST",
                dataType:"html",
                url: 'crtDashboard.php',
                data:{
                    'idCliente'        :   idCliente,
                    'accion'        :   'eliminarCliente'
                },
                success: function(data) {
                    
                    Swal.fire(
                        'Buen Trabajo!',
                        data,
                        'success'
                    )
        
                    location.href=('../../site/dashboard/dashboard')
                }
             });
        }
      })



   
}   

