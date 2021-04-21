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

/*=============================================
*EDITAR MIEMBRO
=============================================*/
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

			console.log(respuesta);

			$("#editarEmpresa").val(respuesta["id_empresa"]);
			$("#editarEmpresa").selectpicker("refresh");

            $("#editarNombre").val(respuesta["nombre_completo"]);
            $("#editarDocumento").val(respuesta["documento"]);
			$("#editarCelular").val(respuesta["celular"]);
			$("#editarEmail").val(respuesta["correo"]);
			$("#editarRedSocial").val(respuesta["id_red_social"]);
			$("#editarPerfil").val(respuesta["usuario_red_social"]);
			$("#fotoMiembroActual").val(respuesta["foto"]);

			if(respuesta["foto"] != ""){

				$(".previsualizar").attr("src", respuesta["foto"]);

			}

			

        }

    })

})
