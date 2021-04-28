<?php

/* 
* datos para las cajas
*/

$empresa = $_SESSION["empresa"];
//var_dump($empresa);

$totalMiembros = ControladorEscritorio::ctrTotalMiembros($empresa);
//var_dump($totalMiembros["total_miembros"]);

$totalMiembrosNuevos = ControladorEscritorio::ctrTotalMiembrosNuevos($empresa);
//var_dump($totalMiembros["total_miembros"]);

$renovaciones = ControladorEscritorio::ctrTotalRenovaciones($empresa);
//var_dump($totalMiembros["total_miembros"]);

$porVencer = ControladorEscritorio::ctrTotalPorVencer($empresa);
//var_dump($totalMiembros["total_miembros"]);

?>



<div class="col-lg-3 col-xs-6">

  <div class="small-box bg-blue">
    
    <div class="inner">
      
      <h3><?php echo number_format($totalMiembros["total_miembros"],0); ?></h3>

      <p>Total Miembros</p>
    
    </div>
    
    <div class="icon">
      
      <i class="fa fa-users"></i>
    
    </div>
    
    <a href="membresias" class="small-box-footer">
      
      Más info <i class="fa fa-arrow-circle-right"></i>
    
    </a>

  </div>

</div>

<div class="col-lg-3 col-xs-6">

  <div class="small-box bg-green">
    
    <div class="inner">
    
      <h3><?php echo number_format($totalMiembrosNuevos["total_miembros"],0); ?></h3>

      <p>Miembros Nuevos</p>
    
    </div>
    
    <div class="icon">
    
      <i class="fa fa-user"></i>
    
    </div>
    
    <a href="membresias-nuevas" class="small-box-footer">
      
      Más info <i class="fa fa-arrow-circle-right"></i>
    
    </a>

  </div>

</div>

<div class="col-lg-3 col-xs-6">

  <div class="small-box bg-aqua">
    
    <div class="inner">
    
      <h3><?php echo number_format($renovaciones["renovaciones"],0); ?></h3>

      <p>Miembros Renovados</p>
  
    </div>
    
    <div class="icon">
    
      <i class="fa fa-refresh"></i>
    
    </div>
    
    <a href="membresias-renovadas" class="small-box-footer">

      Más info <i class="fa fa-arrow-circle-right"></i>

    </a>

  </div>

</div>

<div class="col-lg-3 col-xs-6">

  <div class="small-box bg-red">
  
    <div class="inner">
    
      <h3><?php echo number_format($porVencer["por_vencer"],0); ?></h3>

      <p>Membresias por caducar</p>
    
    </div>
    
    <div class="icon">
      
      <i class="fa fa-exclamation-circle"></i>
    
    </div>
    
    <a href="membresias-caducadas" class="small-box-footer">
      
      Más info <i class="fa fa-arrow-circle-right"></i>
    
    </a>

  </div>

</div>

