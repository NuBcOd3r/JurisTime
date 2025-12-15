<?php
    include_once $_SERVER['DOCUMENT_ROOT'] . '/JurisTime/View/LayoutUtilidades.php';
    include_once $_SERVER['DOCUMENT_ROOT'] . '/JurisTime/Controller/ClientesController.php';
    $cliente = ConsultarClientePorId($_GET["id"]);
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
                <h5 class="mb-0">Actualizar Cliente</h5>
            </div>
            <div class="card-body p-4">
                <form id="formRegistrarCliente" method="POST" action="">
                    <?php
                        if(isset($_POST["Mensaje"]))
                        {
                            echo '<div class="alert alert-danger alert-dismissible">' . $_POST["Mensaje"] . '</div>';
                        }
                    ?>
                    <input type="hidden" id="idCliente" name="idCliente" value="<?php echo htmlspecialchars($cliente['idCliente']); ?>">

                    <div class="mb-3">
                        <label for="cedula" class="form-label">Cédula</label>
                        <input type="text" class="form-control form-control-dark"  id="cedula" name="cedula" value="<?php echo $cliente['cedula']?>" readOnly>
                    </div>

                    <div class="mb-3">
                        <label for="nombreCompleto" class="form-label">Nombre Completo</label>
                        <input type="text" class="form-control form-control-dark" id="nombreCompleto" name="nombreCompleto" value="<?php echo $cliente['nombreCompleto']?>" readOnly>
                    </div>

                    <div class="mb-3">
                        <label for="correoElectronico" class="form-label">Correo Electrónico</label>
                        <input type="email" class="form-control form-control-dark" id="correoElectronico" name="correoElectronico"
                            value="<?php echo $cliente['correoElectronico']?>" required>
                    </div>

                    <div class="mb-3">
                        <label for="telefono" class="form-label">Teléfono</label>
                        <input type="number" class="form-control form-control-dark" id="telefono" name="telefono"
                            value="<?php echo $cliente['telefono']?>" onkeyup="soloNumeros(this);" required>
                    </div>

                    <div class="row mt-4">
                        <div class="col-12 d-flex justify-content-end gap-2">
                            <a href="ListadoClientes.php" class="btn btn-secondary">
                                <i class="fa-solid fa-times me-1"></i> Cancelar
                            </a>
                            <button type="submit" class="btn btn-primary" name="btnActualizarCliente" id="btnActualizarCliente">
                                <i class="fa-solid fa-save me-1"></i> Guardar Cliente
                            </button>
                        </div>
                    </div>
                </form>
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