<?php
    include_once $_SERVER['DOCUMENT_ROOT'] . '/JurisTime/Model/ActividadesModel.php';
    if(session_status() == PHP_SESSION_NONE)
    {
        session_start();
    }

    if(!isset($_SESSION["nombreCompleto"]))
    {
      header("Location: ../../View/Principal/Home.php");
      exit;
    }

    $nombreCompleto = "";
    $nombreRol = "";
    if(isset($_SESSION["nombreCompleto"]))
    {
        $nombreCompleto = $_SESSION["nombreCompleto"];
        $nombreRol = $_SESSION["nombreRol"];
    }

    if(isset($_POST['btnAgregarEvento']))
    {
        if($nombreRol == 'Abogado')
        {
            $idAbogado = $_SESSION["idUsuario"];
        }
        elseif($nombreRol == 'Secretaria')
        {
            $idAbogado = $_POST["Abogado"];
        }
        $descripcionEvento = $_POST['descripcionEvento'];
        $fecha = $_POST['fechaEvento'];
        $hora = $_POST['hora'];
        $fechaHora = $fecha. ' ' . $hora . ':00';
        $resultado = AgregarEventoModel($idAbogado, $descripcionEvento, $fechaHora);

        if($resultado)
        {
            header("Location: ../../View/Calendario/VerCalendario.php");
            exit;
        }
        else
        {
            $_POST["Mensaje"] = "Evento no se agrego correctamente.";
        }
    }
?>