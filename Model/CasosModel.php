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

    function ConsultarCasosFinalizadosModel($idUsuario)
    {
        try
        {
            $context = OpenConnection();
            $sentencia = "CALL ConsultarCasosFinalizados('$idUsuario')";
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

    function EliminarCasoModel($idCaso)
    {
        try
        {
            $context = OpenConnection();
            $sentencia = "CALL EliminarCaso('$idCaso')";
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

    function ActivarCasoModel($idCaso)
    {
        try
        {
            $context = OpenConnection();
            $sentencia = "CALL ActivarCaso('$idCaso')";
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

    function ConsultarCasosFinalizadosSecretariaModel()
    {
        try
        {
            $context = OpenConnection();
            $sentencia = "CALL ConsultarCasosFinalizadosSecretaria()";
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
    
    function BuscarNombreCedulaModel($cedula) 
    {
        try {
            $conexion = OpenConnection();

            $sql = "CALL BuscarNombreCedula(?)";
            $stmt = $conexion->prepare($sql);
            $stmt->bind_param("s", $cedula);
            $stmt->execute();

            $res = $stmt->get_result();

            $nombre = null;
            if ($fila = $res->fetch_assoc()) {
                $nombre = $fila['nombreCompleto'];
            }

            $stmt->close();
            $conexion->next_result();
            CloseConnection($conexion);

            return $nombre;

        } catch (Exception $e) {
            SaveError($e);
            return null;
        }
    }

    function RegistrarCasoModel($abogado, $numeroExpediente, $tipoCliente, $parteActora, $parteDemandante, $cedulaActora, $cedulaDemandada, $materia, $tipoCaso, $circuito, $ubicacionExpediente, $estado)
    {
        try
        {
            $context = OpenConnection();
            $sentencia = "CALL RegistrarCaso('$abogado', '$numeroExpediente', '$tipoCliente', '$parteActora', '$parteDemandante', '$cedulaActora', '$cedulaDemandada','$materia', '$tipoCaso', '$circuito', '$ubicacionExpediente', '$estado')";
            $resultado = $context -> query($sentencia);
            CloseConnection($context);
            return $resultado;
        }
        catch(Exception $error)
        {
            SaveError($error);
            return null;
        }
    }

    function ConsultarDetalleCasoModel($idCaso)
    {
        try
        {
            $context = OpenConnection();
            $sentencia = "CALL DetalleCaso($idCaso)";
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
            return null;
        }
    }

    function ActualizarCasoModel($idCaso, $numeroExpediente, $materia, $tipoCaso, $circuito, $ubicacionExpediente, $estado)
    {
        try
        {
            $context = OpenConnection();
            $sentencia = "CALL ActualizarCaso('$idCaso', '$numeroExpediente', '$materia', '$tipoCaso', '$circuito', '$ubicacionExpediente', '$estado')";
            $resultado = $context -> query($sentencia);
            CloseConnection($context);
            return $resultado;
        }
        catch(Exception $error)
        {
            SaveError($error);
            return null;
        }
    }
?>