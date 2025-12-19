<?php
    include_once $_SERVER['DOCUMENT_ROOT'] . '/JurisTime/Model/ConexionModel.php';

    function ConsultarEventosModel($idUsuario)
    {
        try {
            $context = OpenConnection();
            $sentencia = "CALL ConsultarEventos($idUsuario)";
            $resultado = $context->query($sentencia);

            $eventos = [];

            while ($fila = $resultado->fetch_assoc()) {
                $eventos[] = $fila;
            }

            CloseConnection($context);
            return $eventos;
        }
        catch (Exception $error) {
            SaveError($error);
            return [];
        }
    }

    function ConsultarEventosSecretariaModel()
    {
        try {
            $context = OpenConnection();
            $sentencia = "CALL ConsultarEventosSecretaria()";
            $resultado = $context->query($sentencia);

            $eventosSecretaria = [];

            while ($fila = $resultado->fetch_assoc()) {
                $eventosSecretaria[] = $fila;
            }

            CloseConnection($context);
            return $eventosSecretaria;
        }
        catch (Exception $error) {
            SaveError($error);
            return [];
        }
    }
?>