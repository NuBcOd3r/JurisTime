<?php
    include_once $_SERVER['DOCUMENT_ROOT'] . '/Gesti-ndeCitas-BuffeteLegal/Model/ConexionModel.php';

    function RegistrarUsuarioModel($cedula, $nombreCompleto, $correoElectronico, $contrasenna)
    {
        try
        {
            $context = OpenConnection();
            $sentencia = "CALL RegistrarUsuario('$cedula', '$nombreCompleto', '$correoElectronico', '$contrasenna')";
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

    function IniciarSesionModel($correoElectronico, $contrasenna)
    {
        try
        {
            $context = OpenConnection();
            $sentencia = "CALL IniciarSesion('$correoElectronico', '$contrasenna')";
            $resultado = $context -> query($sentencia);
            $datos = null;
            while ($row = $resultado->fetch_assoc())
                {
                    $datos = $row;
                }
            $resultado->free();
            CloseConnection($context);

            return $datos;
        }
        catch(Exception $error)
        {
            SaveError($error);
            return false;
        }
    }
?>