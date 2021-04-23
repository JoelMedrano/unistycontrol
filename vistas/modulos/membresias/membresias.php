<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
      Administrar membresias
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Administrar membresias</li>
    
    </ol>

  </section>

  <section class="content">

    <div class="box">

      <div class="box-header with-border">
  
        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarMembresia">
          
          Agregar membresia

        </button>

      </div>
        
      <div class="box-body">
       <input type="hidden" value="<?= $_SESSION["perfil"]; ?>" id="perfilOculto"> 
       <table class="table table-bordered table-striped dt-responsive tablaMembresias">
         
        <thead>
         
         <tr>
           <th>N°</th>
           <th>Miembro</th>
           <th>Tipo Membresia</th>
           <th>Fecha Inicio</th>
           <th>Fecha Fin</th>
           <th>Estado</th>
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
MODAL AGREGAR MEMBRESIA
======================================-->

<div id="modalAgregarMembresia" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Agregar membresia</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA TIPO DE MEMBRESIA -->

            <div class="form-group">
              <label for="">Tipo de membresia</label>
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-credit-card-alt"></i></span> 

                <select  class="form-control input-md selectpicker" name="nuevoTipoMembresia" id="nuevoTipoMembresia" data-live-search="true" required>
                  <option value="">Seleccionar tipo de membresia</option>
                  <?php
                    $valor=$_SESSION["empresa"];
                    $empresas = ControladorMembresias::ctrSelecTipoMembresias($valor);

                    foreach ($empresas as $key => $value) {
                      echo '<option value="' . $value["id_tipo_membresia"] . '">' .$value["nombre_membresia"] . '</option>';
                    }
                  
                  ?>

                </select>
              </div>

            </div>   

            <!-- ENTRADA PARA FECHA DE INICIO -->
            
            <div class="form-group">
              <label for="">Fecha de inicio</label>
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-calendar"></i></span> 

                <input type="date"  class="form-control input-md" name="nuevaFechaInicio" id="nuevaFechaInicio" required>

              </div>

            </div>        

            <!-- ENTRADA PARA FECHA DE FIN -->
            
            <div class="form-group">
              <label for="">Fecha de fin</label>
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-calendar"></i></span> 

                <input type="date"  class="form-control input-md" name="nuevaFechaFin" id="nuevaFechaFin" required>

              </div>

            </div>    

            <!-- ENTRADA PARA MIEMBROS -->

            <div class="form-group">
              <label for="">Miembros</label>
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-users"></i></span> 

                <select  class="form-control input-md selectpicker" name="nuevoMiembro" id="nuevoMiembro" data-live-search="true" required>
                  <option value="">Seleccionar Miembros</option>
                  <?php
                    $valor=$_SESSION["empresa"];
                    $miembros = ControladorMiembros::ctrListarMiembroEmpresa($valor);

                    foreach ($miembros as $key => $value) {
                      echo '<option value="' . $value["id_miembro"] . '">' .$value["nombre_completo"] . '</option>';
                    }
                  
                  ?>

                </select>
              </div>

            </div>   

            <!-- ENTRADA PARA COMPROBANTE -->
            
            <div class="form-group">
              <label for="">Comprobante</label>
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-archive"></i></span> 

                <input type="file"  class="form-control input-md nuevoComprobante" name="nuevoComprobante" id="nuevoComprobante" required>

                

              </div>
              <p class="help-block">Peso máximo de la foto 2MB</p>

              <img src="vistas/img/usuarios/default/anonymous.png" class="img-thumbnail previsualizarComprobante" width="100px">

            </div>   


          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Guardar membresia</button>

        </div>

      </form>


      <?php

        $crearMembresia = new ControladorMembresias();
        $crearMembresia -> ctrCrearMembresia();

      ?>


    </div>

  </div>

</div>


<!--=====================================
MODAL EDITAR MEMBRESIA
======================================-->

<div id="modalEditarMembresia" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Editar membresia</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

          
            <!-- ENTRADA PARA TIPO DE MEMBRESIA -->

            <div class="form-group">
              <label for="">Tipo de membresia</label>
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-credit-card-alt"></i></span> 

                <select  class="form-control input-md selectpicker" name="editarTipoMembresia" id="editarTipoMembresia" data-live-search="true" required>
          
                  <?php
                    $valor=$_SESSION["empresa"];
                    $empresas = ControladorMembresias::ctrSelecTipoMembresias($valor);

                    foreach ($empresas as $key => $value) {
                      echo '<option value="' . $value["id_tipo_membresia"] . '">' .$value["nombre_membresia"] . '</option>';
                    }
                  
                  ?>

                </select>
              </div>

            </div>   

            <!-- ENTRADA PARA FECHA DE INICIO -->
            
            <div class="form-group">
              <label for="">Fecha de inicio</label>
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-calendar"></i></span> 

                <input type="date"  class="form-control input-md" name="editarFechaInicio"  id="editarFechaInicio" required>
                <input type="hidden"  name="idMembresia" id="idMembresia" >

              </div>

            </div>        

            <!-- ENTRADA PARA FECHA DE FIN -->
            
            <div class="form-group">
              <label for="">Fecha de fin</label>
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-calendar"></i></span> 

                <input type="date"  class="form-control input-md" name="editarFechaFin" id="editarFechaFin" required>

              </div>

            </div> 

            <!-- ENTRADA PARA MIEMBROS -->

            <div class="form-group">
              <label for="">MIEMBROS</label>
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-users"></i></span> 

                <input type="hidden" name="editarMiembro" id="editarMiembro" >
                <input type="text"  class="form-control input-md " name="editarMiembro2" id="editarMiembro2" readonly>
          
              </div>

            </div>      

            <!-- ENTRADA PARA COMPROBANTE -->
            
            <div class="form-group">
              <label for="">Comprobante</label>
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-archive"></i></span> 

                <input type="file"  class="form-control input-md nuevoComprobante" name="editarComprobante" id="nuevoComprobante" required>

                

              </div>
              <p class="help-block">Peso máximo de la foto 2MB</p>

              <img src="vistas/img/usuarios/default/anonymous.png" class="img-thumbnail previsualizarComprobante" width="100px">

              <input type="hidden" name="fotoActualComprobante" id="fotoActualComprobante">
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

        $editarMembresia = new ControladorMembresias();
        $editarMembresia -> ctrEditarMembresia();

      ?>   


    </div>

  </div>

</div>


<?php

  $eliminarMembresia = new ControladorMembresias();
  $eliminarMembresia -> ctrEliminarMembresia();

?>

<script>
window.document.title = "Membresias"
</script>