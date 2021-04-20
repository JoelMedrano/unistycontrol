$('.tablaEmpresas').DataTable({
    "ajax": "ajax/empresas/tabla-empresas.ajax.php?perfil="+$("#perfilOculto").val(),
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
EDITAR EMPRESA
=============================================*/
$(".tablaEmpresas").on("click", ".btnEditarEmpresa", function () {

    var idEmpresa = $(this).attr("idEmpresa");

    var datos = new FormData();
    datos.append("idEmpresa", idEmpresa);

    $.ajax({

        url: "ajax/empresas.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (respuesta) {

            $("#idEmpresa").val(respuesta["id_empresa"]);
            $("#editarRazonSocial").val(respuesta["nombre"]);
            $("#editarDocumento").val(respuesta["documento"]);
			
			$("#editarResponsable").val(respuesta["id_responsable"]);
			$("#editarResponsable").selectpicker("refresh");
        }

    })

})


/*=============================================
ELIMINAR EMPRESA
=============================================*/
$(".tablaEmpresas").on("click", ".btnEliminarEmpresa", function(){

	var idEmpresa = $(this).attr("idEmpresa");
	
	swal({
        title: '¿Está seguro de borrar la empresa?',
        text: "¡Si no lo está puede cancelar la acción!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, borrar empresa!'
      }).then(function(result){
        if (result.value) {
          
            window.location = "index.php?ruta=empresas&idEmpresa="+idEmpresa;
        }

  })

})

/*=============================================
REPORTE EMPRESA
=============================================*/
// $(".box").on("click", ".btnReporteEmpresa", function () {
//     window.location = "vistas/reportes_excel/rpt_color.php";
  
// })

// ACTIVANDO-DESACTIVANDO EMPRESA
$(document).on("click",".btnActivarEmpresa",function(){
	// Capturamos el id del usuario y el estado
	var idEmpresa=$(this).attr("idEmpresa");
	var estadoEmpresa=$(this).attr("estadoEmpresa");
	//console.log("idArticulo", idArticulo);
	//console.log("estadoArticulo", estadoArticulo); 
	//Realizamos la activación-desactivación por una petición AJAX
	var datos=new FormData();
	datos.append("activarId",idEmpresa);
	datos.append("estadoEmpresa",estadoEmpresa);
	$.ajax({
	url:"ajax/empresas.ajax.php",
	type:"POST",
	data:datos,
	cache:false,
	contentType:false,
	processData:false,
	success:function(respuesta){
      	if(estadoEmpresa == "1"){

			Command: toastr["success"]("La empresa se activo correctamente!");
		}else{

		Command: toastr["error"]("La empresa se desactivo correctamente!");
		}
    }
	});
	//Cambiamos el estado del botón físicamente
	if(estadoEmpresa=='0'){
	$(this).removeClass("btn-success");
	$(this).addClass("btn-danger");
	$(this).html("Inactivo");
	$(this).attr("estadoEmpresa","1");}
	else{
	$(this).addClass("btn-success");
	$(this).removeClass("btn-danger");
	$(this).html("Activo");
	$(this).attr("estadoEmpresa","0");}
});

/*=============================================
SUBIENDO LA FOTO DEL LOGO 1 DE LA EMPRESA
=============================================*/
$(".nuevoLogo1").change(function(){

	var imagen = this.files[0];
	
	/*=============================================
  	VALIDAMOS EL FORMATO DE LA IMAGEN SEA JPG O PNG
  	=============================================*/

  	if(imagen["type"] != "image/jpeg" && imagen["type"] != "image/png"){

  		$(".nuevoLogo1").val("");

  		 swal({
		      title: "Error al subir la imagen",
		      text: "¡La imagen debe estar en formato JPG o PNG!",
		      type: "error",
		      confirmButtonText: "¡Cerrar!"
		    });

  	}else if(imagen["size"] > 2000000){

  		$(".nuevoLogo1").val("");

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

  			$(".previsualizarLogo").attr("src", rutaImagen);

  		})

  	}
})

/*=============================================
SUBIENDO LA FOTO DEL LOGO 2 DE LA EMPRESA
=============================================*/
$(".nuevoLogo2").change(function(){

	var imagen = this.files[0];
	
	/*=============================================
  	VALIDAMOS EL FORMATO DE LA IMAGEN SEA JPG O PNG
  	=============================================*/

  	if(imagen["type"] != "image/jpeg" && imagen["type"] != "image/png"){

  		$(".nuevoLogo2").val("");

  		 swal({
		      title: "Error al subir la imagen",
		      text: "¡La imagen debe estar en formato JPG o PNG!",
		      type: "error",
		      confirmButtonText: "¡Cerrar!"
		    });

  	}else if(imagen["size"] > 2000000){

  		$(".nuevoLogo2").val("");

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

  			$(".previsualizarLogo2").attr("src", rutaImagen);

  		})

  	}
})