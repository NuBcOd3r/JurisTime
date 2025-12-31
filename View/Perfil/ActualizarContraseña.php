<?php
    include_once $_SERVER['DOCUMENT_ROOT'] . '/JurisTime/View/LayoutUtilidades.php';
    include_once $_SERVER['DOCUMENT_ROOT'] . '/JurisTime/Controller/PerfilController.php';
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
                <h5 class="mb-0">Cambiar Contraseña</h5>
            </div>
            <div class="card-body p-4">
                <form id="formCambiarContraseña" method="POST" action="">
                    <?php
                        if(isset($_POST["Mensaje"]))
                        {
                            echo '<div class="alert alert-danger alert-dismissible">' . $_POST["Mensaje"] . '</div>';
                        }
                        if(isset($_POST["MensajeBueno"]))
                        {
                            echo '<div class="alert alert-success alert-dismissible">' . $_POST["MensajeBueno"] . '</div>';
                        }
                    ?>

                    <div class="mb-3">
                        <label for="contrasennaActual" class="form-label">Contraseña Actual</label>
                        <input type="text" class="form-control form-control-dark"  id="contrasennaActual" name="contrasennaActual">
                    </div>

                    <div class="mb-3">
                        <label for="contrasenna" class="form-label">Contraseña</label>
                        <input type="text" class="form-control form-control-dark"  id="contrasenna" name="contrasenna">
                    </div>

                    <div class="mb-3">
                        <label for="confirmarContrasenna" class="form-label">Confirmar Contraseña</label>
                        <input type="text" class="form-control form-control-dark" id="confirmarContrasenna" name="confirmarContrasenna" >
                    </div>

                    <div class="row mt-4">
                        <div class="col-12 d-flex justify-content-end gap-2">
                            <a href="../Principal/Home.php" class="btn btn-secondary">
                                <i class="fa-solid fa-times me-1"></i> Cancelar
                            </a>
                            <button type="submit" class="btn btn-primary" name="btnActualizarNuevaContrasenna" id="btnActualizarNuevaContrasenna">
                                <i class="fa-solid fa-save me-1"></i> CambiarContraseña
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