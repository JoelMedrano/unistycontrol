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

                <table class="table table-bordered table-striped dt-responsive tablas">

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
                            <th>Fecha creación</th>
                            <th>Acciones</th>

                        </tr>

                    </thead>

                    <tbody>

                        <tr>
                            <td>1</td>
                            <td>JOEL MEDRANO GUERE</td>
                            <td>47281037</td>
                            <td><img src="vistas/img/usuarios/default/anonymous.png" class="img-thumbnail" width="40px"></td>
                            <td>982-009-013</td>
                            <td>jvmedranog@gmail.com</td>
                            <td>Instagram</td>
                            <td>joeycrisis</td>
                            <td><button class="btn btn-success btn-xs">Activado</button></td>
                            <td>2017-12-11 12:05:32</td>
                            <td>

                                <div class="btn-group">

                                    <button class="btn btn-warning"><i class="fa fa-pencil"></i></button>

                                    <button class="btn btn-danger"><i class="fa fa-times"></i></button>

                                </div>

                            </td>

                        </tr>

                    </tbody>

                </table>

            </div>

        </div>

    </section>

</div>

<!--=====================================
MODAL AGREGAR USUARIO
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

                        <!-- ENTRADA PARA EL NOMBRE -->

                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-user"></i></span>

                                <input type="text" class="form-control input-md" name="nuevoNombre"
                                    placeholder="Ingresar nombre" required>

                            </div>

                        </div>

                        <!-- ENTRADA PARA EL DOCUMENTO -->

                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-user"></i></span>

                                <input type="text" class="form-control input-md" name="nuevoDocumento"
                                    placeholder="Ingresar documento" required>

                            </div>

                        </div>                        

                        <!-- ENTRADA PARA EL CELULAR -->

                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-phone"></i></span>

                                <input type="text" class="form-control input-md" name="nuevoCelular"
                                    placeholder="Ingresar celular" data-inputmask="'mask':'999-999-999'"
                                    data-mask required>

                            </div>

                        </div>

                        <!-- Email -->

                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-envelope"></i></span>

                                <input type="email" class="form-control" name="nuevoEmail"
                                    placeholder="Ingrese el Correo del Cliente" maxlength="200" required>

                            </div>

                        </div>                        

                        <!-- ENTRADA PARA LA RED SOCIAL -->

                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-lock"></i></span>

                                <input type="text" class="form-control input-md" name="nuevaRedSocial"
                                    placeholder="Ingresar Red Social" required>

                            </div>

                        </div>

                        <!-- ENTRADA PARA SELECCIONAR SU PERFIL -->

                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-users"></i></span>

                                <select class="form-control input-md" name="nuevoPerfil">

                                    <option value="">Selecionar perfil</option>

                                    <option value="Administrador">Administrador</option>

                                    <option value="Especial">Especial</option>

                                    <option value="Vendedor">Vendedor</option>

                                </select>

                            </div>

                        </div>

                        <!-- ENTRADA PARA SUBIR FOTO -->

                        <div class="form-group">

                            <div class="panel">SUBIR FOTO</div>

                            <input type="file" id="nuevaFoto" name="nuevaFoto">

                            <p class="help-block">Peso máximo de la foto 200 MB</p>

                            <img src="vistas/img/usuarios/default/anonymous.png" class="img-thumbnail" width="100px">

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

            </form>

        </div>

    </div>

</div>
