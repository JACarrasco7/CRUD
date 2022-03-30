<?php

require_once "../controllers/usuariosController.php";
require_once "../models/usuariosModel.php";

class usuariosAjax
{
    //EDITAR USUARIOS

    public $idUsuario;
    public $activarUsuario;
    public $activarId;
    public $validadUsuario;

    public function ajaxEditarUsuario()
    {
        $campo = "id";
        $valor = $this->idUsuario;

        $editarUsuario = new usuariosController();
        $respuesta = $editarUsuario->ctrMostrarUsuarios($campo, $valor);

        echo json_encode($respuesta);
    }

    public function ajaxActivarUsuario()
    {
        $tabla = "usuarios";
        $campo1 = "estado";
        $valor1 = $this->activarUsuario;
        $campo2 = "id";
        $valor2 = $this->activarId;

        $respuesta = usuariosModel::mdlActualizarCampoUsuario($tabla, $campo1, $valor1, $campo2, $valor2);
    }

    public function ajaxValidarUsuario()
    {
        $campo = "usuario";
        $valor = $this->validadUsuario;

        $usuarioValido = new usuariosController();
        $respuesta = $usuarioValido->ctrMostrarUsuarios($campo, $valor);

        echo json_encode($respuesta);
    }
}

//EDITAR USUARIO

if (isset($_POST["idUsuario"])) {

    $editar = new usuariosAjax();
    $editar->idUsuario = $_POST["idUsuario"];
    $editar->ajaxEditarUsuario();
}


//ACTIVAR USUARIO

if (isset($_POST["activarUsuario"])) {

    $editarUsuario = new usuariosAjax();
    $editarUsuario->activarUsuario = $_POST["activarUsuario"];
    $editarUsuario->activarId = $_POST["activarId"];
    $editarUsuario->ajaxActivarUsuario();
}

//VALIDAR USUARIO

if (isset($_POST["validarUsuario"])) {
    $validacionUsuario = new usuariosAjax();
    $validacionUsuario->validadUsuario = $_POST["validarUsuario"];
    $validacionUsuario->ajaxValidarUsuario();
}
