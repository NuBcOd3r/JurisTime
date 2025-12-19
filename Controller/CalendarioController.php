<?php
session_start();
include_once $_SERVER['DOCUMENT_ROOT'] . '/JurisTime/Model/CalendarioModel.php';

$resultadoEventos = [];
$rol = $_SESSION['nombreRol'];
$idUsuario = $_SESSION['idUsuario'];

if ($rol === 'Abogado') {

    $eventos = ConsultarEventosModel($idUsuario);

    foreach ($eventos as $evento) {
        $resultadoEventos[] = [
            'title' => $evento['descripcionEvento'],
            'start' => $evento['fechaHoraEvento']
        ];
    }
}

if ($rol === 'Secretaria') {

    $eventosSecretaria = ConsultarEventosSecretariaModel();

    foreach ($eventosSecretaria as $evento) {
        $resultadoEventos[] = [
            'title' => $evento['nombreCompleto'] . ' - ' . $evento['descripcionEvento'],
            'start' => $evento['fechaHoraEvento'],
            'backgroundColor' => '#4cec1bff',
            'borderColor' => '#4cec1bff',
        ];
    }
}

header('Content-Type: application/json');
echo json_encode($resultadoEventos);
exit;
