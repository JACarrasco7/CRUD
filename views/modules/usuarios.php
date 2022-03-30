<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Usuarios</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                        <li class="breadcrumb-item active"><?php echo (isset($_GET['ruta']) and $_GET['ruta'] != 'inicio') ? $_GET['ruta'] : 'Administracion' ?></li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarUsuario">Añadir usuarios</button>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-hover dt-responsive tablas">
                    <thead>
                        <tr>
                            <th class="align-middle text-center">Nº</th>
                            <th class="align-middle text-center">Id</th>
                            <th class="align-middle">Nombre</th>
                            <th class="align-middle">Usuario</th>
                            <th class="align-middle text-center">Foto</th>
                            <th class="align-middle">Perfil</th>
                            <th class="align-middle text-center">Estado</th>
                            <th class="align-middle">Ultimo acceso</th>
                            <th class="align-middle">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $campo = null;
                        $valor = null;

                        $mostrar_usuario = new usuariosController();
                        $usuarios = $mostrar_usuario->ctrMostrarUsuarios($campo, $valor);
                        foreach ($usuarios as $clave => $valor) {
                            ?>
                            <tr>
                                <td class="align-middle text-center"><?php echo $clave + 1 ?></td>
                                <td class="align-middle text-center"><?php echo $valor["id"] ?></td>
                                <td class="align-middle"><?php echo $valor["nombre"] ?></td>
                                <td class="align-middle"><?php echo $valor["usuario"] ?></td>
                                <td class="align-middle text-center"><?php
                                                                            if ($valor["foto"] != "") {
                                                                                echo ' <img src="' . $valor["foto"] . '" class="user-image" alt="Imagen de usuario" width="40px">';
                                                                            } else {
                                                                                echo ' <img src="views/img/usuarios/default/default.jpg" class="user-image" alt="Imagen de usuario" width="40px">';
                                                                            }
                                                                            ?></td>
                                <td class="align-middle"><?php echo $valor["perfil"] ?></td>
                                <?php
                                    if ($valor["estado"] != 0) {
                                        echo '<td><button class="btn btn-success btn-xs btnActivar" idUsuario="' . $valor["id"] . '" estadoUsuario="0">Activado</button></td>';
                                    } else {
                                        echo '<td><button class="btn btn-danger btn-xs btnActivar" idUsuario="' . $valor["id"] . '" estadoUsuario="1">Desactivado</button></td>';
                                    }
                                    ?>
                                </td>
                                <td class="align-middle"><?php echo $valor["ultimo_login"] ?></td>
                                <td class="align-middle">
                                    <div class="btn-group">
                                        <button class="btn btn-warning btnEditarUsuario" idUsuario="<?php echo $valor["id"]; ?>" data-toggle="modal" data-target="#modalEditarUsuario">
                                            <i class="fas fa-user-edit"></i>
                                        </button>
                                        <button class="btn btn-danger btnEliminarUsuario" idUsuario="<?php echo $valor["id"]; ?>" fotoUsuario="<?php echo $valor["foto"]; ?>" usuario="<?php echo $valor["usuario"]; ?>">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        <?php
                        } ?>
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
            </div>
            <!-- /.card -->

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- INSERTAR -->
<div class="modal" id="modalAgregarUsuario">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header sidebar-dark-primary" style="color:#C2C7D0">
                <h4 class="modal-title">Agregar usuario</h4>
                <button type="button" class="close" data-dismiss="modal" style="color:#D0D3D4">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form role="form" method="POST" action="" enctype="multipart/form-data">
                    <!-- Nombre -->
                    <div class="form-group">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fa fa-user"></i>
                                </span>
                            </div>
                            <input type="text" class="form-control" name="nuevoNombre" placeholder="Introduzca el nombre" required>
                        </div>
                    </div>
                    <!-- usuario -->
                    <div class="form-group">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fa fa-lock"></i>
                                </span>
                            </div>
                            <input type="text" class="form-control input-lg" name="nuevoUsuario" id="nuevoUsuario" placeholder="Introduzca el usuario" required="">
                        </div>
                    </div>
                    <!-- password -->
                    <div class="form-group">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fa fa-key"></i>
                                </span>
                            </div>
                            <input type="password" class="form-control input-lg" name="nuevoPassword" placeholder="Introduzca la contraseña" required="">
                        </div>
                    </div>
                    <!-- perfil -->
                    <div class="form-group">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fa fa-users"></i>
                                </span>
                            </div>
                            <select class="form-control input-lg" name="nuevoPerfil">
                                <option value="">Seleccionar el perfil</option>
                                <option value="Administrador">Administrador</option>
                                <option value="Especial">Especial</option>
                                <option value="Venderdor">Vendedor</option>
                            </select>
                        </div>
                    </div>
                    <!-- subir foto -->
                    <div class="form-group">
                        <div class="panel">Subir foto</div>
                        <input type="file" class="nuevaFoto" name="nuevaFoto">
                        <p class="help-block">Peso maximo de la foto: 2Mb</p>
                        <img src="views/img/usuarios/default/default.jpg" class="img-thumbnail previsualizar2" width="100px">
                    </div>
            </div>
            <?php
            $crearUsuario = new usuariosController();
            $crearUsuario->ctrInsertarUsuario();
            ?>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
            </form>
        </div>
    </div>
</div>

<!-- EDITAR -->
<div class="modal" id="modalEditarUsuario">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header sidebar-dark-primary" style="color:#C2C7D0">
                <h4 class="modal-title">Editar usuario</h4>
                <button type="button" class="close" data-dismiss="modal" style="color:#D0D3D4">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form role="form" method="POST" action="" enctype="multipart/form-data">
                    <!-- Nombre -->
                    <div class="form-group">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fa fa-user"></i>
                                </span>
                            </div>
                            <input type="text" class="form-control" id="editarNombre" name="editarNombre" value="" required>
                        </div>
                    </div>
                    <!-- usuario -->
                    <div class="form-group">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fa fa-lock"></i>
                                </span>
                            </div>
                            <input type="text" class="form-control input-lg" id="editarUsuario" name="editarUsuario" readonly>
                        </div>
                    </div>
                    <!-- password -->
                    <div class=" form-group">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fa fa-key"></i>
                                </span>
                            </div>
                            <input type="password" class="form-control input-lg" name="editarPassword" placeholder="escriba la nueva contraseña">
                            <input type="hidden" id="passwordActual" name="passwordActual">
                        </div>
                    </div>
                    <!-- perfil -->
                    <div class="form-group">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fa fa-users"></i>
                                </span>
                            </div>
                            <select class="form-control input-lg" name="editarPerfil">
                                <option value="" id="editarPerfil"></option>
                                <option value="Administrador">Administrador</option>
                                <option value="Especial">Especial</option>
                                <option value="Venderdor">Vendedor</option>
                            </select>
                        </div>
                    </div>
                    <!-- subir foto -->
                    <div class="form-group">
                        <div class="panel">Subir foto</div>
                        <input type="file" class="nuevaFoto" name="editarFoto">
                        <p class="help-block">Peso maximo de la foto: 2Mb</p>
                        <img src="views/img/usuarios/default/default.jpg" class="img-thumbnail previsualizar" width="100px">
                        <input type="hidden" name="fotoActual" id=fotoActual>
                    </div>
            </div>
            <?php
            $crearUsuario = new usuariosController();
            $crearUsuario->ctrEditarUsuario();
            ?>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-primary">Editar usuario</button>
            </div>
            </form>
        </div>
    </div>
</div>

<?php
$crearUsuario = new usuariosController();
$crearUsuario->ctrBorrarUsuario();
?>