<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
      Administrar membresias caducadas
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Administrar membresias caducadas</li>
    
    </ol>

  </section>

  <section class="content">

    <div class="box">

      <div class="box-header with-border">
  

      </div>
        
      <div class="box-body">
       <input type="hidden" value="<?= $_SESSION["perfil"]; ?>" id="perfilOculto"> 
       <table class="table table-bordered table-striped dt-responsive tablaMembresiasCaducadas">
         
        <thead>
         
         <tr>
           <th>Código</th>
           <th>Miembro</th>
           <th>Empresa</th>
           <th>Tipo Membresia</th>
           <th>Fecha Inicio</th>
           <th>Fecha Fin</th>
           <th>Estado</th>

         </tr> 

        </thead>

        <tbody>

        </tbody>

       </table>

      </div>

    </div>

  </section>

</div>


<script>
window.document.title = "Membresias"
</script>