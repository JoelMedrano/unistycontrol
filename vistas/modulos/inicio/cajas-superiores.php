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



?>



<div class="col-lg-3 col-xs-6">

  <div class="small-box bg-blue">
    
    <div class="inner">
      
      <h3><?php echo number_format($totalMiembros["total_miembros"],0); ?> miembros</h3>

      <p>Total Miembros</p>
    
    </div>
    
    <div class="icon">
      
      <i class="fa fa-users"></i>
    
    </div>
    
    <a href="#" class="small-box-footer">
      
      Más info <i class="fa fa-arrow-circle-right"></i>
    
    </a>

  </div>

</div>

<div class="col-lg-3 col-xs-6">

  <div class="small-box bg-green">
    
    <div class="inner">
    
      <h3><?php echo number_format($totalMiembrosNuevos["total_miembros"],0); ?> und</h3>

      <p>Miembros Nuevos</p>
    
    </div>
    
    <div class="icon">
    
      <i class="fa fa-user"></i>
    
    </div>
    
    <a href="#" class="small-box-footer">
      
      Más info <i class="fa fa-arrow-circle-right"></i>
    
    </a>

  </div>

</div>

<div class="col-lg-3 col-xs-6">

  <div class="small-box bg-yellow">
    
    <div class="inner">
    
      <h3><?php echo number_format($articulosP["pedidos"],0); ?></h3>

      <p>Unidades en Pedidos</p>
  
    </div>
    
    <div class="icon">
    
      <i class="fa fa-id-card-o"></i>
    
    </div>
    
    <a href="tarjetas" class="small-box-footer">

      Más info <i class="fa fa-arrow-circle-right"></i>

    </a>

  </div>

</div>

<div class="col-lg-3 col-xs-6">

  <div class="small-box bg-red">
  
    <div class="inner">
    
      <h3><?php echo number_format($articulosF["faltantes"],0); ?></h3>

      <p>Unidades faltantes: <?php echo $porcentaje; ?> %</p>
    
    </div>
    
    <div class="icon">
      
      <i class="fa fa-check-circle-o"></i>
    
    </div>
    
    <a href="articulos" class="small-box-footer">
      
      Más info <i class="fa fa-arrow-circle-right"></i>
    
    </a>

  </div>

</div>

