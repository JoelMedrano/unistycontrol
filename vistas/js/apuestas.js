/* 
*Al cambiar de empresa
*/
$("#nuevaEmpresa").change(function(){

    document.getElementById("nuevoTipoMembresia").disabled = false;

    var empresa = $(this).val();
    //console.log(empresa);

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
*Editar Apuesta - SELECT
*/
$("#editarEmpresa").change(function(){

  var empresa = $(this).val();
  //console.log(empresa);

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

      $("#editarTipoMembresia").find('option').remove();
      $("#editarTipoMembresia").append('<option value="">Seleccionar Tipo Membresia</option>')
      for (let i = 0; i < respuesta.length; i++) {
        $("#editarTipoMembresia").append("<option value='"+respuesta[i]["id_tipo_membresia"]+"'>"+respuesta[i]["nombre_membresia"]+"</option>");
        
      }
      $('#editarTipoMembresia').selectpicker('refresh');
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
  },
});

/*
*EDITAR APUESTA
*/
$(".tablaApuestas").on("click", ".btnEditarApuesta", function () {

  var idApuesta = $(this).attr("idApuesta");
  //console.log(idApuesta)
  //var empresa = $(this).attr("empresa");
  //console.log(empresa);

  var datos = new FormData();
  datos.append("idApuesta", idApuesta);

  $.ajax({

      url: "ajax/apuestas.ajax.php",
      method: "POST",
      data: datos,
      cache: false,
      contentType: false,
      processData: false,
      dataType: "json",
      success: function (respuesta) {

      //console.log(respuesta);

      $("#idApuesta").val(respuesta["id_apuestas"]);
      $("#editarEmpresa").val(respuesta["id_empresa"]);
      $("#editarEmpresa").selectpicker("refresh");

      $("#editarTipoMembresia").val(respuesta["id_tipo_membresia"]);
      $("#editarTipoMembresia").selectpicker("refresh");
      $("#editarTipoApuesta").html(respuesta["tipo_apuesta_nombre"]);
      $("#editarTipoApuesta").val(respuesta["tipo_apuesta"]);
      $("#editarFecha").val(respuesta["fecha"]);
      $("#editarPartido").val(respuesta["partido"]);
      $("#editarPronostico").val(respuesta["pronostico"]);
      $("#editarCuota").val(respuesta["cuota"]);
      $("#editarMonto").val(respuesta["monto"]);

      }

  })

})

/*
*Eliminar apuesta
*/
$(".tablaApuestas").on("click", ".btnEliminarApuesta", function(){

	var idApuesta = $(this).attr("idApuesta");

  console.log(idApuesta);
  
	swal({
	  title: '¿Está seguro de borrar la apuesta?',
	  text: "¡Si no lo está puede cancelar la accíón!",
	  type: 'warning',
	  showCancelButton: true,
	  confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		cancelButtonText: 'Cancelar',
		confirmButtonText: 'Si, borrar apuesta!'
	}).then(function(result){
  
	  if(result.value){
  
		window.location = "index.php?ruta=apuestas&idApuesta="+idApuesta;
  
	  }
  
	})
  
})

/* 
*Boton ganada
*/
$(".tablaApuestas").on("click", ".btnGanada,.btnAnulada,.btnPerdida", function () {

  var idApuesta = $(this).attr("idApuesta");
  var estadoApuesta = $(this).attr("estadoApuesta");
  console.log(idApuesta,estadoApuesta)

  var datos = new FormData();
  datos.append("idApuesta", idApuesta);
  datos.append("estadoApuesta", estadoApuesta);

  $.ajax({

    url: "ajax/apuestas.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    success: function (respuesta) {
      //console.log(respuesta)


            //window.location = "apuestas";

    }

  })

  if(estadoApuesta == 1){

    $(this).removeClass('btn-info');
    $(this).addClass('btn-success');

    var botonI = '.I' + idApuesta;

    $(botonI).removeClass('btn-info');
    $(botonI).addClass('btn-success');
    $(botonI).html('Ganada');

  }else if(estadoApuesta == 2){

    $(this).removeClass('btn-info');
    $(this).addClass('btn-warning');

    var botonI = '.I' + idApuesta;

    $(botonI).removeClass('btn-info');
    $(botonI).addClass('btn-warning');
    $(botonI).html('Anulada');

  }else{

    $(this).removeClass('btn-info');
    $(this).addClass('btn-danger');

    var botonI = '.I' + idApuesta;

    $(botonI).removeClass('btn-info');
    $(botonI).addClass('btn-danger');
    $(botonI).html('Perdida');


  }

})