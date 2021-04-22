$('.tablaTipoMembresias').DataTable({
    "ajax": "ajax/membresias/tabla-tipo-membresias.ajax.php?perfil="+$("#perfilOculto").val(),
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
/*=============================================
EDITAR TIPO DE MEMBRESIA
=============================================*/
$(".tablaTipoMembresias").on("click", ".btnEditarTipoMembresia", function () {

    var idTipoMembresia = $(this).attr("idTipoMembresia");

    var datos = new FormData();
    datos.append("idTipoMembresia", idTipoMembresia);

    $.ajax({

        url: "ajax/membresias.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (respuesta) {

            $("#idTipo").val(respuesta["id_tipo_membresia"]);
            $("#editarTipo").val(respuesta["nombre_membresia"]);
            
            $("#editarEmpresa").val(respuesta["id_empresa"]);
            $("#editarEmpresa").selectpicker("refresh");
			
        }

    })

})


/*=============================================
ELIMINAR TIPO MEMBRESIA
=============================================*/
$(".tablaTipoMembresias").on("click", ".btnEliminarTipoMembresia", function(){

	var idTipoMembresia = $(this).attr("idTipoMembresia");
	
	swal({
        title: '¿Está seguro de borrar el tipo de membresia?',
        text: "¡Si no lo está puede cancelar la acción!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, borrar tipo de membresia!'
      }).then(function(result){
        if (result.value) {
          
            window.location = "index.php?ruta=tipomembresias&idTipoMembresia="+idTipoMembresia;
        }

  })

})

$('.tablaPrecioMembresias').DataTable({
  "ajax": "ajax/membresias/tabla-precio-membresias.ajax.php?perfil="+$("#perfilOculto").val(),
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

/*=============================================
EDITAR PRECIO DE MEMBRESIA
=============================================*/
$(".tablaPrecioMembresias").on("click", ".btnEditarPrecioMembresia", function () {

  var idPrecioMembresia = $(this).attr("idPrecioMembresia");

  var datos = new FormData();
  datos.append("idPrecioMembresia", idPrecioMembresia);

  $.ajax({

      url: "ajax/membresias.ajax.php",
      method: "POST",
      data: datos,
      cache: false,
      contentType: false,
      processData: false,
      dataType: "json",
      success: function (respuesta) {

          $("#idPrecio").val(respuesta["id_precio_membresia"]);
          $("#editarDescripcionPrecio").val(respuesta["nombre_precio_membresia"]);
          $("#editarTipoMembresia").val(respuesta["id_tipo_membresia"]);
          $("#editarTipoMembresia").selectpicker("refresh");
          $("#editarPrecio").val(respuesta["precio"]);
    
      }

  })

})


/*=============================================
ELIMINAR PRECIO MEMBRESIA
=============================================*/
$(".tablaPrecioMembresias").on("click", ".btnEliminarPrecioMembresia", function(){

var idPrecioMembresia = $(this).attr("idPrecioMembresia");

swal({
      title: '¿Está seguro de borrar el precio de membresia?',
      text: "¡Si no lo está puede cancelar la acción!",
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      cancelButtonText: 'Cancelar',
      confirmButtonText: 'Si, borrar precio de membresia!'
    }).then(function(result){
      if (result.value) {
        
          window.location = "index.php?ruta=preciomembresias&idPrecioMembresia="+idPrecioMembresia;
      }

})

})


$('.tablaMembresias').DataTable({
  "ajax": "ajax/membresias/tabla-membresias.ajax.php?perfil="+$("#perfilOculto").val(),
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

/*=============================================
EDITAR MEMBRESIA
=============================================*/
$(".tablaMembresias").on("click", ".btnEditarMembresia", function () {

  var idMembresia = $(this).attr("idMembresia");

  var datos = new FormData();
  datos.append("idMembresia", idMembresia);

  $.ajax({

      url: "ajax/membresias.ajax.php",
      method: "POST",
      data: datos,
      cache: false,
      contentType: false,
      processData: false,
      dataType: "json",
      success: function (respuesta) {

          $("#idMembresia").val(respuesta["id_membresia"]);
          $("#editarFechaInicio").val(respuesta["fecha_inicio"]);
          $("#editarFechaFin").val(respuesta["fecha_fin"]);
          $("#editarComprobante").val(respuesta["comprobante"]);
          $("#editarTipoMembresia").val(respuesta["id_tipo_membresia"]);
          $("#editarTipoMembresia").selectpicker("refresh");
          $("#editarMiembro").val(respuesta["id_miembro"]);
          $("#editarMiembro2").val(respuesta["id_miembro"]+" - "+respuesta["nombre_completo"]);
          $("#fotoActualComprobante").val(respuesta["comprobante"]);


        if(respuesta["comprobante"] != ""){

          $(".previsualizarComprobante").attr("src", respuesta["comprobante"]);

        }
    
      }

  })

})


/*=============================================
ELIMINAR MEMBRESIA
=============================================*/
$(".tablaMembresias").on("click", ".btnEliminarMembresia", function(){

var idMembresia = $(this).attr("idMembresia");
var comprobante = $(this).attr("comprobante");

swal({
      title: '¿Está seguro de borrar la membresia?',
      text: "¡Si no lo está puede cancelar la acción!",
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      cancelButtonText: 'Cancelar',
      confirmButtonText: 'Si, borrar membresia!'
    }).then(function(result){
      if (result.value) {
        
          window.location = "index.php?ruta=membresias&idMembresia="+idMembresia+"&comprobante="+comprobante;
      }

})

})

/*=============================================
SUBIENDO LA FOTO DEL USUARIO
=============================================*/
$(".nuevoComprobante").change(function(){

	var imagen = this.files[0];
	
	/*=============================================
  	VALIDAMOS EL FORMATO DE LA IMAGEN SEA JPG O PNG
  	=============================================*/

  	if(imagen["type"] != "image/jpeg" && imagen["type"] != "image/png"){

  		$(".nuevoComprobante").val("");

  		 swal({
		      title: "Error al subir la imagen",
		      text: "¡La imagen debe estar en formato JPG o PNG!",
		      type: "error",
		      confirmButtonText: "¡Cerrar!"
		    });

  	}else if(imagen["size"] > 2000000){

  		$(".nuevoComprobante").val("");

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

  			$(".previsualizarComprobante").attr("src", rutaImagen);

  		})

  	}
})