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
            $("#editarEmpresa").selectpicker("refresh");
            $("#editarEmpresa").val(respuesta["id_empresa"]);
			
        }

    })

})


/*=============================================
ELIMINAR RED SOCIAL
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
