<?php
    include_once $_SERVER['DOCUMENT_ROOT'] . '/JurisTime/Model/CasosModel.php';
    include_once $_SERVER['DOCUMENT_ROOT'] . '/JurisTime/Controller/TCPDF-main/tcpdf.php';

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
    $idUsuario = "";
    if(isset($_SESSION["nombreCompleto"]))
    {
        $nombreRol = $_SESSION["nombreRol"];
        $idUsuario = $_SESSION["idUsuario"];
    }

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

    function ConsultarCasosFinalizados($idUsuario)
    {
        return ConsultarCasosFinalizadosModel($idUsuario);
    }

    if(isset($_POST["btnEliminar"]))
    {
        $idCaso = $_POST["idCaso"];
        $resultado = EliminarCasoModel($idCaso);

        if($resultado)
        {
            header("Location: ../../View/Casos/ListadoCasosFinalizados.php");
            exit;
        }
        else
        {
            $_POST["Mensaje"] = "No se ha podido eliminar el caso.";
        }
    }

    if(isset($_POST["btnActivar"]))
    {
        $idCaso = $_POST["idCaso"];
        $resultado = ActivarCasoModel($idCaso);

        if($resultado)
        {
            header("Location: ../../View/Casos/ListadoCasos.php");
            exit;
        }
        else
        {
            $_POST["Mensaje"] = "No se ha podido activar el caso.";
        }
    }

    function ConsultarCasosFinalizadosSecretaria()
    {
        return ConsultarCasosFinalizadosSecretariaModel();
    }

    if (isset($_POST['cedula'])) {
        $cedula = $_POST['cedula'];

        $nombre = BuscarNombreCedulaModel($cedula);

        if ($nombre) {
            echo json_encode([
                "ok" => true,
                "nombre" => $nombre
            ]);
        } else {
            echo json_encode(["ok" => false]);
        }
    }

    if (isset($_POST['btnRegistrarCaso']))
    {
        if($nombreRol == 'Abogado')
        {
            $abogado = $_SESSION["idUsuario"];
        }
        else if ($nombreRol == 'Secretaria')
        {
            $abogado = $_POST["abogado"];
        }
        $numeroExpediente = $_POST["numeroExpediente"];
        $tipoCliente = $_POST["tipoCliente"];
        $parteActora = $_POST["parteActora"];
        $parteDemandante = $_POST["parteDemandante"];
        $cedulaActora = $_POST["cedulaActora"] ?? null;
        $cedulaDemandada = $_POST["cedulaDemandada"] ?? null;
        $materia = $_POST["materia"];
        $tipoCaso = $_POST["tipoCaso"];
        $circuito = $_POST["circuito"];
        $ubicacionExpediente = $_POST["ubicacionExpediente"];
        $estado = $_POST["estado"];
        $resultado = RegistrarCasoModel ($abogado, $numeroExpediente, $tipoCliente, $parteActora, $parteDemandante, $cedulaActora, $cedulaDemandada, $materia, $tipoCaso, $circuito, $ubicacionExpediente, $estado);

        if($resultado)
        {
            header("Location: ../../View/Casos/ListadoCasos.php");
            exit;
        }
        else
        {
            $_POST["Mensaje"] = "No se ha podido registrar el caso.";
        }
    }

    function ConsultarDetalleCaso($idCaso)
    {
        return ConsultarDetalleCasoModel($idCaso);
    }

    function ImprimirCasoPDF($idCaso)
    {
        $informacion = ConsultarDetalleCaso($idCaso);
        if (!$informacion) return;

        foreach ($informacion as $key => $value) {
            $informacion[$key] = htmlspecialchars($value ?? '', ENT_QUOTES, 'UTF-8');
        }

        if ($informacion['nombreTipoCliente'] === 'Parte Actora') {
            $parteActora    = $informacion['cliente'];
            $parteDemandada = $informacion['parteDemandada'];
        } else {
            $parteDemandada = $informacion['cliente'];
            $parteActora    = $informacion['parteActora'];
        }

        $pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8', false);
        $pdf->setPrintHeader(false);
        $pdf->setPrintFooter(false);
        $pdf->SetMargins(20, 20, 20);
        $pdf->AddPage();

        $pdf->SetFont('dejavusans', '', 10);

        $html = "
        <h1 style='text-align:center;'>EXPEDIENTE JUDICIAL</h1>
        <p style='text-align:center;'>Caso N° {$informacion['idCaso']}</p>

        <hr>

        <h3>DATOS DEL EXPEDIENTE</h3>
        <table border='1' cellpadding='6' width='100%'>
            <tr><td><b>N° Expediente</b></td><td>{$informacion['numeroExpediente']}</td></tr>
            <tr><td><b>Parte Actora</b></td><td>{$parteActora}</td></tr>
            <tr><td><b>Parte Demandada</b></td><td>{$parteDemandada}</td></tr>
            <tr><td><b>Materia</b></td><td>{$informacion['nombreMateria']}</td></tr>
            <tr><td><b>Tipo de Caso</b></td><td>{$informacion['tipoCaso']}</td></tr>
            <tr><td><b>Circuito</b></td><td>{$informacion['nombreCircuito']}</td></tr>
        </table>

        <br>

        <h3>INFORMACIÓN DEL CLIENTE</h3>
        <table border='1' cellpadding='6' width='100%'>
            <tr><td><b>Nombre</b></td><td>{$informacion['cliente']}</td></tr>
            <tr><td><b>Cédula</b></td><td>{$informacion['cedula']}</td></tr>
            <tr><td><b>Correo</b></td><td>{$informacion['correoElectronico']}</td></tr>
            <tr><td><b>Teléfono</b></td><td>{$informacion['telefono']}</td></tr>
            <tr><td><b>Teléfono Sec.</b></td><td>{$informacion['telefonoExtra']}</td></tr>
        </table>
        ";

        $pdf->writeHTML($html, true, false, true, false, '');
        $pdf->SetY(-10); 
        $pdf->SetFont('helvetica', '', 9);
        $pdf->Cell(
            0,
            5,
            'JurisTime | Documento generado el ' . date('d/m/Y H:i'),
            0,
            0,
            'C'
        );

        $pdf->Output('Expediente_'.$informacion['numeroExpediente'].'.pdf', 'I');
    }

    if (isset($_POST['btnActualizarCaso']))
    {
        $idCaso = $_POST["idCaso"];
        $numeroExpediente = $_POST["numeroExpediente"];
        $materia = $_POST["materia"];
        $tipoCaso = $_POST["tipoCaso"];
        $circuito = $_POST["circuito"];
        $ubicacionExpediente = $_POST["ubicacionExpediente"];
        $estado = $_POST["estado"];
        $resultado = ActualizarCasoModel ($idCaso, $numeroExpediente, $materia, $tipoCaso, $circuito, $ubicacionExpediente, $estado);

        if($resultado)
        {
            header("Location: ../../View/Casos/ListadoCasos.php");
            exit;
        }
        else
        {
            $_POST["Mensaje"] = "No se ha podido actualizar el caso.";
        }
    }
?>