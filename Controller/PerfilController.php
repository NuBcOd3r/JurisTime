<?php
    include_once $_SERVER['DOCUMENT_ROOT'] . '/Gesti-ndeCitas-BuffeteLegal/Model/PerfilModel.php';

    if(session_status() == PHP_SESSION_NONE)
    {
        session_start();
    }


    if(isset($_POST["btnActualizarNuevaContrasenna"]))
    {
        $idUsuario = $_SESSION["idUsuario"];
        $contrasenna = $_POST["contrasenna"];
        $contrasennaHash = password_hash($contrasenna, PASSWORD_DEFAULT);

        $resultado = ActualizarNuevaContrasennaModel($idUsuario, $contrasennaHash);

        if($resultado)
        {
            $_POST["MensajeBueno"] = "La información se actualizó correctamente";
        }
        else
        {
            $_POST["Mensaje"] = "La información no se actualizó correctamente";
        }        
    }  
    
    function ConsultarUsuario($id)
    {
        return ConsultarUsuarioModel($id);
    }

    if(isset($_POST["btnActualizarPerfil"]))
    {
        $idUsuario = $_SESSION["idUsuario"];
        $correoElectronico = $_POST["correoElectronico"];
        $imagen = '';

        if($_FILES["imagen"]["name"] != "")
        {
            $imagen = '../images/' . $_FILES["imagen"]["name"];
            $origen = $_FILES["imagen"]["tmp_name"];
            $destino = $_SERVER["DOCUMENT_ROOT"] . '/Gesti-ndeCitas-BuffeteLegal/View/images/' . $_FILES["imagen"]["name"];
            copy($origen,$destino);
        }  

        $resultado = ActualizarUsuarioModel($idUsuario,$correoElectronico,$imagen);

        if($resultado)
        {
             $_SESSION["urlImagen"] = $imagen;
            header("Location: ../../View/Perfil/MiPerfil.php");
            exit;
        }

        $_POST["Mensaje"] = "No se ha podido actualizar el perfil.";
    }
?>