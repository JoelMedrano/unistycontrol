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
          
          Agregar tipo membresia

        </button>

      </div>
        
      <div class="box-body">
       <input type="hidden" value="<?= $_SESSION["perfil"]; ?>" id="perfilOculto"> 
       <table class="table table-bordered table-striped dt-responsive tablaMembresias">
         
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
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-globe"></i></span> 

                <input type="text"  class="form-control input-md" name="nuevoTipo" placeholder="Ingresar membresia" required>

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

        $crearTipoMembresia = new ControladorMembresias();
        $crearTipoMembresia -> ctrCrearTipoMembresia();

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

          
            <!-- ENTRADA PARA TIPO MEMBRESIA -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-globe"></i></span> 

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
window.document.title = "Membresias"
</script>