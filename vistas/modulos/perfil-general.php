<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <div class="col-md-1">         
                
                <?php
                    $empresas = ControladorEscritorio::ctrEmpresasPerfil();
                    //var_dump($empresas);

                    foreach($empresas as $key => $value){

                        echo '<div class="box box-primary">
                                <div class="box-body box-profile">
                                    <img src="'.$value["logo1"].'" class="profile-user-img img-responsive img-circle" alt="User profile picture">
                                    </br>
                                    <button class="btn btn-primary btn-block btn-xs btnCodEmpresa" id="b'.$value["id_empresa"].'" name= "b'.$value["id_empresa"].'" codigo="'.$value["id_empresa"].'"><b>'.$value["nombre"].'</b></button>
                                </div>
                            </div>';

                    }
                ?>

            </div>

      <?php

            //var_dump($_GET["empresa"]);

            $empresas = ControladorEscritorio::ctrEmpresasPerfilUnido($_GET["empresa"]);
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
                      
                      /* 
                      *PORCENTAJES
                      */                    
                      $porcentajes = ControladorEscritorio::ctrPorcentajes($_GET["empresa"]);
                      //var_dump($porcentajes);

                      $arrayMvp = array();

                      foreach ($porcentajes as $key => $value) {
                    
                        $mvp = $value["efectividad_dia_mvp"];
                    
                        array_push($arrayMvp, $mvp);

                      }

                      $arrayNormal = array();

                      foreach ($porcentajes as $key => $value) {
                    
                        $normal = $value["efectividad_dia_normal"];
                    
                        array_push($arrayNormal, $normal);

                      }

                      $arrayDias = array();

                      foreach ($porcentajes as $key => $value) {
                    
                        $normal = $value["dia"];
                    
                        array_push($arrayDias, $normal);

                      }                      
                      

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
                                    <b>Efectividad MVP</b> <span class="pull-right badge bg-purple"><b>'.number_format($efectividadMVP,2).' %</b></span>
                                </li>
                                <li class="list-group-item">
                                    <b>Cuota Promedio</b> <a class="pull-right"><b>',number_format($cuotaMVP["promedio_cuota"],2),'</b></a>
                                </li>
                                <li class="list-group-item">
                                    <b>Efectividad Recomendadas</b> <span class="pull-right badge bg-orange"><b>'.number_format($efectividadNormal,2).' %</b></span>
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
                            <strong><i class="fa fa-line-chart margin-r-5 bg-purple"></i>Estadísticas MVP <span class="pull-right badge bg-purple">'.$totalesMVP["total_mvp"].'</span></strong>
    
                            <ul class="nav nav-stacked" style="margin-bottom:0">
                                <li><a href="#">Ganadas <span class="pull-right badge bg-green">'.$arribaMVP.'</span></a></li>
                                <li><a href="#">Anuladas <span class="pull-right badge bg-yellow">'.$anuladasMVP["total_anuladas"].'</span></a></li>
                                <li><a href="#">Perdidas <span class="pull-right badge bg-red">'.$perdidasMVP["total_perdidas"].'</span></a></li>
                                <li><a href="#">Pendientes <span class="pull-right badge bg-aqua">'.$pendientesMVP["total_pendientes"].'</span></a></li>
                            </ul>
    
                            <strong><i class="fa fa-line-chart margin-r-5 bg-orange"></i>Estadísticas Recomendadas <span class="pull-right badge bg-orange">'.$totalesNormal["total_Normal"].'</span></strong>
    
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

            <div class="col-md-8 box-primary">

            <div class="box box-body box-primary graficoLineasEmpresa">

            </div>

            <div class="box box-primary">
            
            <table class="table table-bordered table-striped dt-responsive table-condensed tablaApuestasPerfilV2">

                <thead>

                    <tr>
                        <th style="width:80px">Fecha</th>
                        <th style="width:400px">Partido</th>    
                        <th style="width:400px">Pronóstico</th> 
                        <th style="width:100px">Estado</th> 
                        <th style="width:100px">Cuota</th>                                       

                    </tr>

                </thead>

                <tbody>

                </tbody>

            </table>
            </div>

            </div>                  

        </div>
    </section>
</div>

<script>
window.document.title = "Perfil Empresas";

if(screen.width < 1024){

  //console.log("celular");

  $(".graficoLineasEmpresa").append(
    
    '<div class="chart">'+
      '<canvas id="line-chartEmpresa" width="300" height="300">></canvas>'+
    '</div>');

}else {

  //console.log("pc");

  $(".graficoLineasEmpresa").append(
    
    '<div class="chart">'+
      '<canvas id="line-chartEmpresa" width="800" height="227"></canvas>'+
    '</div>');

}


window.chartColors = {
  red: 'rgb(255, 99, 132)',
  orange: 'rgb(255, 159, 64)',
  yellow: 'rgb(255, 205, 86)',
  green: 'rgb(75, 192, 192)',
  blue: 'rgb(54, 162, 235)',
  purple: 'rgb(153, 102, 255)',
  grey: 'rgb(231,233,237)'
};

var line1 = [<?php

            $conteoA = count($arrayMvp);
            
            foreach($arrayMvp as $numeroA => $key){

              if($numeroA != $conteoA-1){

                echo "$key,";

              }else{

                echo "$key";

              }

            }

        ?>
];

var line2 = [<?php

            $conteoB = count($arrayNormal);

            foreach($arrayNormal as $numeroB => $key){

              if($numeroB != $conteoB-1){

                echo "$key,";

              }else{

                echo "$key";

              }

            }

            ?>
];

var dias = [<?php

            $conteoC = count($arrayDias);

            foreach($arrayDias as $numeroC => $key){

              if($numeroC != $conteoC-1){

                echo "$key,";

              }else{

                echo "$key";

              }

            }

            ?>
];
var configE = {
  type: 'line',
  data: {
    labels: dias,
    datasets: [{
      label: "MVP <?php echo number_format($efectividadMVP,2); ?> %",
      backgroundColor: window.chartColors.purple,
      borderColor: window.chartColors.purple,
      data: line1,
      fill: false
    }, {
      label: "Recomendada <?php echo number_format($efectividadNormal,2); ?> %",
      fill: false,
      backgroundColor: window.chartColors.orange,
      borderColor: window.chartColors.orange,
      data: line2,
      fill: false
    }]
  },
  options: {
    responsive: true,
    title:{
      display:true,
      text:'% de efectividad de Mayo'
    },
    tooltips: {
      mode: 'label',
      intersect: false,
      callbacks: {
                    label: function(tooltipItems, data) { 
                        return tooltipItems.yLabel + ' %';
                    }
                }
    },
   hover: {
      mode: 'label',
      intersect: true
    },
    scales: { 
      xAxes: [{
        display: true,
        scaleLabel: {
          display: true,
          labelString: 'Días'
        }
      }],
      yAxes: [{
        display: true,
        scaleLabel: {
          display: true,
        },
        ticks: {
                beginAtZero: true
        },
      }]
    }
  }
};

var ctxE = document.getElementById("line-chartEmpresa").getContext("2d");
var myLineE = new Chart(ctxE, configE);

</script>