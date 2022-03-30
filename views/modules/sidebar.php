        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="views/index3.html" class="brand-link">
                <img src="views/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">Grupo JAC</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <?php if ($_SESSION['foto'] == "") { ?>
                            <img src="views/img/usuarios/default/default.jpg" class="img-circle elevation-2" alt="User Image">
                        <?php } else { ?>
                            <img src="<?php echo $_SESSION['foto'] ?>" class="img-circle elevation-2" alt="User Image">
                        <?php } ?>
                    </div>
                    <div class="info">
                        <a href="#" class="d-block"><?php echo $_SESSION['usuario'] ?></a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                        <li class="nav-item">
                            <a href="inicio" class="nav-link">
                                <i class="nav-icon fas fa-home"></i>
                                <p>
                                    Inicio
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="usuarios" class="nav-link">
                                <i class="nav-icon fas fa-users"></i>
                                <p>
                                    Usuarios
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="categorias" class="nav-link">
                                <i class="nav-icon fas fa-list"></i>
                                <p>
                                    Categorias
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="productos" class="nav-link">
                                <i class="nav-icon fab fa-product-hunt"></i>
                                <p>
                                    Productos
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="clientes" class="nav-link">
                                <i class="nav-icon fas fa-address-card"></i>
                                <p>
                                    Clientes
                                </p>
                            </a>
                        </li>
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-shopping-cart"></i>
                                <p>
                                    Pedidos
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview ml-4">
                                <li class="nav-item">
                                    <a href="nuevo-pedido" class="nav-link">
                                        <i class="fas fa-shopping-basket nav-icon"></i>
                                        <p>Nuevo pedido</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="gestion-pedido" class="nav-link">
                                        <i class="fas fa-store nav-icon"></i>
                                        <p>Gestión pedidos</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="informe-pedido" class="nav-link">
                                        <i class="fas fa-book-open nav-icon"></i>
                                        <p>Informes</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>