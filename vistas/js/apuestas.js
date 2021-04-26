/* 
*Al cambiar de empresa
*/
$("#nuevaEmpresa").change(function(){

    document.getElementById("nuevoTipoMembresia").disabled = false;

    var empresa = $(this).val();
    console.log(empresa);

    var datos = new FormData();
	datos.append("empresa", empresa);
	
    $.ajax({

      url:"ajax/membresias.ajax.php",
      method: "POST",
      data: datos,
      cache: false,
      contentType: false,
      processData: false,
      dataType:"json",
      success:function(respuesta){

        //console.log(respuesta)

        $("#nuevoTipoMembresia").find('option').remove();
        $("#nuevoTipoMembresia").append('<option value="">Seleccionar Tipo Membresia</option>')
        for (let i = 0; i < respuesta.length; i++) {
          $("#nuevoTipoMembresia").append("<option value='"+respuesta[i]["id_tipo_membresia"]+"'>"+respuesta[i]["nombre_membresia"]+"</option>");
          
        }
        $('#nuevoTipoMembresia').selectpicker('refresh');
      }
    })
  
  })


/* 
*tabla apuestas
*/
$('.tablaApuestas').DataTable({
  "ajax": "ajax/apuestas/tabla-apuestas.ajax.php?perfil="+$("#perfilOculto").val(),
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