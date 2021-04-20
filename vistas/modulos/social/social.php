<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
      Administrar redes sociales
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Administrar redes sociales</li>
    
    </ol>

  </section>

  <section class="content">

    <div class="box">

      <div class="box-header with-border">
  
        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarSocial">
          
          Agregar red social

        </button>

      </div>
        
      <div class="box-body">
        
       <table class="table table-bordered table-striped dt-responsive tablaSocial">
         
        <thead>
         
         <tr>
           <th>N°</th>
           <th>Nombre</th>
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
MODAL AGREGAR RED SOCIAL
======================================-->

<div id="modalAgregarSocial" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post" >

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Agregar red social</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA LA RED SOCIAL -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-building"></i></span> 

                <input type="text"  class="form-control input-md" name="nuevaRedSocial" placeholder="Ingresar red social" required>

              </div>

            </div>          


          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Guardar red social</button>

        </div>

      </form>


      <?php

        $crearSocial = new ControladorSocial();
        $crearSocial -> ctrCrearSocial();

      ?>


    </div>

  </div>

</div>


<!--=====================================
MODAL EDITAR SOCIAL
======================================-->

<div id="modalEditarSocial" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Editar red social</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

          
            <!-- ENTRADA PARA LA RED SOCIAL -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-building"></i></span> 

                <input type="text" class="form-control input-md" name="editarRedSocial"  id="editarRedSocial" required>

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

        $editarSocial = new ControladorSocial();
        $editarSocial -> ctrEditarSocial();

      ?>   


    </div>

  </div>

</div>


<?php

  $eliminarSocial = new ControladorSocial();
  $eliminarSocial -> ctrEliminarSocial();

?>

<script>
window.document.title = "Red social"
</script>