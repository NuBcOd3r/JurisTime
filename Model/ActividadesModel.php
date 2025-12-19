<?php
    include_once $_SERVER['DOCUMENT_ROOT'] . '/JurisTime/Model/ConexionModel.php';

    function AgregarEventoModel($idAbogado, $descripcionEvento, $fechaHora)
    {
        try
        {
            $context = OpenConnection();
            $sentencia = "CALL RegistrarEvento('$idAbogado','$descripcionEvento', '$fechaHora')";
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