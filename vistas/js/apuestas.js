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

/*=============================================
CARGAR LA TABLA DINÁMICA DE APUESTAS PLAYER
=============================================*/

if (localStorage.getItem("capturarRango") != null) {
	$("#daterange-btnApuestas span").html(localStorage.getItem("capturarRango"));
  
	cargarTablaApuestas(localStorage.getItem("fechaInicial"), localStorage.getItem("fechaFinal"),$("#empresaDate2").val());
} else {
	$("#daterange-btnApuestas span").html('<i class="fa fa-calendar"></i> Rango de Fecha ');
	cargarTablaApuestas(null, null,$("#empresaDate2").val());
}

/* 
* TABLA PARA APUESTAS PLAYER
*/
function cargarTablaApuestas(fechaInicial,fechaFinal,empresa) {
$('.tablaApuestas').DataTable({
  "ajax": "ajax/apuestas/tabla-apuestas.ajax.php?perfil="+$("#perfilOculto").val()+ "&fechaInicial=" + fechaInicial + "&fechaFinal=" + fechaFinal+ "&empresa=" +$("#empresaDate2").val(),
  "deferRender": true,
  "retrieve": true,
  "processing": true,
  "order": [[7, "desc"]],
	"pageLength": 20,
	"lengthMenu": [[20, 40, 60, -1], [20, 40, 60, 'Todos']],
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

/*
*EDITAR APUESTA
*/
$(".tablaApuestas , .tablaApuestasPlayer").on("click", ".btnEditarApuesta", function () {

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
$(".tablaApuestas, .tablaApuestasPlayer").on("click", ".btnEliminarApuesta", function(){

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
$(".tablaApuestas, .tablaApuestasPlayer").on("click", ".btnGanada,.btnAnulada,.btnPerdida", function () {

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

$(".tablaApuestas, .tablaApuestasPlayer").on("click",".btnReiniciarApuesta",function(){
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

/*=============================================
CARGAR LA TABLA DINÁMICA DE APUESTAS PLAYER
=============================================*/

if (localStorage.getItem("capturarRango2") != null) {
	$("#daterange-btnApuestasPlayer span").html(localStorage.getItem("capturarRango2"));
  
	cargarTablaApuestasPlayer(localStorage.getItem("fechaInicial2"), localStorage.getItem("fechaFinal2"),$("#empresaDate").val(),$("#userDate").val());
} else {
	$("#daterange-btnApuestasPlayer span").html('<i class="fa fa-calendar"></i> Rango de Fecha ');
	cargarTablaApuestasPlayer(null, null,$("#empresaDate").val(),$("#userDate").val());
}

/* 
* TABLA PARA APUESTAS PLAYER
*/
function cargarTablaApuestasPlayer(fechaInicial,fechaFinal,empresa,usuario) {

$('.tablaApuestasPlayer').DataTable({
  "ajax": "ajax/apuestas/tabla-apuestas-player.ajax.php?perfil="+$("#perfilOculto").val() + "&fechaInicial2=" + fechaInicial + "&fechaFinal2=" + fechaFinal+ "&empresa=" + $("#empresaDate").val() + "&usuario=" + $("#userDate").val(),
  "deferRender": true,
  "retrieve": true,
  "processing": true,
  "order": [[7, "desc"]],
	"pageLength": 20,
	"lengthMenu": [[20, 40, 60, -1], [20, 40, 60, 'Todos']],
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


moment.locale('es');
/*=============================================
RANGO DE FECHAS APUESTAS PLAYER
=============================================*/

$("#daterange-btnApuestasPlayer").daterangepicker(
  {
    cancelClass: "CancelarApuestasPlayer",
    locale:{
  "daysOfWeek": [
    "Dom",
    "Lun",
    "Mar",
    "Mie",
    "Jue",
    "Vie",
    "Sab"
  ],
  "monthNames": [
    "Enero",
    "Febrero",
    "Marzo",
    "Abril",
    "Mayo",
    "Junio",
    "Julio",
    "Agosto",
    "Septiembre",
    "Octubre",
    "Noviembre",
    "Diciembre"
  ],
  },
    ranges: {
      Hoy: [moment(), moment()],
      Ayer: [moment().subtract(1, "days"), moment().subtract(1, "days")],
      "Últimos 7 días": [moment().subtract(6, "days"), moment()],
      "Últimos 30 días": [moment().subtract(29, "days"), moment()],
      "Este mes": [moment().startOf("month"), moment().endOf("month")],
      "Último mes": [
        moment()
          .subtract(1, "month")
          .startOf("month"),
        moment()
          .subtract(1, "month")
          .endOf("month")
      ]
    },
    
    startDate: moment(),
    endDate: moment()
  },
  function(start, end) {
    $("#daterange-btnApuestasPlayer span").html(
      start.format("MMMM D, YYYY") + " - " + end.format("MMMM D, YYYY")
    );

    var fechaInicial = start.format("YYYY-MM-DD");

    var fechaFinal = end.format("YYYY-MM-DD");

    var capturarRango2 = $("#daterange-btnApuestasPlayer span").html();
  
    localStorage.setItem("capturarRango2", capturarRango2);
    localStorage.setItem("fechaInicial2", localStorage.getItem("fechaInicial2"));
    localStorage.setItem("fechaFinal2", localStorage.getItem("fechaFinal2"));

    // Recargamos la tabla con la información para ser mostrada en la tabla
    $(".tablaApuestasPlayer").DataTable().destroy();
    cargarTablaApuestasPlayer(fechaInicial, fechaFinal);
  });

/*=============================================
CANCELAR RANGO DE FECHAS
=============================================*/

$(".daterangepicker.opensleft .range_inputs .CancelarApuestasPlayer").on(
  "click",
  function() {
    localStorage.removeItem("capturarRango2");
    localStorage.removeItem("fechaInicial2");
    localStorage.removeItem("fechaFinal2");
    localStorage.clear();
    window.location = "apuestas-player";
  }
);

/*=============================================
CAPTURAR HOY
=============================================*/

$(".daterangepicker.opensleft .ranges li").on("click", function() {
  var textoHoy = $(this).attr("data-range-key");

  if (textoHoy == "Hoy") {
    var d = new Date();

    var dia = d.getDate();
    var mes = d.getMonth() + 1;
    var año = d.getFullYear();

    dia = ("0" + dia).slice(-2);
    mes = ("0" + mes).slice(-2);

    var fechaInicial = año + "-" + mes + "-" + dia;
    var fechaFinal = año + "-" + mes + "-" + dia;

    localStorage.setItem("capturarRango2", "Hoy");
    localStorage.setItem("fechaInicial2", fechaInicial);
    localStorage.setItem("fechaFinal2", fechaFinal);
  // Recargamos la tabla con la información para ser mostrada en la tabla
    $(".tablaApuestasPlayer").DataTable().destroy();
    cargarTablaApuestasPlayer(fechaInicial, fechaFinal);
  }
});
  

/*=============================================
RANGO DE FECHAS
=============================================*/

$("#daterange-btnApuestas").daterangepicker(
  {
    cancelClass: "CancelarApuestas",
    locale:{
  "daysOfWeek": [
    "Dom",
    "Lun",
    "Mar",
    "Mie",
    "Jue",
    "Vie",
    "Sab"
  ],
  "monthNames": [
    "Enero",
    "Febrero",
    "Marzo",
    "Abril",
    "Mayo",
    "Junio",
    "Julio",
    "Agosto",
    "Septiembre",
    "Octubre",
    "Noviembre",
    "Diciembre"
  ],
  },
    ranges: {
      Hoy: [moment(), moment()],
      Ayer: [moment().subtract(1, "days"), moment().subtract(1, "days")],
      "Últimos 7 días": [moment().subtract(6, "days"), moment()],
      "Últimos 30 días": [moment().subtract(29, "days"), moment()],
      "Este mes": [moment().startOf("month"), moment().endOf("month")],
      "Último mes": [
        moment()
          .subtract(1, "month")
          .startOf("month"),
        moment()
          .subtract(1, "month")
          .endOf("month")
      ]
    },
    
    startDate: moment(),
    endDate: moment()
  },
  function(start, end) {
    $("#daterange-btnApuestas span").html(
      start.format("MMMM D, YYYY") + " - " + end.format("MMMM D, YYYY")
    );

    var fechaInicial = start.format("YYYY-MM-DD");

    var fechaFinal = end.format("YYYY-MM-DD");

    var capturarRango = $("#daterange-btnApuestas span").html();
  
    localStorage.setItem("capturarRango", capturarRango);
    localStorage.setItem("fechaInicial", localStorage.getItem("fechaInicial"));
    localStorage.setItem("fechaFinal", localStorage.getItem("fechaFinal"));

    // Recargamos la tabla con la información para ser mostrada en la tabla
    $(".tablaApuestas").DataTable().destroy();
    cargarTablaApuestas(fechaInicial, fechaFinal);
  });

/*=============================================
CANCELAR RANGO DE FECHAS
=============================================*/

$(".daterangepicker.opensleft .range_inputs .CancelarApuestas").on(
  "click",
  function() {
    localStorage.removeItem("capturarRango");
    localStorage.removeItem("fechaInicial");
    localStorage.removeItem("fechaFinal");
    localStorage.clear();
    window.location = "apuestas";
  }
);

/*=============================================
CAPTURAR HOY
=============================================*/

$(".daterangepicker.opensleft .ranges li").on("click", function() {
  var textoHoy = $(this).attr("data-range-key");

  if (textoHoy == "Hoy") {
    var d = new Date();

    var dia = d.getDate();
    var mes = d.getMonth() + 1;
    var año = d.getFullYear();

    dia = ("0" + dia).slice(-2);
    mes = ("0" + mes).slice(-2);

    var fechaInicial = año + "-" + mes + "-" + dia;
    var fechaFinal = año + "-" + mes + "-" + dia;

    localStorage.setItem("capturarRango", "Hoy");
    localStorage.setItem("fechaInicial", fechaInicial);
    localStorage.setItem("fechaFinal", fechaFinal);
  // Recargamos la tabla con la información para ser mostrada en la tabla
    $(".tablaApuestas").DataTable().destroy();
    cargarTablaApuestas(fechaInicial, fechaFinal);
  }
});
  