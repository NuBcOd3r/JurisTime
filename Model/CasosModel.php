<?php
    include_once $_SERVER['DOCUMENT_ROOT'] . '/JurisTime/Model/ConexionModel.php';

    function ConsultarCasosModel($idUsuario)
    {
        try
        {
            $context = OpenConnection();
            $sentencia = "CALL ConsultarCasos('$idUsuario')";
            $resultado = $context -> query($sentencia);
            $datos = [];
             while ($row = $resultado->fetch_assoc()) 
            {
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

    function ConsultarCasosSecretariaModel()
    {
        try
        {
            $context = OpenConnection();
            $sentencia = "CALL ConsultarCasoSecretaria()";
            $resultado = $context -> query($sentencia);
            $datos = [];
             while ($row = $resultado->fetch_assoc()) 
            {
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
    
    function ConsultarTipoClienteModel()
    {
        try
        {
            $context = OpenConnection();
            $sentencia = "CALL ConsultarTipoCliente()";
            $resultado = $context -> query($sentencia);
            $datos = [];
             while ($row = $resultado->fetch_assoc()) 
            {
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

    function ConsultarMateriasModel()
    {
        try
        {
            $context = OpenConnection();
            $sentencia = "CALL ConsultarMaterias()";
            $resultado = $context -> query($sentencia);
            $datos = [];
             while ($row = $resultado->fetch_assoc()) 
            {
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

    function ConsultarCircuitoModel()
    {
        try
        {
            $context = OpenConnection();
            $sentencia = "CALL ConsultarCircuito()";
            $resultado = $context -> query($sentencia);
            $datos = [];
             while ($row = $resultado->fetch_assoc()) 
            {
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

    function ConsultarEstadoModel()
    {
        try
        {
            $context = OpenConnection();
            $sentencia = "CALL ConsultarEstado()";
            $resultado = $context -> query($sentencia);
            $datos = [];
             while ($row = $resultado->fetch_assoc()) 
            {
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

    function ConsultarCantonesModel()
    {
        try
        {
            $context = OpenConnection();
            $sentencia = "CALL ConsultarCantones()";
            $resultado = $context -> query($sentencia);
            $datos = [];
             while ($row = $resultado->fetch_assoc()) 
            {
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
?>