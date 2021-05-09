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

        $empresa = $_SESSION["empresa"];

        $membresias = ControladorMembresias::ctrSelecTipoMembresias($empresa);
        //var_dump($membresias);

        foreach($membresias as $key => $value){

          $tipo_membresia = $value["id_tipo_membresia"];
          //var_dump($tipo_membresia);

          $totales = ControladorEscritorio::ctrMvpTotales($empresa, $tipo_membresia);
          //var_dump($totales);

          $ganadas = ControladorEscritorio::ctrMvpGanadas($empresa, $tipo_membresia);
          //var_dump($ganadas);

          $perdidas = ControladorEscritorio::ctrMvpPerdidas($empresa, $tipo_membresia);
          //var_dump($perdidas);
          
          $anuladas = ControladorEscritorio::ctrMvpAnuladas($empresa, $tipo_membresia);
          //var_dump($anuladas);
          
          $pendientes = ControladorEscritorio::ctrMvpPendientes($empresa, $tipo_membresia);
          //var_dump($pendientes);

          $arriba = $ganadas["total_ganadas"];
          //var_dump((float)$arriba);

          $abajo = ($totales["total_mvp"]-$anuladas["total_anuladas"]-$pendientes["total_pendientes"]);
          //var_dump((float)$abajo);

          if((float)$arriba > 0 && (float)$abajo >0){

            //var_dump("bien");
            $efectividad = $arriba/$abajo*100;
            //var_dump($efectividad);

          }else{

            //var_dump("mal");
            $efectividad = 0;
            //var_dump($efectividad);

          }
          
          $cuota = ControladorEscritorio::ctrMvpCuota($empresa, $tipo_membresia);
          //var_dump($cuota);

          $ultimo_mvp=ControladorEscritorio::ctrUltimoMVP($empresa, $tipo_membresia);
          //var_dump($ultimo_mvp);

          echo '<div class="col-md-3">

          <div class="box box-primary">
            <div class="box-body box-profile">';

            $item = 'id_empresa';            
            $empresaDatos = ControladorEmpresas::ctrMostrarEmpresas($item, $empresa);
            //var_dump($empresaDatos);

            if($empresaDatos["logo1"] != ""){

              echo '<img src="'.$empresaDatos["logo1"].'" class="profile-user-img img-responsive img-circle" alt="User profile picture">';

            }else{


                echo '<img src="vistas/img/usuarios/default/anonymous.png" class="profile-user-img img-responsive img-circle" alt="User profile picture">';

            }

            echo'<h3 class="profile-username text-center">'.$empresaDatos["nombre"].'</h3>
              <p class="text-muted text-center">'.$value["nombre_membresia"].'</p>

              <ul class="list-group list-group-unbordered" style="margin-bottom:0">
                <li class="list-group-item" style="height:55px;  align-items:center">
                <h4><b>Efectividad MVP</b> <a class="pull-right"><b>'.$efectividad.' %</b></a></h4>
                </li>
                <li class="list-group-item">
                  <b>Cuota Promedio</b> <a class="pull-right"><b>',number_format($cuota["promedio_cuota"],2),'</b></a>
                </li>
              </ul>

            </div>

          </div>

          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">'.$value["nombre_membresia"].'</h3>
            </div>

            <div class="box-body">
              <strong><i class="fa fa-line-chart margin-r-5"></i>Estadísticas MVP <span class="pull-right badge bg-black">'.$totales["total_mvp"].'</span></strong>

              <ul class="nav nav-stacked" style="margin-bottom:0">
                <li><a href="#">Ganadas <span class="pull-right badge bg-green">'.$arriba.'</span></a></li>
                <li><a href="#">Anuladas <span class="pull-right badge bg-yellow">'.$anuladas["total_anuladas"].'</span></a></li>
                <li><a href="#">Perdidas <span class="pull-right badge bg-red">'.$perdidas["total_perdidas"].'</span></a></li>
                <li><a href="#">Pendientes <span class="pull-right badge bg-aqua">'.$pendientes["total_pendientes"].'</span></a></li>
              </ul>

              <strong><i class="fa fa-map-marker margin-r-5"></i> Último MVP</strong>

              <ul class="list-group list-group-unbordered">

                <li class="list-group-item" style="height:70px;">
                  <b>Partido</b> <a class="pull-right">'.$ultimo_mvp["partido"].'</a>
                </li>
                <li class="list-group-item">
                  <b>Cuota</b> <a class="pull-right">'.$ultimo_mvp["cuota"].'</a>
                </li>
                <li class="list-group-item" style="height:80px;  align-items:center" >
                  <b>Pronóstico</b> <a class="pull-right">'.$ultimo_mvp["pronostico"].'</a>
                </li>

              </ul>

              <strong><i class="fa fa-pencil margin-r-5"></i> Resutado</strong>

              <div atyle="align-item:center">';

                if($ultimo_mvp["estado"] == '1'){

                  echo '<span class="label label-success">Ganada</span>
                  <span class="label label-default">Anulada</span>
                  <span class="label label-default">Perdida</span>
                  <span class="label label-default">Pendiente</span>';

                }else if($ultimo_mvp["estado"] == '2'){

                  echo '<span class="label label-default">Ganada</span>
                  <span class="label label-warning">Anulada</span>
                  <span class="label label-default">Perdida</span>
                  <span class="label label-default">Pendiente</span>';

                }else if ($ultimo_mvp["estado"] == '3'){

                  echo '<span class="label label-default">Ganada</span>
                  <span class="label label-default">Anulada</span>
                  <span class="label label-danger">Perdida</span>
                  <span class="label label-default">Pendiente</span>';

                }else{

                  echo '<span class="label label-default">Ganada</span>
                  <span class="label label-default">Anulada</span>
                  <span class="label label-default">Perdida</span>
                  <span class="label label-info">Pendiente</span>';

                }

              echo '</div>

              <hr>

              <strong><i class="fa fa-asterisk margin-r-5"></i> Validado Por</strong>
              <div align="center">
              
              <img src="vistas/img/plantilla/logo-largo-v2.jpeg" width="200" height="50" align="center">
              </div>
              
            </div>

          </div>

        </div>';

        }

      ?>

      <?php

            $empresas = ControladorEscritorio::ctrEmpresasPerfilUnido($_SESSION["empresa"]);
            //var_dump($empresas);

            foreach($empresas as $key => $value){

                $membresias = ControladorMembresias::ctrSelecTipoMembresias($value["id_empresa"]);
                //var_dump($membresias);

                foreach($membresias as $key => $value2){

                    $totalesMVP = ControladorEscritorio::ctrMvpTotales($value["id_empresa"], $value2["id_tipo_membresia"]);
                    //var_dump($totalesMVP);

                    $ganadasMVP = ControladorEscritorio::ctrMvpGanadas($value["id_empresa"], $value2["id_tipo_membresia"]);
                    //var_dump($ganadasMVP);
          
                    $perdidasMVP = ControladorEscritorio::ctrMvpPerdidas($value["id_empresa"], $value2["id_tipo_membresia"]);
                    //var_dump($ganadasMVP);
                    
                    $anuladasMVP = ControladorEscritorio::ctrMvpAnuladas($value["id_empresa"], $value2["id_tipo_membresia"]);
                    //var_dump($ganadasMVP);
                    
                    $pendientesMVP = ControladorEscritorio::ctrMvpPendientes($value["id_empresa"], $value2["id_tipo_membresia"]);
                    //var_dump($pendientesMVP);

                    $arribaMVP = $ganadasMVP["total_ganadas"];
                    //var_dump((float)$arribaMVP);
          
                    $abajoMVP = ($totalesMVP["total_mvp"]-$anuladasMVP["total_anuladas"]-$pendientesMVP["total_pendientes"]);
                    //var_dump((float)$abajoMVP);

                    if((float)$arribaMVP > 0 && (float)$abajoMVP >0){

                        //var_dump("bien");
                        $efectividadMVP = $arribaMVP/$abajoMVP*100;
                        //var_dump($efectividadMVP);
            
                      }else{
            
                        //var_dump("mal");
                        $efectividadMVP = 0;
                        //var_dump($efectividadMVP);
            
                      }
                      
                      $cuotaMVP = ControladorEscritorio::ctrMvpCuota($value["id_empresa"], $value2["id_tipo_membresia"]);
                      //var_dump($cuotaMVP);

                      /* 
                      *NORMALES 
                      */
                      
                      $totalesNormal = ControladorEscritorio::ctrNormalTotales($value["id_empresa"], $value2["id_tipo_membresia"]);
                      //var_dump($totalesNormal);
  
                      $ganadasNormal = ControladorEscritorio::ctrNormalGanadas($value["id_empresa"], $value2["id_tipo_membresia"]);
                      //var_dump($ganadasNormal);
            
                      $perdidasNormal = ControladorEscritorio::ctrNormalPerdidas($value["id_empresa"], $value2["id_tipo_membresia"]);
                      //var_dump($ganadasNormal);
                      
                      $anuladasNormal = ControladorEscritorio::ctrNormalAnuladas($value["id_empresa"], $value2["id_tipo_membresia"]);
                      //var_dump($ganadasNormal);
                      
                      $pendientesNormal = ControladorEscritorio::ctrNormalPendientes($value["id_empresa"], $value2["id_tipo_membresia"]);
                      //var_dump($pendientesNormal);
                      
                      $arribaNormal = $ganadasNormal["total_ganadas"];
                      //var_dump((float)$arribaNormal);
            
                      $abajoNormal = ($totalesNormal["total_Normal"]-$anuladasNormal["total_anuladas"]-$pendientesNormal["total_pendientes"]);
                      //var_dump((float)$abajoNormal);
                      
                      if((float)$arribaNormal > 0 && (float)$abajoNormal >0){

                        //var_dump("bien");
                        $efectividadNormal = $arribaNormal/$abajoNormal*100;
                        //var_dump($efectividadNormal);
            
                      }else{
            
                        //var_dump("mal");
                        $efectividadNormal = 0;
                        //var_dump($efectividadNormal);
            
                      }
                      
                      $cuotaNormal = ControladorEscritorio::ctrNormalCuota($value["id_empresa"], $value2["id_tipo_membresia"]);
                      //var_dump($cuotaNormal);                      
                    
                    echo'<div class="col-md-3">

                    <div class="box box-primary">
                        <div class="box-body box-profile">';
    
                        $item = 'id_empresa';            
                        $empresaDatos = ControladorEmpresas::ctrMostrarEmpresas($item, $value["id_empresa"]);
                        //var_dump($empresaDatos);
            
                        if($empresaDatos["logo1"] != ""){
            
                          echo '<img src="'.$empresaDatos["logo1"].'" class="profile-user-img img-responsive img-circle" alt="User profile picture">';
            
                        }else{
            
            
                            echo '<img src="vistas/img/usuarios/default/anonymous.png" class="profile-user-img img-responsive img-circle" alt="User profile picture">';
            
                        }
    
                            echo'<h3 class="profile-username text-center">'.$empresaDatos["nombre"].'</h3>
                            <p class="text-muted text-center">'.$value2["nombre_membresia"].'</p>
    
                            <ul class="list-group list-group-unbordered" style="margin-bottom:0">
                                <li class="list-group-item">
                                    <b>Efectividad MVP</b> <span class="pull-right" style="background: #efb810"><b>'.number_format($efectividadMVP,2).' %</b></span>
                                </li>
                                <li class="list-group-item">
                                    <b>Cuota Promedio</b> <a class="pull-right"><b>',number_format($cuotaMVP["promedio_cuota"],2),'</b></a>
                                </li>
                                <li class="list-group-item">
                                    <b>Efectividad Recomendadas</b> <span class="pull-right" style="background:#000000; color:#ffffff"><b>'.number_format($efectividadNormal,2).' %</b></span>
                                </li>
                                <li class="list-group-item">
                                    <b>Cuota Promedio</b> <a class="pull-right"><b>',number_format($cuotaNormal["promedio_cuota_normal"],2),'</b></a>
                                </li>
                            </ul>
    
                        </div>
    
                    </div>
    
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">'.$value2["nombre_membresia"].'</h3>
                        </div>
    
                        <div class="box-body">
                            <strong><i class="fa fa-line-chart margin-r-5"></i>Estadísticas MVP <span class="pull-right badge bg-black">'.$totalesMVP["total_mvp"].'</span></strong>
    
                            <ul class="nav nav-stacked" style="margin-bottom:0">
                                <li><a href="#">Ganadas <span class="pull-right badge bg-green">'.$arribaMVP.'</span></a></li>
                                <li><a href="#">Anuladas <span class="pull-right badge bg-yellow">'.$anuladasMVP["total_anuladas"].'</span></a></li>
                                <li><a href="#">Perdidas <span class="pull-right badge bg-red">'.$perdidasMVP["total_perdidas"].'</span></a></li>
                                <li><a href="#">Pendientes <span class="pull-right badge bg-aqua">'.$pendientesMVP["total_pendientes"].'</span></a></li>
                            </ul>
    
                            <strong><i class="fa fa-line-chart margin-r-5"></i>Estadísticas Recomendadas <span class="pull-right badge bg-black">'.$totalesNormal["total_Normal"].'</span></strong>
    
                            <ul class="nav nav-stacked" style="margin-bottom:0">
                                <li><a href="#">Ganadas <span class="pull-right badge bg-green">'.$arribaNormal.'</span></a></li>
                                <li><a href="#">Anuladas <span class="pull-right badge bg-yellow">'.$anuladasNormal["total_anuladas"].'</span></a></li>
                                <li><a href="#">Perdidas <span class="pull-right badge bg-red">'.$perdidasNormal["total_perdidas"].'</span></a></li>
                                <li><a href="#">Pendientes <span class="pull-right badge bg-aqua">'.$pendientesNormal["total_pendientes"].'</span></a></li>
                            </ul>
    
                            <strong><i class="fa fa-asterisk margin-r-5"></i> Validado Por</strong>
                            <div align="center">
    
                                <img src="vistas/img/plantilla/logo-largo-v2.jpeg" width="200" height="50" align="center">
    
                            </div>
    
                        </div>
    
                    </div>
    
                </div>';                    

                }

            }

      ?>

      <div class="col-md-6 box-body">

        <div class="box-body">
        <input type="hidden" value="<?= $_SESSION["perfil"]; ?>" id="perfilOculto"> 
          <table class="table table-bordered table-striped dt-responsive table-condensed tablaApuestas">

              <thead>

                  <tr>

                      <th style="width:10px">#</th>
                      <th style="width:300px">Partido</th>                            
                      <th>Estado</th>
                      <th>Cuota</th>
                      <th style="width:40px">Monto</th>
                      <th style="width:300px">Pronóstico</th> 
                      <th>Tipo</th>
                      <th>Fecha</th>                                         
                      <th style="width:150px">Resultado</th>
                      <th>Empresa</th>
                      <th>Membresía</th>
                      <th>Acciones</th>

                  </tr>

              </thead>

              <tbody>

              </tbody>

          </table>

        </div>      
      
      </div>

        <!-- FINAL -->
      </div>
  </section>
</div>

<script>
window.document.title = "Perfil Empresa'"
</script>