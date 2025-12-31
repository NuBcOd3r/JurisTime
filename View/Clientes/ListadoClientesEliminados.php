<?php
    include_once $_SERVER['DOCUMENT_ROOT'] . '/JurisTime/View/LayoutUtilidades.php';
    include_once $_SERVER['DOCUMENT_ROOT'] . '/JurisTime/Controller/ClientesController.php';
    $clientesEliminados = ConsultarClientesEliminados();
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
            <h2 class="text-center">Listado de Clientes Eliminados</h2>
        </div>
        <div class="mb-3">
            <a class="btn text-white px-4" style="background-color: #b4b4b4ff;"
                href="ListadoClientes.php">
                    Volver
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
                <table class="table mb-0 text-center" id="tbClientes" name="tbClientes">
                    <thead>
                        <tr>
                            <th scope="col" class="text-center align-middle">#</th>
                            <th scope="col" class="text-center align-middle">Cedula</th>
                            <th scope="col" class="text-center align-middle">Nombre</th>
                            <th scope="col" class="text-center align-middle">Correo Electronico</th>
                            <th scope="col" class="text-center align-middle">Teléfono</th>
                            <th scope="col" class="text-center align-middle">Teléfono Extra</th>
                            <th scope="col" class="text-center align-middle">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            foreach ($clientesEliminados as $cliente)
                                {
                                    echo"<tr>";
                                    echo"<td class='text-center align-middle'><strong>". $cliente['idCliente'] . "</strong></td>";
                                    echo"<td class='text-center align-middle'><strong>". $cliente['cedula'] . "</strong></td>";
                                    echo"<td class='text-center align-middle'><strong>". $cliente['nombreCompleto'] . "</strong></td>";
                                    echo"<td class='text-center align-middle'><strong>". $cliente['correoElectronico'] . "</strong></td>";
                                    echo"<td class='text-center align-middle'><strong>". $cliente['telefono'] . "</strong></td>";
                                    echo"<td class='text-center align-middle'><strong>". $cliente['telefonoExtra'] . "</strong></td>";
                                    echo
                                        "
                                            <td class='text-center align-middle'>
                                                <div style='display: flex; justify-content: center; gap: 20px; align-items: center;'>
                                                    <a href='ActualizarCliente.php?id=" . $cliente['idCliente'] . "'
                                                        style='color: #0d6efd; font-size: 26px;'>
                                                        <i class='fa-regular fa-pen-to-square'></i>
                                                    </a>

                                                    <form method='POST' action='' style='margin: 0; padding: 0;'>
                                                        <input type='hidden' name='idCliente' value='" . $cliente['idCliente'] . "'>
                                                        <button type='submit' name='btnActivar'style='background: none; border: none; padding: 0; margin: 0; cursor: pointer; color: #35dc3dff; font-size: 26px;'>
                                                            <i class='fa-solid fa-rotate'></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        ";
                                    echo"</tr>";
                                }
                        ?>
                    </tbody>
                </table>
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