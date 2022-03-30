<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Productos</h1>
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
                <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarProducto">Añadir productos</button>
            </div>
            <div class="card-body">
                <table class="table table-bordered dt-responsive tablas">
                    <thead>
                        <tr>
                            <th class="align-middle text-center">Nº</th>
                            <th class="align-middle">Código</th>
                            <th class="align-middle">Descripcion</th>
                            <th class="align-middle text-center">Imagen</th>
                            <th class="align-middle">Categoría</th>
                            <th class="align-middle">Stock</th>
                            <th class="align-middle">Precio de compra</th>
                            <th class="align-middle">Precio de venta</th>
                            <th class="align-middle">Agregado</th>
                            <th class="align-middle">Estado</th>
                            <th class="align-middle">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $campo = null;
                        $valor = null;

                        $mostrar_productos = new productosController();
                        $producto = $mostrar_productos->ctrMostrarProductos($campo, $valor);

                        //var_dump($usuarios);
                        foreach ($producto as $clave => $valor) {
                            ?>
                            <tr>
                                <td class="align-middle text-center"><?php echo $clave + 1 ?></td>
                                <td class="align-middle"><?php echo $valor['codigo'] ?></td>
                                <td class="align-middle"><?php echo $valor['descripcion'] ?></td>
                                <td class="align-middle text-center"><img src="<?php echo $valor['imagen'] ?>" alt="" width="45px"></td>
                                <td class="align-middle"><?php echo $valor['id_categoria'] ?></td>
                                <td class="align-middle"><?php echo $valor['stock'] ?></td>
                                <td class="align-middle"><?php echo $valor['precio_compra'] ?></td>
                                <td class="align-middle"><?php echo $valor['precio_venta'] ?></td>
                                <td class="align-middle"><?php echo $valor['fecha'] ?></td>
                                <?php
                                    if ($valor["estado"] != 0) {
                                        echo '<td class="align-middle"><button class="btn btn-success btn-xs btnActivarProducto" idProducto="' . $valor["id"] . '" estadoProducto="0">Activado</button></td>';
                                    } else {
                                        echo '<td class="align-middle"><button class="btn btn-danger btn-xs btnActivarProducto" idProducto="' . $valor["id"] . '" estadoProducto="1">Desactivado</button></td>';
                                    }
                                    ?>
                                <td class="align-middle">
                                    <div class="btn-group">
                                        <button class="btn btn-warning btnEditarProducto" idProducto="<?php echo $valor["id"]; ?>" data-toggle="modal" data-target="#modalEditarProducto">
                                            <i class="fas fa-user-edit"></i>
                                        </button>
                                        <button class="btn btn-danger btnEliminarProducto" idProducto="<?php echo $valor["id"]; ?>" codigo="<?php echo $valor["codigo"]; ?>" imagen="<?php echo $valor["imagen"]; ?>">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        <?php } ?>
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

<!-- VENTANA MODAL AGREGAR PRODUCTO -->

