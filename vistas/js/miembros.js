/* 
*subiendo la foto del miembro
*/
$(".nuevaFotoMiembro").change(function(){

	var imagen = this.files[0];
	console.log(imagen);
	
	/*=============================================
  	VALIDAMOS EL FORMATO DE LA IMAGEN SEA JPG O PNG
  	=============================================*/

  	if(imagen["type"] != "image/jpeg" && imagen["type"] != "image/png"){

  		$(".nuevaFotoMiembro").val("");

  		 swal({
		      title: "Error al subir la imagen",
		      text: "¡La imagen debe estar en formato JPG o PNG!",
		      type: "error",
		      confirmButtonText: "¡Cerrar!"
		    });

  	}else if(imagen["size"] > 2000000){

  		$(".nuevaFotoMiembro").val("");

  		 swal({
		      title: "Error al subir la imagen",
		      text: "¡La imagen no debe pesar más de 2MB!",
		      type: "error",
		      confirmButtonText: "¡Cerrar!"
		    });

  	}else{

  		var datosImagen = new FileReader;
  		datosImagen.readAsDataURL(imagen);

  		$(datosImagen).on("load", function(event){

  			var rutaImagen = event.target.result;

  			$(".previsualizarM").attr("src", rutaImagen);

  		})

  	}
})


/* 
*tabla miembros
*/
$('.tablaMiembros').DataTable({
    "ajax": "ajax/membresias/tabla-miembros.ajax.php?perfil="+$("#perfilOculto").val(),
    "deferRender": true,
    "retrieve": true,
    "processing": true,
    "order": [[0, "asc"]],
    "language": {
			"sProcessing":     "Procesando...",
			"sLengthMenu":     "Mostrar _MENU_ registros",
			"sZeroRecords":    "No se encontraron resultados",
			"sEmptyTable":     "Ningún dato disponible en esta tabla",
			"sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
			"sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0",
			"sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
			"sInfoPostFix":    "",
			"sSearch":         "Buscar:",
			"sUrl":            "",
			"sInfoThousands":  ",",
			"sLoadingRecords": "Cargando...",
			"oPaginate": {
			"sFirst":    "Primero",
			"sLast":     "Último",
			"sNext":     "Siguiente",
			"sPrevious": "Anterior"
			},
			"oAria": {
				"sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
				"sSortDescending": ": Activar para ordenar la columna de manera descendente"
			}
    }    
  });

/*
*EDITAR MIEMBRO
*/
$(".tablaMiembros").on("click", ".btnEditarMiembro", function () {

    var idMiembro = $(this).attr("idMiembro");
	//console.log(idMiembro)

    var datos = new FormData();
    datos.append("idMiembro", idMiembro);

    $.ajax({

        url: "ajax/miembros.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (respuesta) {

			//console.log(respuesta);

			$("#editarEmpresa").val(respuesta["id_empresa"]);
			$("#editarEmpresa").selectpicker("refresh");

			$("#idMiembro").val(respuesta["id_miembro"]);
            $("#editarNombre").val(respuesta["nombre_completo"]);
            $("#editarDocumento").val(respuesta["documento"]);
			$("#editarCelular").val(respuesta["celular"]);
			$("#editarEmail").val(respuesta["correo"]);
			$("#editarRedSocial").val(respuesta["id_red_social"]);
			$("#editarPerfil").val(respuesta["usuario_red_social"]);
			$("#fotoMiembroActual").val(respuesta["foto"]);

			if(respuesta["foto"] != ""){

				$(".previsualizarM").attr("src", respuesta["foto"]);

			}

			

        }

    })

})

*
/*
*Eliminar miembro
*/
$(".tablaMiembros").on("click", ".btnEliminarMiembro", function(){

	var idMiembro = $(this).attr("idMiembro");
	var fotoMiembro = $(this).attr("fotoMiembro");
	var documento = $(this).attr("documento");
	console.log(idMiembro,fotoMiembro,documento);
  
	swal({
	  title: '¿Está seguro de borrar el miembro?',
	  text: "¡Si no lo está puede cancelar la accíón!",
	  type: 'warning',
	  showCancelButton: true,
	  confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		cancelButtonText: 'Cancelar',
		confirmButtonText: 'Si, borrar miembro!'
	}).then(function(result){
  
	  if(result.value){
  
		window.location = "index.php?ruta=miembros&idMiembro="+idMiembro+"&documento="+documento+"&fotoMiembro="+fotoMiembro;
  
	  }
  
	})
  
  })
  
/* 
*Activar Miembro
*/
$(".tablaMiembros").on("click", ".btnActivarMiembro", function(){

	var idMiembro = $(this).attr("idMiembro");
	var estadoMiembro = $(this).attr("estadoMiembro");

	var datos = new FormData();
 	datos.append("activarId", idMiembro);
  	datos.append("activarMiembro", estadoMiembro);

  	$.ajax({

	  url:"ajax/miembros.ajax.php",
	  method: "POST",
	  data: datos,
	  cache: false,
      contentType: false,
      processData: false,
      success: function(respuesta){
		  console.log(respuesta)

      	if(window.matchMedia("(max-width:767px)").matches){
		
      		 swal({
		      	title: "El usuario ha sido actualizado",
		      	type: "success",
		      	confirmButtonText: "¡Cerrar!"
		    	}).then(function(result) {
		        
		        	if (result.value) {

		        	window.location = "miembros";

		        }

		      });


		}
      }

  	})

  	if(estadoMiembro == 0){

  		$(this).removeClass('btn-success');
  		$(this).addClass('btn-danger');
  		$(this).html('Inactivo');
  		$(this).attr('estadoMiembro',1);

  	}else{

  		$(this).addClass('btn-success');
  		$(this).removeClass('btn-danger');
  		$(this).html('Activado');
  		$(this).attr('estadoMiembro',0);

  	}

})