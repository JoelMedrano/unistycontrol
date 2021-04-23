<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
      Administrar tipo membresias
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Administrar tipo membresias</li>
    
    </ol>

  </section>

  <section class="content">

    <div class="box">

      <div class="box-header with-border">
  
        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarTipoMembresia">
          
          Agregar tipo membresia
          

        </button>

      </div>
        
      <div class="box-body">
       <input type="hidden" value="<?= $_SESSION["perfil"]; ?>" id="perfilOculto"> 
       <table class="table table-bordered table-striped dt-responsive tablaTipoMembresias">
         
        <thead>
         
         <tr>
           <th>N°</th>
           <th>Nombre</th>
           <th>Empresa</th>
           <th>Fecha</th>
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
MODAL AGREGAR TIPO MEMBRESIA
======================================-->

<div id="modalAgregarTipoMembresia" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post" >

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Agregar tipo membresia</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <?php 
             if ($_SESSION["empresa"] == "0"){
            ?>
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-building"></i></span> 

                <select  class="form-control input-md selectpicker" name="nuevaEmpresa" data-live-search="true"  required>
                  <option value="">Seleccionar Empresa</option>

                  <?php

                    $empresas = ControladorEmpresas::ctrMostrarEmpresas(null,null);

                    foreach ($empresas as $key => $value) {
                      echo '<option value="' . $value["id_empresa"] . '">' .$value["nombre"] . '</option>';
                    }
                  
                  ?>

                </select>
              </div>

            </div>   
            <?php 
             }else{
            ?>

                <input type="hidden"  name="nuevaEmpresa" value="<?php echo $_SESSION["empresa"]?>" required>

              
            <?php 
             }
            ?>

            <!-- ENTRADA PARA TIPO DE MEMBRESIA -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-credit-card-alt"></i></span> 

                <input type="text"  class="form-control input-md" name="nuevoTipo" placeholder="Ingresar tipo membresia" required>

              </div>

            </div>    

            



          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Guardar tipo membresia</button>

        </div>

      </form>


      <?php

        $crearTipoMembresia = new ControladorMembresias();
        $crearTipoMembresia -> ctrCrearTipoMembresia();

      ?>


    </div>

  </div>

</div>


<!--=====================================
MODAL EDITAR TIPO MEMBRESIA
======================================-->

<div id="modalEditarTipoMembresia" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Editar tipo membresia</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">
            <?php 
             if ($_SESSION["empresa"] == "0"){
            ?>
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-building"></i></span> 

                <select  class="form-control input-md selectpicker" name="editarEmpresa" data-live-search="true" required>

                  <?php

                    $empresas = ControladorEmpresas::ctrMostrarEmpresas(null,null);

                    foreach ($empresas as $key => $value) {
                      echo '<option value="' . $value["id_empresa"] . '">' .$value["nombre"] . '</option>';
                    }
                  
                  ?>

                </select>
              </div>

            </div>   
            <?php 
             }else{
            ?>

                <input type="hidden"  name="editarEmpresa" value="<?php echo $_SESSION["empresa"]?>" required>

              
            <?php 
             }
            ?>      
          
            <!-- ENTRADA PARA TIPO MEMBRESIA -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-credit-card-alt"></i></span> 

                <input type="text" class="form-control input-md" name="editarTipo"  id="editarTipo" required>
                <input type="hidden" name="idTipo"  id="idTipo" required>

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

        $editarTipoMembresia = new ControladorMembresias();
        $editarTipoMembresia -> ctrEditarTipoMembresia();

      ?>   


    </div>

  </div>

</div>


<?php

  $eliminarTipoMembresia = new ControladorMembresias();
  $eliminarTipoMembresia -> ctrEliminarTipoMembresia();

?>

<script>
window.document.title = "Tipo membresias"
</script>