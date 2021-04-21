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
           <th>Comprobante</th>
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

      <form role="form" method="post" >

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

                <input type="date"  class="form-control input-md" name="nuevaFechaInicio" required>

              </div>

            </div>        

            <!-- ENTRADA PARA FECHA DE FIN -->
            
            <div class="form-group">
              <label for="">Fecha de fin</label>
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-calendar"></i></span> 

                <input type="date"  class="form-control input-md" name="nuevaFechaFin" required>

              </div>

            </div>    

            <!-- ENTRADA PARA COMPROBANTE -->
            
            <div class="form-group">
              <label for="">Comprobante</label>
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-archive"></i></span> 

                <input type="text"  class="form-control input-md" name="nuevoComprobante" placeholder="Ingresar comprobante" required>

              </div>

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

      <form role="form" method="post">

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

            <!-- ENTRADA PARA COMPROBANTE -->
            
            <div class="form-group">
              <label for="">Comprobante</label>
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-archive"></i></span> 

                <input type="text"  class="form-control input-md" name="editarComprobante" id="editarComprobante" required>

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