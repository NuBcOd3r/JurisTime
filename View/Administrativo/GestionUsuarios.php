<?php
    include_once $_SERVER['DOCUMENT_ROOT'] . '/JurisTime/View/LayoutUtilidades.php';
    include_once $_SERVER['DOCUMENT_ROOT'] . '/JurisTime/Controller/AdminController.php';
    $usuarios = ConsultarUsuarios();
    if(session_status() == PHP_SESSION_NONE)
    {
        session_start();
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
    <div class="card">
        <div class="card-body p-4">
            <div class="table-responsive">

                <div class="card-header text-center">
                    <h5 class="mb-0">Listado de Usuarios Activos</h5>
                </div>
                <a class="btn btn-sm text-white px-3 mb-3 mt-3" style="background-color:#ca340aff;"href="UsuariosEliminados.php">
                    Usuarios Eliminados
                </a>

                <div class="row mb-3">
                <?php
                if(isset($_POST["Mensaje"]))
                {
                     echo '<div class="alert alert-danger alert-dismissible">' . $_POST["Mensaje"] . '</div>';
                }

                if (!empty($usuarios)) {
                    foreach ($usuarios as $u) {
                ?>
                    <div class="col-md-4 col-lg-3">
                        <div class="card h-150 shadow-sm mb-3">

                            <img src="../images/<?php echo $u['urlImagen'] ?? 'default.png'; ?>" 
                                 class="card-img-top"
                                 style="height:350px; object-fit:cover;"
                                 alt="Usuario">

                            <div class="card-body text-center">


                                <p class="text-muted mb-1">
                                    <?= htmlspecialchars($u['nombreRol']) ?>
                                </p>

                                <h6 class="fw-bold mb-2">
                                    <?= htmlspecialchars($u['nombreCompleto']) ?>
                                </h6>

                                <p class="mb-1 small">
                                    <strong>Cédula:</strong><br>
                                    <?= htmlspecialchars($u['cedula']) ?>
                                </p>

                                <p class="mb-3 small">
                                    <strong>Correo:</strong><br>
                                    <?= htmlspecialchars($u['correoElectronico']) ?>
                                </p>

                                <div class="d-flex justify-content-center gap-2 mb-3">
                                    <form method="POST" action="" style="margin: 0; padding: 0;">
                                        <input type="hidden" name="idUsuario" value="<?php echo $u['idUsuario']; ?>">
                                        <button type="submit" name="btnEliminarUsuario" style="background: none; border: none; padding: 0; margin: 0; cursor: pointer; color: #dc3545; font-size: 26px;">
                                            <i class="fa-solid fa-eraser"></i>
                                        </button>
                                    </form>

                                    <a href="ActualizarRol.php?id=<?= $u['idUsuario'] ?>"
                                       class="btn btn-outline-primary btn-sm"
                                       title="Actualizar rol">
                                        <i class="fa-solid fa-user-pen"></i>
                                    </a>
                                </div>

                            </div>
                        </div>
                    </div>
                <?php
                    }
                } else {
                    echo '<p class="text-center text-muted">No hay usuarios registrados</p>';
                }
                ?>

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