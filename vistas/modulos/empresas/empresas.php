<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
      Administrar empresas
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Administrar empresas</li>
    
    </ol>

  </section>

  <section class="content">

    <div class="box">

      <div class="box-header with-border">
  
        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarEmpresa">
          
          Agregar empresa

        </button>

        <div class="pull-right">
          <button class="btn btn-outline-success btnReporteEmpresa" style="border:green 1px solid">
          <img src="vistas/img/plantilla/excel.png" width="20px"> Reporte empresas  </button>
        </div>
      </div>
        
      <div class="box-body">
       <input type="hidden" value="<?= $_SESSION["perfil"]; ?>" id="perfilOculto">
       <table class="table table-bordered table-striped dt-responsive tablaEmpresas">
         
        <thead>
         
         <tr>
           <th>N°</th>
           <th>Nombre</th>
           <th>Documento</th>
           <th>Estado</th>
           <th>Creación</th>
           <th>Acciones</th>

         </tr> 

        </thead>

        <tbody>

        </tbody>

       </table>

      </div>

    </div>

  </section>

</div>

<!--=====================================
MODAL AGREGAR EMPRESA
======================================-->

<div id="modalAgregarEmpresa" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Agregar empresa</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA LA RAZON SOCIAL -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-building"></i></span> 

                <input type="text" min="0" class="form-control input-md" name="nuevaRazonSocial" placeholder="Ingresar razon social" required>

              </div>

            </div>          

            <!-- ENTRADA PARA EL DOCUMENTO -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-archive"></i></span> 

                <input type="text" class="form-control input-md" name="nuevoDocumento" placeholder="Ingresar documento" required>

              </div>

            </div>

            <!-- ENTRADA PARA EL LOGO1 -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-image"></i></span> 

                <input type="file" class="form-control input-md nuevoLogo1"  name="nuevoLogo1" >


              </div>
              <img src="vistas/img/usuarios/default/anonymous.png" class="img-thumbnail previsualizarLogo" width="100px">

            </div>

            <!-- ENTRADA PARA EL LOGO2 -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-image"></i></span> 

                <input type="file" class="form-control input-md nuevoLogo2" name="nuevoLogo2" >

                

              </div>

              <img src="vistas/img/usuarios/default/anonymous.png" class="img-thumbnail previsualizarLogo2" width="100px">

            </div>

            <!-- ENTRADA PARA EL RESPONSABLE -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-user"></i></span> 

                <select  class="form-control input-md selectpicker" name="nuevoResponsable" data-live-search="true" required>
                  <option value="">Seleccionar responsable</option>
                <?php
                  $usuarios = ControladorUsuarios::ctrMostrarUsuarios(null,null);
                  foreach ($usuarios as $key => $value) {
                    echo '<option value="' . $value["id"] . '">' . $value["id"] ." - ".$value["nombre"] . '</option>';
                  }
                ?>
                </select>

              </div>

            </div>


          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Guardar empresa</button>

        </div>

      </form>


      <?php

        $crearEmpresa = new ControladorEmpresas();
        $crearEmpresa -> ctrCrearEmpresa();

      ?>


    </div>

  </div>

</div>


<!--=====================================
MODAL EDITAR EMPRESA
======================================-->

<div id="modalEditarEmpresa" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Editar empresa</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

          
            <!-- ENTRADA PARA LA RAZON SOCIAL -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-building"></i></span> 

                <input type="text" min="0" class="form-control input-md" name="editarRazonSocial"  id="editarRazonSocial" required>

              </div>

            </div>          

            <!-- ENTRADA PARA EL DOCUMENTO -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-archive"></i></span> 

                <input type="text" class="form-control input-md" name="editarDocumento" id="editarDocumento" required>
                <input type="hidden"  name="idEmpresa" id="idEmpresa" >

              </div>

            </div>

            <!-- ENTRADA PARA EL RESPONSABLE -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-user"></i></span> 

                <select  class="form-control input-md selectpicker" name="editarResponsable" id ="editarResponsable" data-live-search="true" required>
                  
                <?php
                  $usuarios = ControladorUsuarios::ctrMostrarUsuarios(null,null);
                  foreach ($usuarios as $key => $value) {
                    echo '<option value="' . $value["id"] . '">' . $value["id"] ." - ".$value["nombre"] . '</option>';
                  }
                ?>
                </select>

              </div>

            </div>
  
          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Guardar cambios</button>

        </div>

      </form>

      <?php

        $editarEmpresa = new ControladorEmpresas();
        $editarEmpresa -> ctrEditarEmpresa();

      ?>   


    </div>

  </div>

</div>


<?php

  $eliminarEmpresa = new ControladorEmpresas();
  $eliminarEmpresa -> ctrEliminarEmpresa();

?>

<script>
window.document.title = "Empresas"
</script>