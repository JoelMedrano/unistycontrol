$('.tablaTipoMembresias').DataTable({
    "ajax": "ajax/social/tabla-social.ajax.php?perfil="+$("#perfilOculto").val(),
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
EDITAR RED SOCIAL
=============================================*/
$(".tablaTipoMembresias").on("click", ".btnEditarSocial", function () {

    var idSocial = $(this).attr("idSocial");

    var datos = new FormData();
    datos.append("idSocial", idSocial);

    $.ajax({

        url: "ajax/social.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (respuesta) {

            $("#idRedSocial").val(respuesta["id_red_social"]);
            $("#editarRedSocial").val(respuesta["nombre_red_social"]);
			
        }

    })

})


/*=============================================
ELIMINAR RED SOCIAL
=============================================*/
$(".tablaTipoMembresias").on("click", ".btnEliminarSocial", function(){

	var idSocial = $(this).attr("idSocial");
	
	swal({
        title: '¿Está seguro de borrar la red social?',
        text: "¡Si no lo está puede cancelar la acción!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, borrar red social!'
      }).then(function(result){
        if (result.value) {
          
            window.location = "index.php?ruta=social&idSocial="+idSocial;
        }

  })

})
