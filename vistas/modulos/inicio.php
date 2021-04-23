<div class="content-wrapper">

<section class="content-header">
    <h1>
        Dashboard Mes Actual

        <small>Página de control</small>

    </h1>

    <ol class="breadcrumb">

        <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>

        <li class="active">Dashboard</li>

    </ol>

</section>


<section class="content">

    <div class="col-lg-12">

        <?php


            echo '<div class="box box-success">

                    <div class="box-header">

                        <h1>Bienvenid@ ' .$_SESSION["nombre"].'</h1>

                    </div>

                 </div>';


        ?>

    </div>    

    <div class="row">

        <?php

            include "inicio/cajas-superiores.php";

        ?>

    </div>

</section>



</div>




