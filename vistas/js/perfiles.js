/* 
* cargar perfiles de empresas
*/

$(".box").on("click", ".btnCodEmpresa", function () {

    var empresa = $(this).attr("codigo");
    //console.log("empresa", empresa);

    localStorage.setItem("empresa", empresa);

    window.location = "index.php?ruta=perfil-general&empresa=" + empresa;

})

if (localStorage.getItem("empresa") != null) {

    console.log("si hay");
    cargarTablaPerfilEmpresas(localStorage.getItem("empresa"));

} else {

    console.log("no hay");
    cargarTablaPerfilEmpresas("2");

}


function cargarTablaPerfilEmpresas(empresa){

    $('.tablaApuestasPerfilV2').DataTable({
        "ajax": "ajax/apuestas/tabla-apuestas-perfilv2.ajax.php?perfil="+$("#perfilOculto").val()  + "&empresa=" + empresa,
        "deferRender": true,
        "retrieve": true,
        "processing": true,
        "pageLength": 10,
        "searching": false,
        "paginate": true,
        "order": [[0, "desc"]],
        "lengthMenu": [[10, 20, 30, -1], [10, 20, 30, 'Todos']],
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
        },
      });


}