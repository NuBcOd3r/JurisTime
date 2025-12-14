<?php
    include_once $_SERVER['DOCUMENT_ROOT'] . '/Gesti-ndeCitas-BuffeteLegal/Model/ConexionModel.php';
      
    function ConsultarNacionalidadModel()
    {
        try
        {
            $context = OpenConnection();

            $sentencia = "CALL ConsultarNacionalidad()";
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

    function RegistrarClienteModel($nacionalidad, $cedula, $nombreCompleto, $correoElectronico, $telefono)
    {
        try
        {
            $context = OpenConnection();
            $sentencia = "CALL RegistrarCliente('$nacionalidad', '$cedula', '$nombreCompleto', '$correoElectronico', '$telefono')";
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

    function ConsultarClientesModel()
    {
        try
        {
            $context = OpenConnection();

            $sentencia = "CALL ConsultarClientes()";
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

    function EliminarClienteModel($idCliente)
    {
        try
        {
            $context = OpenConnection();
            $sentencia = "CALL EliminarCliente('$idCliente')";
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
    
    function ClientesEliminadosModel()
    {
        try
        {
            $context = OpenConnection();

            $sentencia = "CALL ConsultarClientesEliminados()";
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
    
    function ActivarClienteModel($idCliente)
    {
        try
        {
            $context = OpenConnection();
            $sentencia = "CALL ActivarCliente('$idCliente')";
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
    
    function ConsultarClientePorIdModel($id)
    {
        try
        {
            $context = OpenConnection();

            $sentencia = "CALL ConsultarClientePorId($id)";
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

    function ActualizarClienteModel($idCliente, $correoElectronico, $telefono)
    {
        try
        {
            $context = OpenConnection();
            $sentencia = "CALL ActualizarCliente('$idCliente', '$correoElectronico', '$telefono')";
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