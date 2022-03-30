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
                <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarCategoria">Añadir categoria</button>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped dt-responsive tablas">
                    <thead>
                        <tr>
                            <th class="align-middle text-center">Nº</th>
                            <th class="align-middle text-center">Id</th>
                            <th class="align-middle">Categoria</th>
                            <th class="align-middle">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $campo = null;
                        $valor = null;

                        $mostrar_categoria = new categoriasController();
                        $categoria = $mostrar_categoria->ctrMostrarCategorias($campo, $valor);

                        foreach ($categoria as $clave => $valor) {
                            ?>
                            <tr>
                                <td class="align-middle text-center"><?php echo $clave + 1 ?></td>
                                <td class="align-middle text-center"><?php echo $valor["idCategoria"] ?></td>
                                <td class="align-middle"><?php echo $valor["NombreCategoria"] ?></td>
                                <td class="align-middle">
                                    <div class="btn-group">
                                        <button class="btn btn-warning btnEditarCategoria" idCategoria="<?php echo $valor["id"]; ?>" data-toggle="modal" data-target="#modalEditarCategoria">
                                            <i class="fas fa-user-edit"></i>
                                        </button>
                                        <button class="btn btn-danger btnEliminarCategoria" idCategoria="<?php echo $valor["id"]; ?>">
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

<!-- VENTANA MODAL AGREGAR CATEGORIA -->

<!-- The Modal -->
<div class="modal" id="modalAgregarCategoria">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header sidebar-dark-primary" style="color:#C2C7D0">
                <h4 class="modal-title">Modal Heading</h4>
                <button type="button" class="close" data-dismiss="modal" style="color:#D0D3D4">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form role="form" method="POST" action="">
                    <!-- Nombre -->
                    <div class="form-group">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fas fa-clipboard"></i>
                                </span>
                            </div>
                            <input type="text" class="form-control input-lg" name="nuevaCategoria" id="nuevaCategoria" placeholder="Introduzca el nombre" required="">
                        </div>
                    </div>
            </div>
            <?php
            $crearCategoria = new categoriasController();
            $crearCategoria->ctrCrearCategoria();
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

<!-- VENTANA MODAL EDITAR CATEGORIA -->

<!-- The Modal -->
<div class="modal" id="modalEditarCategoria">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header sidebar-dark-primary" style="color:#C2C7D0">
                <h4 class="modal-title">Editar categoria</h4>
                <button type="button" class="close" data-dismiss="modal" style="color:#D0D3D4">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form role="form" method="POST" action="">
                    <!-- Nombre -->
                    <div class="form-group">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fas fa-clipboard"></i>
                                </span>
                            </div>
                            <input type="text" class="form-control input-lg" id="editarCategoria" name="editarCategoria" value="">
                            <input type="hidden" id="idCategoria" name="idCategoria">
                        </div>
                    </div>
            </div>
            <?php
            $editarCategoria = new categoriasController();
            $editarCategoria->ctrEditarCategoria();
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

<?php
$eliminarCategoria = new categoriasController();
$eliminarCategoria->ctrBorrarCategoria()
?>