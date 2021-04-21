<div class="content-wrapper">

    <section class="content-header">

        <h1>

            Administrar miembros

        </h1>

        <ol class="breadcrumb">

            <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>

            <li class="active">Administrar miembros</li>

        </ol>

    </section>

    <section class="content">

        <div class="box">

            <div class="box-header with-border">

                <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarMiembros">

                    Agregar miembros

                </button>

            </div>

            <div class="box-body">

                <table class="table table-bordered table-striped dt-responsive table-condensed tablaMiembros">

                    <thead>

                        <tr>

                            <th style="width:10px">#</th>
                            <th>Nombres</th>
                            <th>Documento</th>
                            <th>Perfil</th>
                            <th>Celular</th>
                            <th>Correo</th>
                            <th>Red Social</th>
                            <th>Usuario</th>
                            <th>Estado</th>
                            <th>Empresa</th>
                            <th>Membresia</th>
                            <th>Fecha creación</th>
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
MODAL AGREGAR MIEMBRO
======================================-->

<div id="modalAgregarMiembros" class="modal fade" role="dialog">

    <div class="modal-dialog">

        <div class="modal-content">

            <form role="form" method="post" enctype="multipart/form-data">

                <!--=====================================
                CABEZA DEL MODAL
                ======================================-->

                <div class="modal-header" style="background:#3c8dbc; color:white">

                    <button type="button" class="close" data-dismiss="modal">&times;</button>

                    <h4 class="modal-title">Agregar miembros</h4>

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
                
                                                <select class="form-control input-md" name="empresa">';

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

                                echo'<input type="hidden" name="empresa" value="'.$empresa.'">';

                            }
                        
                        
                        ?>

                        <!-- ENTRADA PARA EL NOMBRE -->

                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-user"></i></span>

                                <input type="text" class="form-control input-md" name="nuevoNombre"    placeholder="Ingresar nombre" required>

                            </div>

                        </div>

                        <!-- ENTRADA PARA EL DOCUMENTO -->

                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-address-card"></i></span>

                                <input type="text" class="form-control input-md" name="nuevoDocumento" placeholder="Ingresar documento" required>

                            </div>

                        </div>

                        <!-- ENTRADA PARA EL CELULAR -->

                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-phone"></i></span>

                                <input type="text" class="form-control input-md" name="nuevoCelular" placeholder="Ingresar celular" data-inputmask="'mask':'999-999-999'" data-mask required>

                            </div>

                        </div>

                        <!-- Email -->

                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-envelope"></i></span>

                                <input type="email" class="form-control" name="nuevoEmail" placeholder="Ingrese el Correo del Cliente" maxlength="200" required>

                            </div>

                        </div>

                        <!-- ENTRADA PARA SELECCIONAR SU RED SOCIAL -->

                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-users"></i></span>

                                <select class="form-control input-md" name="nuevaRedSocial">

                                <?php

                                $item = null;
                                $valor = null;

                                $social = ControladorSocial::ctrMostrarSocial($item, $valor);

                                foreach ($social as $key => $value) {

                                echo '<option value="' . $value["id_red_social"] . '">' . $value["nombre_red_social"] . '</option>';
                                }

                                ?>

                                </select>

                            </div>

                        </div>

                        <!-- ENTRADA PARA EL PERFIL -->

                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-lock"></i></span>

                                <input type="text" class="form-control input-md" name="nuevoPerfil" placeholder="Ingresar usuario" required>

                            </div>

                        </div>

                        <!-- ENTRADA PARA SUBIR FOTO -->

                        <div class="form-group">

                            <div class="panel">SUBIR FOTO</div>

                            <input type="file" class="form-control input-md nuevaFotoMiembro" id="nuevaFotoMiembro" name="nuevaFotoMiembro">

                            <p class="help-block">Peso máximo de la foto 2 MB</p>

                            <img src="vistas/img/miembros/default/anonymous.png" class="img-thumbnail previsualizarM" width="100px">

                        </div>

                    </div>

                </div>

                <!--=====================================
                PIE DEL MODAL
                ======================================-->

                <div class="modal-footer">

                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

                    <button type="submit" class="btn btn-primary">Guardar usuario</button>

                </div>

                <?php

                $crearMiembro = new ControladorMiembros();
                $crearMiembro -> ctrCrearMiembro();
                
                ?>

            </form>

        </div>

    </div>

</div>

<script>
window.document.title = "Miembros"
</script>