<?php
    include_once $_SERVER['DOCUMENT_ROOT'] . '/JurisTime/Model/ConexionModel.php';
    
    function AgregarMateriaModel($nombreMateria)
    {
        try
        {
            $context = OpenConnection();
            $sentencia = "CALL RegistrarMateria('$nombreMateria')";
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

    function ConsultarMateriasModel()
    {
        try
        {
            $context = OpenConnection();

            $sentencia = "CALL ConsultarMaterias()";
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

    function ActualizarMateriaModel($idMateria, $nombreMateria)
    {
        try
        {
            $context = OpenConnection();
            $sentencia = "CALL ActualizarMateria('$idMateria', '$nombreMateria')";
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