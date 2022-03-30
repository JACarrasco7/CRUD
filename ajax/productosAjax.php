<?php

require_once "../controllers/productosController.php";
require_once "../models/productosModel.php";

require_once "../controllers/categoriasController.php";
require_once "../models/categoriasModel.php";


class productosAjax
{
    public $idCategoria;
    public $idProducto;
    public $activarProducto;
    public $activarId;

    public function ajaxCrearCodigoProducto()
    {
        $campo = "id_categoria";
        $valor = $this->idCategoria;

        $mostrarProducto = new productosController();
        $respuesta = $mostrarProducto->ctrMostrarProductos($campo, $valor);

        echo json_encode($respuesta);
    }

    public function ajaxEditarProducto()
    {
        $campo = "id";
        $valor = $this->idProducto;

        $mostrarProducto = new productosController();
        $respuesta = $mostrarProducto->ctrMostrarProductos($campo, $valor);

        echo json_encode($respuesta);
    }

    public function ajaxActivarProducto()
    {
        $tabla = "productos";
        $campo1 = "estado";
        $valor1 = $this->activarProducto;
        $campo2 = "id";
        $valor2 = $this->activarId;

        $respuesta = productosModel::mdlActualizarCampoProducto($tabla, $campo1, $valor1, $campo2, $valor2);
    }
}

// SACAR CODIGO A PARTIR DE CATEGORIA

if (isset($_POST["idCategoria"])) {
    $codigoProducto = new productosAjax();
    $codigoProducto->idCategoria = $_POST["idCategoria"];
    $codigoProducto->ajaxCrearCodigoProducto();
}

// EDITAR PRODUCTO

if (isset($_POST["idProducto"])) {
    $codigoProducto = new productosAjax();
    $codigoProducto->idProducto = $_POST["idProducto"];
    $codigoProducto->ajaxEditarProducto();
}

//ACTIVAR PRODUCTO

if (isset($_POST["activarProducto"])) {

    $editarUsuario = new productosAjax();
    $editarUsuario->activarProducto = $_POST["activarProducto"];
    $editarUsuario->activarId = $_POST["activarId"];
    $editarUsuario->ajaxActivarProducto();
}
