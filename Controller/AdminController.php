<?php
    include_once $_SERVER['DOCUMENT_ROOT'] . '/JurisTime/Model/AdminModel.php';

    function ConsultarUsuarios()
    {
        return ConsultarUsuariosModel();
    }

    if(isset($_POST["btnEliminarUsuario"]))
    {
        $idUsuario = $_POST["idUsuario"];
        $resultado = EliminarUsuarioModel($idUsuario);

        if($resultado)
        {
            header("Location: ../../View/Administrativo/GestionUsuarios.php");
            exit;
        }
        else
        {
            $_POST["Mensaje"] = "No se ha podido eliminar el usuario.";
        }
    }

    function ConsultarUsuariosEliminados()
    {
        return ConsultarUsuariosEliminadosModel();
    }

    if(isset($_POST["btnActivarUsuario"]))
    {
        $idUsuario = $_POST["idUsuario"];
        $resultado = ActivarUsuarioModel($idUsuario);

        if($resultado)
        {
            header("Location: ../../View/Administrativo/GestionUsuarios.php");
            exit;
        }
        else
        {
            $_POST["Mensaje"] = "No se ha podido activar el usuario.";
        }
    }
?>