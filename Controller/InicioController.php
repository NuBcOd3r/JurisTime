<?php
    include_once $_SERVER['DOCUMENT_ROOT'] . '/Gesti-ndeCitas-BuffeteLegal/Model/InicioModel.php';

    if(isset($_POST["btnRegistrar"]))
    {
        $cedula = $_POST["cedula"];
        $nombreCompleto = $_POST["nombreCompleto"];
        $correoElectronico = $_POST["correoElectronico"];
        $contrasenna = $_POST["contrasenna"];

        $resultado = RegistrarUsuarioModel($cedula, $nombreCompleto, $correoElectronico, $contrasenna);

        if($resultado)
        {
            header("Location: ../../View/Inicio/Login.php");
            exit;
        }
        else
        {
            $_POST["Mensaje"] = "No se ha podido agregar el usuario.";
        }
    }

    if(isset($_POST["btnLogin"]))
    {
        $correoElectronico = $_POST["correoElectronico"];
        $contrasenna = $_POST["contrasenna"];

        $resultado = IniciarSesionModel($correoElectronico, $contrasenna);

        if($resultado)
        {
            header("Location: ../../View/Principal/Home.php");
            exit;
        }
        else
        {
            $_POST["Mensaje"] = "No se ha podido iniciar sesión.";
        }
    }
?>