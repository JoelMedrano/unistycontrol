$('.tablaTipoMembresias').DataTable({
    "ajax": "ajax/membresias/tabla-tipo-membresias.ajax.php?perfil="+$("#perfilOculto").val(),
    "deferRender": true,
    "retrieve": true,
    "processing": true,
    "order": [[0, "asc"]],
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
          // console.log(respuesta);
          $("#idMembresia").val(respuesta["id_membresia"]);
          $("#editarFechaInicio").val(respuesta["fecha_inicio"]);
          $("#editarFechaFin").val(respuesta["fecha_fin"]);
          $("#editarComprobante").val(respuesta["comprobante"]);
          $("#editarTipoMembresia").val(respuesta["id_tipo_membresia"]);
          $("#editarTipoMembresia").selectpicker("refresh");
          $("#editarPrecioMembresia").find('option').remove();
          $("#editarPrecioMembresia").append("<option value='"+respuesta["id_precio_membresia"]+"'>"+respuesta["nombre_precio_membresia"]+"</option>");
          $("#editarPrecioMembresia").selectpicker("refresh");
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


$("#nuevaFechaInicio").change(function(){
  var fechaInicio = $(this).val();
  var e = new Date(fechaInicio);
  e.setMonth(e.getMonth() + 1);
  e.setDate(e.getDate() + 1);

  if((e.getMonth()+1)<10){
    if((e.getDate())<10){
      $("#nuevaFechaFin").val(e.getFullYear() +"-0"+ (e.getMonth()+1) +"-0"+ e.getDate());
    }else{
      $("#nuevaFechaFin").val(e.getFullYear() +"-0"+ (e.getMonth()+1) +"-"+ e.getDate());
    } 
  }else{
    if((e.getDate())<10){
      $("#nuevaFechaFin").val(e.getFullYear() +"-"+ (e.getMonth()+1) +"-0"+ e.getDate());
    }else{
      $("#nuevaFechaFin").val(e.getFullYear() +"-"+ (e.getMonth()+1) +"-"+ e.getDate());
    } 
  } 

});

$("#editarFechaInicio").change(function(){
  var fechaInicio = $(this).val();
  var e = new Date(fechaInicio);
  e.setMonth(e.getMonth() + 1);
  e.setDate(e.getDate() + 1);

  if((e.getMonth()+1)<10){
    if((e.getDate())<10){
      $("#editarFechaFin").val(e.getFullYear() +"-0"+ (e.getMonth()+1) +"-0"+ e.getDate());
    }else{
      $("#editarFechaFin").val(e.getFullYear() +"-0"+ (e.getMonth()+1) +"-"+ e.getDate());
    } 
  }else{
    if((e.getDate())<10){
      $("#editarFechaFin").val(e.getFullYear() +"-"+ (e.getMonth()+1) +"-0"+ e.getDate());
    }else{
      $("#editarFechaFin").val(e.getFullYear() +"-"+ (e.getMonth()+1) +"-"+ e.getDate());
    } 
  } 

});

/*=============================================
RENOVAR MEMBRESIA
=============================================*/
$(".tablaMembresias").on("click", ".btnRenovarMembresia", function () {

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
          var fin = respuesta["fecha_fin"];
          var e = new Date(fin);
          e.setDate(e.getDate() + 2);

          if((e.getMonth()+1)<10){
            if((e.getDate())<10){
              $("#renovarFechaInicio").val(e.getFullYear() +"-0"+ (e.getMonth()+1) +"-0"+ e.getDate());
            }else{
              $("#renovarFechaInicio").val(e.getFullYear() +"-0"+ (e.getMonth()+1) +"-"+ e.getDate());
            } 
          }else{
            if((e.getDate())<10){
              $("#renovarFechaInicio").val(e.getFullYear() +"-"+ (e.getMonth()+1) +"-0"+ e.getDate());
            }else{
              $("#renovarFechaInicio").val(e.getFullYear() +"-"+ (e.getMonth()+1) +"-"+ e.getDate());
            } 
          } 

          e.setMonth(e.getMonth() + 1);

          if((e.getMonth()+1)<10){
            if((e.getDate())<10){
              $("#renovarFechaFin").val(e.getFullYear() +"-0"+ (e.getMonth()+1) +"-0"+ e.getDate());
            }else{
              $("#renovarFechaFin").val(e.getFullYear() +"-0"+ (e.getMonth()+1) +"-"+ e.getDate());
            } 
          }else{
            if((e.getDate())<10){
              $("#renovarFechaFin").val(e.getFullYear() +"-"+ (e.getMonth()+1) +"-0"+ e.getDate());
            }else{
              $("#renovarFechaFin").val(e.getFullYear() +"-"+ (e.getMonth()+1) +"-"+ e.getDate());
            } 
          } 



          $("#idMembresia2").val(respuesta["id_membresia"]);
          $("#renovarTipoMembresia").val(respuesta["id_tipo_membresia"]);
          $("#renovarTipoMembresia").selectpicker("refresh");
          $("#renovarPrecioMembresia").find('option').remove();
          $("#renovarPrecioMembresia").append("<option value='"+respuesta["id_precio_membresia"]+"'>"+respuesta["nombre_precio_membresia"]+"</option>");
          $("#renovarPrecioMembresia").selectpicker("refresh");
          $("#renovarMiembro").val(respuesta["id_miembro"]);
          $("#renovarMiembro2").val(respuesta["id_miembro"]+" - "+respuesta["nombre_completo"]);
    
      }

  })

})