<!-- The Modal -->
<div class="modal" id="modalAgregarProducto">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header sidebar-dark-primary" style="color:#C2C7D0">
                <h4 class="modal-title">Añadir producto</h4>
                <button type="button" class="close" data-dismiss="modal" style="color:#D0D3D4">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form role="form" method="POST" action="" enctype="multipart/form-data">
                    <!-- categoria -->
                    <div class="form-group">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fa fa-tags"></i>
                                </span>
                            </div>
                            <select class="form-control input-lg" name="nuevaCategoria" id="nuevaCategoria">
                                <option value="">Seleccionar una categoria</option>
                                <?php
                                $campo = null;
                                $valor = null;

                                $mostrar_categorias = new categoriasController();
                                $categoria = $mostrar_categorias->ctrMostrarCategorias($campo, $valor);

                                foreach ($categoria as $clave => $valor) {
                                    ?>
                                    <option value="<?php echo $valor['id'] ?>"><?php echo $valor['categoria'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <!-- codigo -->
                    <div class="form-group">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fas fa-code"></i>
                                </span>
                            </div>
                            <input type="text" class="form-control input-lg" name="nuevoCodigo" id="nuevoCodigo" placeholder="Introduzca el codigo" required="" readonly>
                        </div>
                    </div>

                    <!-- descripcion -->
                    <div class="form-group">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fas fa-sort-amount-down"></i>
                                </span>
                            </div>
                            <input type="text" class="form-control input-lg" name="nuevaDescripcion" id="nuevaDescripcion" placeholder="Introduzca la descripcion" required="">
                        </div>
                    </div>

                    <!-- STOCK -->
                    <div class="form-group">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fas fa-gifts"></i>
                                </span>
                            </div>
                            <input type="number" class="form-control input-lg" name="nuevoStock" id="nuevoStock" placeholder="Introduzca el stock" required="">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <!-- PRECIO COMPRA -->
                            <div class="form-group">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fas fa-cart-arrow-down"></i>
                                        </span>
                                    </div>
                                    <input type="number" class="form-control input-lg" name="nuevoPrecioCompra" id="nuevoPrecioCompra" step="any" min="0" placeholder="Precio de compra" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <!-- PRECIO VENTA -->
                            <div class="form-group">
                                <div class="input-group mb-3">

                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fas fa-cash-register"></i>
                                        </span>
                                    </div>


                                    <input type="number" class="form-control input-lg" name="nuevoPrecioVenta" id="nuevoPrecioVenta" step="any" placeholder="Precio de venta" required="">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <!-- Check porcentaje -->
                            <div class="form-group">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <input type="checkbox" class="porcentaje" checked></label>
                                        </span>
                                    </div>
                                    <input type="text" class="form-control input-lg" value="Utilizar porcentaje" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <!-- Porcentaje -->
                            <div class="form-group">
                                <div class="input-group mb-3">
                                    <input type="number" class="form-control input-lg nuevoPorcentaje" min="0" value="40" required>
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fas fa-percent"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- subir foto -->
                    <div class="form-group">
                        <div class="panel">Subir foto</div>
                        <input type="file" class="nuevaImagen" name="nuevaImagen">
                        <p class="help-block">Peso maximo de la foto: 2Mb</p>
                        <img src="views/img/productos/default/default.png" class="img-thumbnail previsualizar2" width="100px">
                    </div>
            </div>
            <?php
            $crearProducto = new productosController();
            $crearProducto->ctrCrearProductos();
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

<!-- The Modal -->
<div class="modal" id="modalEditarProducto">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header sidebar-dark-primary" style="color:#C2C7D0">
                <h4 class="modal-title">Editar producto</h4>
                <button type="button" class="close" data-dismiss="modal" style="color:#D0D3D4">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form role="form" method="POST" action="" enctype="multipart/form-data">
                    <!-- categoria -->
                    <div class="form-group">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fa fa-tags"></i>
                                </span>
                            </div>
                            <select class="form-control input-lg" name="editarCategoria" readonly required>
                                <option id="editarCategoria"></option>
                            </select>
                        </div>
                    </div>
                    <!-- codigo -->
                    <div class="form-group">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fas fa-code"></i>
                                </span>
                            </div>
                            <input type="text" class="form-control input-lg" name="editarCodigo" id="editarCodigo" required="" readonly>
                        </div>
                    </div>

                    <!-- descripcion -->
                    <div class="form-group">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fas fa-sort-amount-down"></i>
                                </span>
                            </div>
                            <input type="text" class="form-control input-lg" name="editarDescripcion" id="editarDescripcion" required="">
                        </div>
                    </div>

                    <!-- STOCK -->
                    <div class="form-group">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fas fa-gifts"></i>
                                </span>
                            </div>
                            <input type="number" class="form-control input-lg" name="editarStock" id="editarStock" required="">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <!-- PRECIO COMPRA -->
                            <div class="form-group">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fas fa-cart-arrow-down"></i>
                                        </span>
                                    </div>
                                    <input type="number" class="form-control input-lg" name="editarPrecioCompra" step="any" id="editarPrecioCompra" min="0" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <!-- PRECIO VENTA -->
                            <div class="form-group">
                                <div class="input-group mb-3">

                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fas fa-cash-register"></i>
                                        </span>
                                    </div>


                                    <input type="number" class="form-control input-lg" name="editarPrecioVenta" step="any" id="editarPrecioVenta" readonly required="">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <!-- Check porcentaje -->
                            <div class="form-group">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <input type="checkbox" class="porcentaje" checked></label>
                                        </span>
                                    </div>
                                    <input type="text" class="form-control input-lg" value="Utilizar porcentaje" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <!-- Porcentaje -->
                            <div class="form-group">
                                <div class="input-group mb-3">
                                    <input type="number" class="form-control input-lg nuevoPorcentaje" min="0" value="40" required>
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fas fa-percent"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- subir foto -->
                    <div class="form-group">
                        <div class="panel">Subir foto</div>
                        <input type="file" class="nuevaImagen" name="editarImagen">
                        <p class="help-block">Peso maximo de la foto: 2Mb</p>
                        <img src="views/img/productos/default/default.png" class="img-thumbnail previsualizar" width="100px">
                        <input type="hidden" name="imagenActual" id="imagenActual">
                    </div>
            </div>
            <?php
            $editarProducto = new productosController();
            $editarProducto->ctrEditarProductos();
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
$borrarProducto = new productosController();
$borrarProducto->ctrBorrarProducto();
?>