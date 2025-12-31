<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/JurisTime/Controller/CasosController.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/JurisTime/Controller/TCPDF-main/tcpdf.php';

if (!isset($_GET['id'])) {
    exit('ID de caso no recibido');
}

$idCaso = $_GET['id'];

ImprimirCasoPDF($idCaso);
exit;
?>