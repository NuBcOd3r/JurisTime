<?php
    include_once $_SERVER['DOCUMENT_ROOT'] . '/JurisTime/Model/ConexionModel.php';

    function ConsultarUsuariosModel()
    {
        try
        {
            $context = OpenConnection();

            $sentencia = "CALL ConsultarUsuarios()";
            $resultado = $context -> query($sentencia);

            $datos = [];
            while ($row = $resultado->fetch_assoc()) {
                $datos[] = $row;
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

    function EliminarUsuarioModel($idUsuario)
    {
        try
        {
            $context = OpenConnection();
            $sentencia = "Call EliminarUsuario('$idUsuario')";
            $resultado = $context -> query($sentencia);
            CloseConnection($context);
            return $resultado;

        }catch(Exception $error)
        {
            SaveError($error);
            return null;
        }
    }

    function ConsultarUsuariosEliminadosModel()
    {
        try
        {
            $context = OpenConnection();

            $sentencia = "CALL ConsultarUsuariosEliminados()";
            $resultado = $context -> query($sentencia);

            $datos = [];
            while ($row = $resultado->fetch_assoc()) {
                $datos[] = $row;
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

    function ActivarUsuarioModel($idUsuario)
    {
        try
        {
            $context = OpenConnection();
            $sentencia = "Call ActivarUsuario('$idUsuario')";
            $resultado = $context -> query($sentencia);
            CloseConnection($context);
            return $resultado;

        }catch(Exception $error)
        {
            SaveError($error);
            return null;
        }
    }
?>