/*=============================================
ELIMINAR PRECIO MEMBRESIA
=============================================*/
$(".tablaMembresias").on("click", ".btnEnviarWhatsapp", function(){

  var celular = $(this).attr("celular");
  var nombre = $(this).attr("nombre");
  var empresa = $(this).attr("empresa");
  
  swal({
        title: '¿Está seguro de enviar un whatsapp para renovar al miembro '+nombre+'?',
        text: "¡Si no lo está puede cancelar la acción!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, enviar al '+celular
      }).then(function(result){
        if (result.value) {
          
          window.open("https://api.whatsapp.com/send?phone=51" +celular + "&text= Hola! le saludamos desde "+empresa+" le hacemos recordar que su membresia con nosotros, esta proxima a vencer.","_blank");
        }
  
  })
  
  })
  
  $('.tablaMembresiasNuevas').DataTable({
    "ajax": "ajax/membresias/tabla-membresias-nuevas.ajax.php?perfil="+$("#perfilOculto").val(),
    "deferRender": true,
    "retrieve": true,
    "processing": true,
    "order": [[0, "asc"]],
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
    }    
  });

  $('.tablaMembresiasRenovadas').DataTable({
    "ajax": "ajax/membresias/tabla-membresias-renovadas.ajax.php?perfil="+$("#perfilOculto").val(),
    "deferRender": true,
    "retrieve": true,
    "processing": true,
    "order": [[0, "asc"]],
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
    }    
  });

  $('.tablaMembresiasCaducadas').DataTable({
    "ajax": "ajax/membresias/tabla-membresias-caducadas.ajax.php?perfil="+$("#perfilOculto").val(),
    "deferRender": true,
    "retrieve": true,
    "processing": true,
    "order": [[0, "asc"]],
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
    }    
  });

  $("#formularioMembresias").on("change", "#nuevoTipoMembresia", function(){
    var tipoM = $(this).val();
  //console.log(empresa);

    var datos = new FormData();
    datos.append("tipoM", tipoM);

    $.ajax({

      url:"ajax/membresias.ajax.php",
      method: "POST",
      data: datos,
      cache: false,
      contentType: false,
      processData: false,
      dataType:"json",
      success:function(respuesta){

        // console.log(respuesta)

        $("#nuevoPrecioMembresia").find('option').remove();
        $("#nuevoPrecioMembresia").append('<option value="">Seleccionar precio de membresia</option>')
        for (let i = 0; i < respuesta.length; i++) {
          $("#nuevoPrecioMembresia").append("<option value='"+respuesta[i]["id_precio_membresia"]+"'>"+respuesta[i]["nombre_precio_membresia"]+"</option>");
          
        }
        $('#nuevoPrecioMembresia').selectpicker('refresh');
      }
    })

  })


  $("#formularioMembresias2").on("change", "#editarTipoMembresia", function(){
    var tipoM = $(this).val();
  //console.log(empresa);

    var datos = new FormData();
    datos.append("tipoM", tipoM);

    $.ajax({

      url:"ajax/membresias.ajax.php",
      method: "POST",
      data: datos,
      cache: false,
      contentType: false,
      processData: false,
      dataType:"json",
      success:function(respuesta){

        // console.log(respuesta)

        $("#editarPrecioMembresia").find('option').remove();
        $("#editarPrecioMembresia").append('<option value="">Seleccionar precio de membresia</option>')
        for (let i = 0; i < respuesta.length; i++) {
          $("#editarPrecioMembresia").append("<option value='"+respuesta[i]["id_precio_membresia"]+"'>"+respuesta[i]["nombre_precio_membresia"]+"</option>");
          
        }
        $('#editarPrecioMembresia').selectpicker('refresh');
      }
    })

  })