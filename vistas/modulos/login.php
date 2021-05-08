<div id="back"></div>

<div class="login-box">
  
  <div class="login-box-body">

    <div class="login-logo">

      <img src="vistas/img/plantilla/logo-grande.png" class="img-responsive" style="padding:00px 50px 0px 50px">

    </div>

    

    <p class="login-box-msg"><b>Ingresar al sistema</b></p>

    <form method="post">

      <div class="form-group has-feedback">

        <input type="text" class="form-control" placeholder="Usuario" name="ingUsuario" required>
        <span class="glyphicon glyphicon-user form-control-feedback"></span>

      </div>

      <div class="form-group has-feedback">

        <input type="password" class="form-control" placeholder="Contraseña" name="ingPassword" required>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      
      </div>

      <div class="row">
        <div class="form-check" style="padding-left:16px">
            
            <input class="form-check-input minimal-red" type="checkbox" value="1" name="mantener_sesion_abierta" id="flexCheckDefault">
            <label class="form-check-label" for="flexCheckDefault">
              Mantener sesión activa
            </label>
        </div>
      </div>

      <div class="row " >
        <div class="col-xs-4"></div>
        <div class="col-xs-4" >

          <button type="submit" class="btn  btn-block " style="background-color:#1e282c;color:white;">Ingresar</button>
        
        </div>

      </div>

      <?php

        $login = new ControladorUsuarios();
        $login -> ctrIngresoUsuario();
        
      ?>

    </form>

  </div>

</div>
