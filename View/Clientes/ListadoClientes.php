<?php
    include_once $_SERVER['DOCUMENT_ROOT'] . '/JurisTime/View/LayoutUtilidades.php';
    include_once $_SERVER['DOCUMENT_ROOT'] . '/JurisTime/Controller/ClientesController.php';
    $clientes = ConsultarClientes($_SESSION['idUsuario']);
    $clientesSecretaria = ConsultarClientesSecretaria();
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
            <h2 class="text-center mb-3">Listado de Clientes</h2>
        </div>
        <div class="mb-3">
            <a class="btn text-white px-4" style="background-color: #0a58ca;"
                href="RegistrarCliente.php">
                    Registrar Cliente
            </a>
            <a class="btn text-white px-4 ms-2" style="background-color: #ca340aff;"
                href="ListadoClientesEliminados.php">
                    Clientes Eliminados
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
                        <table class="table mb-0 text-center" id="tbClientes" name="tbClientes">
                            <thead>
                                <tr>
                                    <th scope="col" class="text-center align-middle">#</th>
                                    <th scope="col" class="text-center align-middle">Cedula</th>
                                    <th scope="col" class="text-center align-middle">Nombre</th>
                                    <th scope="col" class="text-center align-middle">Correo Electronico</th>
                                    <th scope="col" class="text-center align-middle">Teléfono</th>
                                    <th scope="col" class="text-center align-middle">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                    ';

                    foreach ($clientes as $cliente)
                    {
                        echo '
                            <tr>
                                <td class="text-center align-middle"><strong>' . $cliente['idCliente'] . '</strong></td>
                                <td class="text-center align-middle"><strong>' . $cliente['cedula'] . '</strong></td>
                                <td class="text-center align-middle"><strong>' . $cliente['nombreCompleto'] . '</strong></td>
                                <td class="text-center align-middle"><strong>' . $cliente['correoElectronico'] . '</strong></td>
                                <td class="text-center align-middle"><strong>' . $cliente['telefono'] . '</strong></td>
                                <td class="text-center align-middle">
                                    <div style="display: flex; justify-content: center; gap: 20px; align-items: center;">
                                        <a href="ActualizarCliente.php?id=' . $cliente['idCliente'] . '" style="color: #0d6efd; font-size: 26px;">
                                            <i class="fa-regular fa-pen-to-square"></i>
                                        </a>

                                        <form method="POST" action="" style="margin: 0; padding: 0;">
                                            <input type="hidden" name="idCliente" value="' . $cliente['idCliente'] . '">
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
                        <table class="table mb-0 text-center" id="tbClientes" name="tbClientes">
                            <thead>
                                <tr>
                                    <th scope="col" class="text-center align-middle">#</th>
                                    <th scope="col" class="text-center align-middle">Abogado</th>
                                    <th scope="col" class="text-center align-middle">Cedula</th>
                                    <th scope="col" class="text-center align-middle">Nombre</th>
                                    <th scope="col" class="text-center align-middle">Correo Electronico</th>
                                    <th scope="col" class="text-center align-middle">Teléfono</th>
                                    <th scope="col" class="text-center align-middle">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                    ';

                    foreach ($clientesSecretaria as $clienteGlobal)
                    {
                        echo '
                            <tr>
                                <td class="text-center align-middle"><strong>' . $clienteGlobal['idCliente'] . '</strong></td>
                                <td class="text-center align-middle"><strong>' . $clienteGlobal['nombreAbogado'] . '</strong></td>
                                <td class="text-center align-middle"><strong>' . $clienteGlobal['cedula'] . '</strong></td>
                                <td class="text-center align-middle"><strong>' . $clienteGlobal['nombreCompleto'] . '</strong></td>
                                <td class="text-center align-middle"><strong>' . $clienteGlobal['correoElectronico'] . '</strong></td>
                                <td class="text-center align-middle"><strong>' . $clienteGlobal['telefono'] . '</strong></td>
                                <td class="text-center align-middle">
                                    <div style="display: flex; justify-content: center; gap: 20px; align-items: center;">
                                        <a href="ActualizarCliente.php?id=' . $clienteGlobal['idCliente'] . '" style="color: #0d6efd; font-size: 26px;">
                                            <i class="fa-regular fa-pen-to-square"></i>
                                        </a>

                                        <form method="POST" action="" style="margin: 0; padding: 0;">
                                            <input type="hidden" name="idCliente" value="' . $clienteGlobal['idCliente'] . '">
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