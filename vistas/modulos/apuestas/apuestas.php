<div class="content-wrapper">

    <section class="content-header">

        <h1>

            Administrar apuestas

        </h1>

        <ol class="breadcrumb">

            <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>

            <li class="active">Administrar apuestas</li>

        </ol>

    </section>

    <section class="content">

        <div class="box">

            <div class="box-header with-border">

                <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarApuestas">

                    Agregar apuestas

                </button>

            </div>

            <div class="box-body">

                <table class="table table-bordered table-striped dt-responsive table-condensed tablaApuestas">

                    <thead>

                        <tr>

                            <th style="width:10px">#</th>
                            <th>Empresa</th>
                            <th>Documento</th>
                            <th>Tipo</th>
                            <th>Fecha</th>
                            <th>Partido</th>
                            <th>Pronostico</th>
                            <th>Cuota</th>
                            <th>Estado</th>
                            <th style="width:150px">Resultado</th>
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
MODAL AGREGAR APPUESTAS
======================================-->

<div id="modalAgregarApuestas" class="modal fade" role="dialog">

    <div class="modal-dialog">

        <div class="modal-content">

            <form role="form" method="post" enctype="multipart/form-data">

                <!--=====================================
                CABEZA DEL MODAL
                ======================================-->

                <div class="modal-header" style="background:#3c8dbc; color:white">

                    <button type="button" class="close" data-dismiss="modal">&times;</button>

                    <h4 class="modal-title">Agregar apuestas</h4>

                </div>

                <!--=====================================
                CUERPO DEL MODAL
                ======================================-->

                <div class="modal-body">

                    <div class="box-body">

                        <?php

                            //var_dump($_SESSION["empresa"]);

                            $empresa = $_SESSION["empresa"];

                            if($empresa == '0'){

                                echo '  <div class="form-group">

                                            <div class="input-group">
    
                                                <span class="input-group-addon"><i class="fa fa-university"></i></span>
                
                                                <select class="form-control input-md selectpicker"  data-live-search="true" name="nuevaEmpresa"  id="nuevaEmpresa">
                                                <option value="">Seleccionar empresa</option>';

                                                $item = null;
                                                $valor = null;
                
                                                $empresas = ControladorEmpresas::ctrMostrarEmpresas($item, $valor);
                
                                                foreach ($empresas as $key => $value) {
                
                                                echo '<option value="' . $value["id_empresa"] . '">' . $value["nombre"] . '</option>';
                                                }
                

                                                echo '</select>

                                            </div>
                
                                        </div>';

                            }else{

                                echo'<input type="hidden" name="nuevaEmpresa" value="'.$empresa.'">';

                            }
                        
                        
                        ?>

                        <!-- ENTRADA TIPO DE MEMBRESIA -->

                        <?php

                        $empresa = $_SESSION["empresa"];
                        //var_dump($empresa);

                        if($empresa == '0'){

                            echo '<div class="form-group">

                                    <div class="input-group">

                                        <span class="input-group-addon"><i class="fa fa-credit-card-alt"></i></span>

                                        <select class="form-control input-md" name="nuevoTipoMembresia" id="nuevoTipoMembresia" disabled>

                                        </select>

                                    </div>

                                </div>';

                        }else{

                            echo '<div class="form-group">
                                    <label for="">Tipo de membresia</label>
                                    <div class="input-group">
                                    
                                    <span class="input-group-addon"><i class="fa fa-credit-card-alt"></i></span> 
                    
                                    <select  class="form-control input-md selectpicker" name="nuevoTipoMembresia" id="nuevoTipoMembresia" data-live-search="true" required>
                                        <option value="">Seleccionar tipo de membresia</option>';

                                        $valor=$_SESSION["empresa"];
                                        $empresas = ControladorMembresias::ctrSelecTipoMembresias($valor);
                    
                                        foreach ($empresas as $key => $value) {
                                          echo '<option value="' . $value["id_tipo_membresia"] . '">' .$value["nombre_membresia"] . '</option>';
                                        }

                            echo '</select>
                                    </div>
                    
                                </div>';

                        }
                        ?>

                        <!-- ENTRADA PARA SELECCIONAR TIPO DE APUESTA -->

                        <div class="form-group">
                        
                            <div class="input-group">
                            
                                <span class="input-group-addon"><i class="fa fa-asterisk"></i></span> 

                                <select class="form-control input-md" name="nuevoTipoApuesta">
                                
                                    <option value="">Selecionar Tipo Apuesta</option>

                                    <option value="1">Normal</option>

                                    <option value="2">VIP</option>

                                </select>

                            </div>

                        </div>


                        <!-- ENTRADA PARA LA FECHA -->

                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>

                                <input type="date" class="form-control input-md" name="nuevaFecha" value="<?php echo date("Y-m-d");?>">

                            </div>

                        </div>

                        <!-- ENTRADA PARA EL PARTIDO -->

                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-dribbble"></i></span>

                                <input type="text" class="form-control input-md" name="nuevoPartido" placeholder="Ingresar Partido" required>

                            </div>

                        </div>

                        <!-- ENTRADA PARA EL PRONOSTICO -->

                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-asterisk"></i></span>

                                <input type="text" class="form-control input-md" name="nuevoPronostico" placeholder="Ingresar Pronóstico" required>

                            </div>

                        </div>
                        
                        <!-- ENTRADA PARA LA CUOTA -->

                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-percent"></i></span>

                                <input type="numbres" step="any" class="form-control input-md" name="nuevaCuota" placeholder="Ingresa Cuota" required>

                            </div>

                        </div>                                                

                    </div>

                </div>

                <!--=====================================
                PIE DEL MODAL
                ======================================-->

                <div class="modal-footer">

                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

                    <button type="submit" class="btn btn-primary">Guardar apuestas</button>

                </div>

                <?php

                $crearApuestas = new ControladorApuestas();
                $crearApuestas -> ctrCrearApuesta();
                
                ?>

            </form>

        </div>

    </div>

</div>