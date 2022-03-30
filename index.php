<?php

session_start();

// Controladores
require_once 'controllers/plantillaController.php';
require_once 'controllers/usuariosController.php';
require_once 'controllers/productosController.php';
require_once 'controllers/categoriasController.php';

// Modelos
require_once 'models/usuariosModel.php';
require_once 'models/productosModel.php';
require_once 'models/categoriasModel.php';

// Plantilla
$plantilla = new plantillaController();

$plantilla->ctrPlantilla();
