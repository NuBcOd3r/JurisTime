<?php
    include_once $_SERVER['DOCUMENT_ROOT'] . '/JurisTime/View/LayoutUtilidades.php';
    include_once $_SERVER['DOCUMENT_ROOT'] . '/JurisTime/Controller/CasosController.php';
    if (!isset($_GET['id'])) 
    {
        header("Location: ListadoCasos.php");
        exit;
    }

    $idCaso = $_GET['id'];

    $informacion = ConsultarDetalleCaso($idCaso);
?>

<!doctype html>
<html lang="es">

<?php
    VerCss()
?>

<body>

    <?php
        VerSidebar()
    ?>

    <?php
        VerNavbar()
    ?>



    <div class="main-content">
        <div class="card">
            <div class="card-header position-relative text-center">
                <h5 class="mb-0">Caso # <?php echo $idCaso; ?></h5>
            </div>
            <div class="container">
                <div class="row mt-5">
                    <div class="col-md-6 fs-4 text-white">
                        <div class="info-card">
                            <p class="text-white"><span><strong>Abogado:</strong></span> <?= htmlspecialchars($informacion['abogado']) ?></p>
                            <p class="text-white"><span><strong>Número de Expediente:</strong></span> <?= htmlspecialchars($informacion['numeroExpediente']) ?></p>
                            <p class="text-white">
                                <span><strong>Tipo de Cliente:</strong></span> 
                                <span class="badge bg-primary"><?= htmlspecialchars($informacion['nombreTipoCliente']) ?></span>
                            </p>

                            <?php if ($informacion['nombreTipoCliente'] === 'Parte Actora'): ?>
                                <p class="text-white"><span><strong>Parte Actora:</strong></span> <?= htmlspecialchars($informacion['cliente']) ?></p>
                                <p class="text-white"><span><strong>Parte Demandada:</strong></span> <?= htmlspecialchars($informacion['parteDemandada']) ?></p>
                            <?php else: ?>
                                <p class="text-white"><span><strong>Parte Demandada:</strong></span> <?= htmlspecialchars($informacion['cliente']) ?></p>
                                <p class="text-white"><span><strong>Parte Actora:</strong></span> <?= htmlspecialchars($informacion['parteActora']) ?></p>
                            <?php endif; ?>

                            <p class="text-white"><span><strong>Materia:</strong></span> <?= htmlspecialchars($informacion['nombreMateria']) ?></p>
                            <p class="text-white"><span><strong>Tipo de Caso:</strong></span> <?= htmlspecialchars($informacion['tipoCaso']) ?></p>
                            <p class="text-white"><span><strong>Circuito:</strong></span> <?= htmlspecialchars($informacion['nombreCircuito']) ?></p>
                            <p class="text-white"><span><strong>Ubicación:</strong></span> <?= htmlspecialchars($informacion['ubicacionExpediente']) ?></p>
                            <p class="text-white">
                                <span><strong>Estado:</strong></span> 
                                <span class="badge bg-success"><?= htmlspecialchars($informacion['nombreEstado']) ?></span>
                            </p>
                        </div>
                    </div>
                    <div class="col-md-1"></div>
                    <div class="col-md-5 fs-5">
                        <div class="info-card cliente-card">
                            <h5 class="section-title">Información del Cliente</h5>

                            <p class="text-white"><span><strong>Nombre:</strong></span> <?= htmlspecialchars($informacion['cliente']) ?></p>
                            <p class="text-white"><span><strong>Cédula:</strong></span> <?= htmlspecialchars($informacion['cedula']) ?></p>
                            <p class="text-white"><span><strong>Correo:</strong></span> <?= htmlspecialchars($informacion['correoElectronico']) ?></p>
                            <p class="text-white"><span><strong>Teléfono 1:</strong></span> <?= htmlspecialchars($informacion['telefono']) ?></p>
                            <p class="text-white"><span><strong>Teléfono 2:</strong></span> <?= htmlspecialchars($informacion['telefonoExtra']) ?></p>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end gap-3 mt-4 mb-4">
                        <a class="btn btn-primary btn-lg"
                        href="ActualizarCaso.php?id=<?= $informacion['idCaso'] ?>">
                            <i class="fa-regular fa-pen-to-square"></i> Actualizar Caso
                        </a>

                        <a href="ImprimirCaso.php?id=<?= $informacion['idCaso'] ?>" 
                        class="btn btn-outline-info btn-lg" target="_blank">
                            <i class="fa-solid fa-print"></i> Imprimir
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
   

    <?php
        Cerrar()
    ?>

    <?php
        VerJs()
    ?>
</body>

</html>