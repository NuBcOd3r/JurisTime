<?php
    include_once $_SERVER['DOCUMENT_ROOT'] . '/JurisTime/Model/CasosModel.php';

    function ConsultarCasos($idUsuario)
    {
        return ConsultarCasosModel($idUsuario);
    }

    function ConsultarCasosSecretaria()
    {
        return ConsultarCasosSecretariaModel();
    }

    function ConsultarTipoCliente()
    {
        return ConsultarTipoClienteModel();
    }
    
    function ConsultarMaterias()
    {
        return ConsultarMateriasModel();
    }

    function ConsultarCircuito()
    {
        return ConsultarCircuitoModel();
    }
    
    function ConsultarEstado()
    {
        return ConsultarEstadoModel();
    }

    function ConsultarCantones()
    {
        return ConsultarCantonesModel();
    }
?>