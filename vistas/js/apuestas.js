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
  "order": [[7, "desc"]],
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

  var idApuestaE = $(this).attr("idApuesta");
  console.log(idApuestaE)
  //var empresa = $(this).attr("empresa");
  //console.log(empresa);

  var datos = new FormData();
  datos.append("idApuestaE", idApuestaE);

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
  //console.log(idApuesta,estadoApuesta)


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
      if(estadoApuesta == 1){
        Command: toastr["success"]("Apuesta ganada!");
      }else if (estadoApuesta == 2){
        Command: toastr["warning"]("Apuesta anulada!");
      }else{
        Command: toastr["error"]("Apuesta perdida!");
      }

          

    }

  })

  if(estadoApuesta == 1){

    $(this).addClass('btn-success');
    $(this).removeClass('btnGanada');

    var botonI = '.I' + idApuesta;

    $(botonI).removeClass('btn-info');
    $(botonI).addClass('btn-success');
    $(botonI).html('Ganada');

    var botonA = 'A' + idApuesta;
    document.getElementById(botonA).disabled = true;

    var botonP = 'P' + idApuesta;
    document.getElementById(botonP).disabled = true;

    var botonED = 'ED' + idApuesta;
    document.getElementById(botonED).disabled = true;

    var botonEL = 'EL' + idApuesta;
    document.getElementById(botonEL).disabled = true;


  }else if(estadoApuesta == 2){

    $(this).addClass('btn-warning');

    var botonI = '.I' + idApuesta;

    $(botonI).removeClass('btn-info');
    $(botonI).addClass('btn-warning');
    $(botonI).html('Anulada');

    var botonA = 'G' + idApuesta;
    document.getElementById(botonA).disabled = true;

    var botonP = 'P' + idApuesta;
    document.getElementById(botonP).disabled = true;

    var botonED = 'ED' + idApuesta;
    document.getElementById(botonED).disabled = true;

    var botonEL = 'EL' + idApuesta;
    document.getElementById(botonEL).disabled = true;

  }else{

    $(this).addClass('btn-danger');

    var botonI = '.I' + idApuesta;

    $(botonI).removeClass('btn-info');
    $(botonI).addClass('btn-danger');
    $(botonI).html('Perdida');

    var botonA = 'G' + idApuesta;
    document.getElementById(botonA).disabled = true;

    var botonP = 'A' + idApuesta;
    document.getElementById(botonP).disabled = true;

    var botonED = 'ED' + idApuesta;
    document.getElementById(botonED).disabled = true;

    var botonEL = 'EL' + idApuesta;
    document.getElementById(botonEL).disabled = true;

  }

})

$(".tablaApuestas").on("click",".btnReiniciarApuesta",function(){
	var idApuesta = $(this).attr("idApuesta");
  var estadoApuesta = $(this).attr("estadoApuesta");
  var nombreApuesta = $(this).attr("nombre");
  // console.log(idApuesta,estadoApuesta)

  
	swal({
        title: '¿Está seguro de reiniciar la apuesta '+nombreApuesta+'?',
        text: "¡Si no lo está puede cancelar la acción!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, reiniciar la apuesta!'
    }).then(function (result) {

        if (result.value) {

			
			// console.log("codigo", codigo);
			
			//Realizamos la activación-desactivación por una petición AJAX
			var datos = new FormData();
      datos.append("idApuesta", idApuesta);
      datos.append("estadoApuesta", estadoApuesta);
			$.ajax({
				url:"ajax/apuestas.ajax.php",
				type:"POST",
				data:datos,
				cache:false,
				contentType:false,
				processData:false,
				success:function(respuesta){
					// console.log(respuesta);
					swal({
						type: "success",
						title: "¡Ok!",
						text: "¡La apuesta fue reiniciada con éxito!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar",
						closeOnConfirm: false
					}).then((result)=>{
						if(result.value){
							window.location="apuestas";}
					});}
			});

		}
	})

});

$('.tablaApuestasPlayer').DataTable({
  "ajax": "ajax/apuestas/tabla-apuestas-player.ajax.php?perfil="+$("#perfilOculto").val(),
  "deferRender": true,
  "retrieve": true,
  "processing": true,
  "order": [[7, "desc"]],
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