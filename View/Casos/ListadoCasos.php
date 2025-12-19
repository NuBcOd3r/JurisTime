<?php
    include_once $_SERVER['DOCUMENT_ROOT'] . '/JurisTime/View/LayoutUtilidades.php';
    include_once $_SERVER['DOCUMENT_ROOT'] . '/JurisTime/Controller/CasosController.php';
    $casos = ConsultarCasos($_SESSION["idUsuario"]);
    $casosSecretaria = ConsultarCasosSecretaria();
    if(session_status() == PHP_SESSION_NONE)
    {
        session_start();
    }

    if(!isset($_SESSION["nombreCompleto"]))
    {
      header("Location: ../../View/Principal/Home.php");
      exit;
    }

    $nombreRol = "";
    if(isset($_SESSION["nombreCompleto"]))
    {
        $nombreRol = $_SESSION["nombreRol"];
    }

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
    <div class="row mb-3">
        <div class="col-12 mt-4">
            <h2 class="text-center mb-3">Listado de Casos</h2>
        </div>
        <div class="mb-3">
            <a class="btn text-white px-4" style="background-color: #0a58ca;"
                href="RegistroCasos.php">
                    Registrar Caso
            </a>
            <a class="btn text-white px-4 ms-2" style="background-color: #ca340aff;"
                href="ListadoCasosFinalizados.php">
                    Casos Finalizados
            </a>
        </div>
    </div>
    
    <div class="card">
        <?php
            if(isset($_POST["MensajeExito"]))
            {
                 echo '<div class="alert alert-success alert-dismissible">' . $_POST["MensajeExito"] . '</div>';
            }
        ?>
        <div class="card-body p-0 mt-3">
            <div class="table-responsive">
                <?php
                if ($nombreRol == 'Abogado')
                {
                    echo '
                        <table class="table mb-0 text-center" id="tbCasos" name="tbCasos">
                            <thead>
                                <tr>
                                    <th scope="col" class="text-center align-middle">#</th>
                                    <th scope="col" class="text-center align-middle">Numero Expediente</th>
                                    <th scope="col" class="text-center align-middle">Tipo de Cliente</th>
                                    <th scope="col" class="text-center align-middle">Parte Actora</th>
                                    <th scope="col" class="text-center align-middle">Parte Demandada</th>
                                    <th scope="col" class="text-center align-middle">Ubicación del Expediente</th>
                                    <th scope="col" class="text-center align-middle">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                    ';
                    foreach ($casos as $caso)
                    {
                        echo '
                            <tr>
                                <td class="text-center align-middle"><strong>' . $caso['idCaso'] . '</strong></td>
                                <td class="text-center align-middle"><strong>' . $caso['numeroExpediente'] . '</strong></td>
                                <td class="text-center align-middle"><strong>' . $caso['nombreTipoCliente'] . '</strong></td>
                                <td class="text-center align-middle"><strong>' . $caso['parteActora'] . '</strong></td>
                                <td class="text-center align-middle"><strong>' . $caso['parteDemandada'] . '</strong></td>
                                <td class="text-center align-middle"><strong>' . $caso['ubicacionExpediente'] . '</strong></td>
                                <td class="text-center align-middle">
                                    <div style="display: flex; justify-content: center; gap: 20px; align-items: center;">
                                        <a href="VerDetallesCaso.php?id=' . $caso['idCaso'] . '" style="color: #0d6efd; font-size: 26px;">
                                            <i class="fa-regular fa-eye"></i>
                                        </a>

                                        <form method="POST" action="" style="margin: 0; padding: 0;">
                                            <input type="hidden" name="idCaso" value="' . $caso['idCaso'] . '">
                                            <button type="submit" name="btnEliminar" style="background: none; border: none; padding: 0; margin: 0; cursor: pointer; color: #dc3545; font-size: 26px;">
                                                <i class="fa-solid fa-eraser"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        ';
                    }

                    echo '
                            </tbody>
                        </table>
                    ';
                }
                elseif ($nombreRol == 'Secretaria')
                {
                    echo '
                        <table class="table mb-0 text-center" id="tbCasos" name="tbCasos">
                            <thead>
                                <tr>
                                    <th scope="col" class="text-center align-middle">#</th>
                                    <th scope="col" class="text-center align-middle">Numero Expediente</th>
                                    <th scope="col" class="text-center align-middle">Abogado</th>
                                    <th scope="col" class="text-center align-middle">Tipo de Cliente</th>
                                    <th scope="col" class="text-center align-middle">Parte Actora</th>
                                    <th scope="col" class="text-center align-middle">Parte Demandada</th>
                                    <th scope="col" class="text-center align-middle">Ubicación del Expediente</th>
                                    <th scope="col" class="text-center align-middle">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                    ';

                    foreach ($casosSecretaria as $caso)
                    {
                        echo '
                            <tr>
                                <td class="text-center align-middle"><strong>' . $caso['idCaso'] . '</strong></td>
                                <td class="text-center align-middle"><strong>' . $caso['numeroExpediente'] . '</strong></td>
                                <td class="text-center align-middle"><strong>' . $caso['nombreCompleto'] . '</strong></td>
                                <td class="text-center align-middle"><strong>' . $caso['nombreTipoCliente'] . '</strong></td>
                                <td class="text-center align-middle"><strong>' . $caso['parteActora'] . '</strong></td>
                                <td class="text-center align-middle"><strong>' . $caso['parteDemandada'] . '</strong></td>
                                <td class="text-center align-middle"><strong>' . $caso['ubicacionExpediente'] . '</strong></td>
                                <td class="text-center align-middle">
                                    <div style="display: flex; justify-content: center; gap: 20px; align-items: center;">
                                        <a href="VerDetallesCaso.php?id=' . $caso['idCaso'] . '" style="color: #0d6efd; font-size: 26px;">
                                            <i class="fa-regular fa-eye"></i>
                                        </a>

                                        <form method="POST" action="" style="margin: 0; padding: 0;">
                                            <input type="hidden" name="idCaso" value="' . $caso['idCaso'] . '">
                                            <button type="submit" name="btnEliminar" style="background: none; border: none; padding: 0; margin: 0; cursor: pointer; color: #dc3545; font-size: 26px;">
                                                <i class="fa-solid fa-eraser"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        ';
                    }

                    echo '
                            </tbody>
                        </table>
                    ';
                }
                ?>
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