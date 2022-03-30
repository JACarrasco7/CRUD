<?php

require_once "../controllers/categoriasController.php";
require_once "../models/categoriasModel.php";

class categoriasAjax
{

    //EDITAR USUARIOS

    public $idCategoria;
    public $validarCategoria;

    public function ajaxEditarCategoria()
    {
        $campo = "id";
        $valor = $this->idCategoria;

        $editarCategoria = new categoriasController();
        $respuesta = $editarCategoria->ctrMostrarCategorias($campo, $valor);

        echo json_encode($respuesta);
    }

    public function ajaxValidarCategoria()
    {
        $campo = "categoria";
        $valor = $this->validarCategoria;

        $categoriaValido = new categoriasController();
        $respuesta = $categoriaValido->ctrMostrarCategorias($campo, $valor);

        echo json_encode($respuesta);
    }
}

//OBJETO PARA EDITAR CATEGORIA

if (isset($_POST["idCategoria"])) {

    $editar = new categoriasAjax();
    $editar->idCategoria = $_POST["idCategoria"];
    $editar->ajaxEditarCategoria();
}

//VALIDAR CATEGORIA

if (isset($_POST["validarCategoria"])) {
    $validacionCategoria = new categoriasAjax();
    $validacionCategoria->validarCategoria = $_POST["validarCategoria"];
    $validacionCategoria->ajaxValidarCategoria();
}
