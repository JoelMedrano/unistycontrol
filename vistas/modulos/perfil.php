<div class="content-wrapper">

    <section class="content-header">
      <ol class="breadcrumb">
        <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active">Perfil</li>
      </ol>
    </section>

    <section class="content">

      <div class="row">

      <?php

        $empresa = 2;

        $membresias = ControladorMembresias::ctrSelecTipoMembresias($empresa);
        var_dump($membresias);

        foreach($membresias as $key => $value){

          echo '<div class="col-md-3">

          <div class="box box-primary">
            <div class="box-body box-profile">

            <img src="vistas/img/usuarios/default/anonymous.png" class="profile-user-img img-responsive img-circle" alt="User profile picture">

              <h3 class="profile-username text-center">Tipster Prueba</h3>
              <p class="text-muted text-center">VIP FUTBOL</p>

              <ul class="list-group list-group-unbordered">
                <li class="list-group-item" style="height:55px;  align-items:center">
                <h4><b>Efectividad MVP</b> <a class="pull-right"><b>70 %</b></a></h4>
                </li>
                <li class="list-group-item">
                  <b>Cuota Promedio</b> <a class="pull-right">1.75</a>
                </li>
              </ul>

            </div>

          </div>

          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">VIP FUTBOL</h3>
            </div>

            <div class="box-body">
              <strong><i class="fa fa-line-chart margin-r-5"></i>Estadísticas MVP</strong>

              <ul class="nav nav-stacked">
                <li><a href="#">Ganadas <span class="pull-right badge bg-green">31</span></a></li>
                <li><a href="#">Anuladas <span class="pull-right badge bg-yellow">5</span></a></li>
                <li><a href="#">Perdidas <span class="pull-right badge bg-red">12</span></a></li>
                <li><a href="#">Pendientes <span class="pull-right badge bg-aqua">842</span></a></li>
              </ul>

              <hr>

            </div>

            <div class="box-body">
              <strong><i class="fa fa-line-chart margin-r-5"></i>Estadísticas Recomendadas</strong>

              <ul class="nav nav-stacked">
                <li><a href="#">Ganadas <span class="pull-right badge bg-green">31</span></a></li>
                <li><a href="#">Anuladas <span class="pull-right badge bg-yellow">5</span></a></li>
                <li><a href="#">Perdidas <span class="pull-right badge bg-red">12</span></a></li>
                <li><a href="#">Pendientes <span class="pull-right badge bg-aqua">842</span></a></li>
              </ul>

              <hr>

            </div>

          </div>

        </div>';

        }

      ?>

        <!-- FINAL -->
      </div>
  </section>
</div>