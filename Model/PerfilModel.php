<?php
    include_once $_SERVER['DOCUMENT_ROOT'] . '/Gesti-ndeCitas-BuffeteLegal/Model/ConexionModel.php';

    function ActualizarNuevaContrasennaModel($idUsuario,$contrasenna)
    {
        try
        {
            $context = OpenConnection();

            $sentencia = "CALL ActualizarContrasenna('$idUsuario', '$contrasenna')";
            $resultado = $context -> query($sentencia);

            CloseConnection($context);

            return $resultado;
        }
        catch(Exception $error)
        {
            SaveError($error);
            return false;
        }
    }

    function ConsultarUsuarioModel($id)
    {
        try
        {
            $context = OpenConnection();

            $sentencia = "CALL ConsultarUsuario($id)";
            $resultado = $context -> query($sentencia);

            $datos = null;
            while ($row = $resultado->fetch_assoc()) {
                $datos = $row;
            }

            $resultado->free();
            CloseConnection($context);

            return $datos;
        }
        catch(Exception $error)
        {
            SaveError($error);
            return null;
        }
    }

    function ActualizarUsuarioModel($idUsuario,$correoElectronico,$imagen)
    {
        try
        {
            $context = OpenConnection();
            $sentencia = "CALL ActualizarUsuario('$idUsuario','$correoElectronico','$imagen')";
            $resultado = $context -> query($sentencia);
            CloseConnection($context);
            return $resultado;
        }
        catch(Exception $error)
        {
            SaveError($error);
            return false;
        }
    }
?>