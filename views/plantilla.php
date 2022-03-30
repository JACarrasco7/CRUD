<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Inventario 2.0</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- ==================== PLUGINS CSS ==================== -->

    <!-- Font Awesome -->
    <link rel="stylesheet" href="views/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="views/dist/css/adminlte.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <!-- Datatables -->
    <link rel="stylesheet" href="views/plugins/datatables-bs4/css/dataTables.bootstrap4.css">
    <link rel="stylesheet" href="views/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <!-- ChartJS CSS-->
    <link rel="stylesheet" href="views/plugins/chart.js/Chart.min.css" />

    <!-- ==================== PLUGINS JS - JQUERY ==================== -->
    <!-- jQuery -->
    <script src="views/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="views/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="views/dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="views/dist/js/demo.js"></script>
    <!-- Datatables -->
    <script src="views/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="views/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="views/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="views/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <!-- SweetAlert2 -->
    <script src="views/plugins/sweetalert2/sweetalert2.all.js"></script>
    <!-- ChartJS -->
    <script src="views/plugins/chart.js/Chart.bundle.min.js"></script>

</head>

<body class="hold-transition sidebar-mini">

    <?php //if (isset($_SESSION['sesion_iniciada']) && $_SESSION['sesion_iniciada'] == 'SI') { ?>
        <!-- Site wrapper -->
        <div class="wrapper">

            <!-- NAVEGACION -->
            <?php include('modules/header.php') ?>
            <!-- FIN NAVEGACION -->

            <!-- SEDEBAR -->
            <?php include('modules/sidebar.php') ?>
            <!-- FIN SEDEBAR -->

            <!-- WRAPPER(contenido) -->
            <?php

                $lista_rutas = array('inicio', 'usuarios', 'categorias', 'productos', 'clientes', 'nuevo-pedido', 'gestion-pedido', 'informe-pedido', 'logout');

                if (isset($_GET['ruta'])) {
                    if (in_array($_GET['ruta'], $lista_rutas, true)) {
                        include('modules/' . $_GET['ruta'] . '.php');
                    } else {
                        include('modules/404.php');
                    }
                } else {
                    include('modules/inicio.php');
                }

                ?>
            <!-- FIN WRAPPER(contenido) -->

            <!-- FOOTER -->
            <?php include('modules/footer.php') ?>
            <!-- FIN FOOTER -->

        </div>
        <!-- ./wrapper -->

    <?php //} else { ?>

        <?php //include('modules/login.php') ?>

    <?php //} ?>



</body>
<!-- JS PLANTILLA -->
<script src="views/js/plantilla.js"></script>
<!-- JS USUARIO -->
<script src="views/js/usuarios.js"></script>
<!-- JS CATEGORIAS -->
<script src="views/js/categorias.js"></script>
<!-- JS PRODUCTOS -->
<script src="views/js/productos.js"></script>

</html>