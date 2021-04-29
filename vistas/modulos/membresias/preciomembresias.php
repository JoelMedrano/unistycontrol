<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
      Administrar precio de membresias
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Administrar precio de membresias</li>
    
    </ol>

  </section>

  <section class="content">

    <div class="box">

      <div class="box-header with-border">
  
        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarPrecioMembresia">
          
          Agregar precio de membresia

        </button>

      </div>
        
      <div class="box-body">
       <input type="hidden" value="<?= $_SESSION["perfil"]; ?>" id="perfilOculto"> 
       <table class="table table-bordered table-striped dt-responsive tablaPrecioMembresias">
         
        <thead>
         
         <tr>
           <th>N°</th>
           <th>Nombre</th>
           <th>Tipo Membresia</th> 
           <th>Empresa</th>  
           <th>Precio S/</th>  
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
MODAL AGREGAR PRECIO MEMBRESIA
======================================-->

<div id="modalAgregarPrecioMembresia" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post" >

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#34495E; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Agregar precio de membresia</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

          <!-- ENTRADA PARA TIPO DE MEMBRESIA -->

          <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-credit-card-alt"></i></span> 

                <select  class="form-control input-md selectpicker" name="nuevoTipoMembresia" data-live-search="true" required>
                  <option value="">Seleccionar tipo membresia</option>
                  <?php
                    
                    $valor=$_SESSION["empresa"];
                    $empresas = ControladorMembresias::ctrSelecTipoMembresias($valor);

                    foreach ($empresas as $key => $value) {
                      if($_SESSION["empresa"] == '0'){
                        echo '<option value="' . $value["id_tipo_membresia"] . '">' .$value["nombre_membresia"] ." - ". $value["nombre"] .'</option>';
                      }else{
                        echo '<option value="' . $value["id_tipo_membresia"] . '">' .$value["nombre_membresia"] . '</option>';
                      }
                      
                    }
                  
                  ?>

                </select>
              </div>

            </div>   

            <!-- ENTRADA PARA DESCRIPCION PRECIO DE MEMBRESIA -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-text-width"></i></span> 

                <input type="text"  class="form-control input-md" name="nuevaDescripcionPrecio" placeholder="Ingresar descripcion membresia" required>

              </div>

            </div>    

            


            <!-- ENTRADA PARA PRECIO DE MEMBRESIA -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-usd"></i></span> 

                <input type="number" step="any" min="0"  class="form-control input-md" name="nuevoPrecio" placeholder="Ingresar precio de membresia" required>

              </div>

            </div>      


          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Guardar precio membresia</button>

        </div>

      </form>


      <?php

        $crearPrecioMembresia = new ControladorMembresias();
        $crearPrecioMembresia -> ctrCrearPrecioMembresia();

      ?>


    </div>

  </div>

</div>


<!--=====================================
MODAL EDITAR PRECIO DE MEMBRESIA
======================================-->

<div id="modalEditarPrecioMembresia" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#34495E; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Editar precio de membresia</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA TIPO DE MEMBRESIA -->

           <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-credit-card-alt"></i></span> 

                <select  class="form-control input-md selectpicker" name="editarTipoMembresia" id="editarTipoMembresia" data-live-search="true" required>
                  <?php
                    $valor=$_SESSION["empresa"];
                    $empresas = ControladorMembresias::ctrSelecTipoMembresias($valor);

                    foreach ($empresas as $key => $value) {
                      if($_SESSION["empresa"] == '0'){
                        echo '<option value="' . $value["id_tipo_membresia"] . '">' .$value["nombre_membresia"] ." - ". $value["nombre"] .'</option>';
                      }else{
                        echo '<option value="' . $value["id_tipo_membresia"] . '">' .$value["nombre_membresia"] . '</option>';
                      }
                    }
                  
                  ?>

                </select>
              </div>

            </div>   


          
            <!-- ENTRADA PARA DESCRIPCION PRECIO DE MEMBRESIA -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-text-width"></i></span> 

                <input type="text"  class="form-control input-md" name="editarDescripcionPrecio" id="editarDescripcionPrecio"  required>

              </div>

            </div>    

            

            <!-- ENTRADA PARA PRECIO DE MEMBRESIA -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-usd"></i></span> 

                <input type="number" step="any" min="0"  class="form-control input-md" name="editarPrecio" id="editarPrecio"  required>
                <input type="hidden" name="idPrecio" id="idPrecio"  required>

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

        $editarPrecioMembresia = new ControladorMembresias();
        $editarPrecioMembresia -> ctrEditarPrecioMembresia();

      ?>   


    </div>

  </div>

</div>


<?php

  $eliminarPrecioMembresia = new ControladorMembresias();
  $eliminarPrecioMembresia -> ctrEliminarPrecioMembresia();

?>

<script>
window.document.title = "Precio de membresias"
</script>