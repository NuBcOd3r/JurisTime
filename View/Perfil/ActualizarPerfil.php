<?php
    include_once $_SERVER['DOCUMENT_ROOT'] . '/Gesti-ndeCitas-BuffeteLegal/View/LayoutUtilidades.php';
    include_once $_SERVER['DOCUMENT_ROOT'] . '/Gesti-ndeCitas-BuffeteLegal/Controller/PerfilController.php';
    $datosUsuario = ConsultarUsuario($_SESSION["idUsuario"]);

    if(session_status() == PHP_SESSION_NONE)
    {
        session_start();
    }

    if(!isset($_SESSION["nombreCompleto"]))
    {
      header("Location: ../../View/Principal/Home.php");
      exit;
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

    <?php
        $nombreCompleto = "";
        $nombreRol = "";
        if(isset($_SESSION["nombreCompleto"]))
        {
            $nombreCompleto = $_SESSION["nombreCompleto"];
            $nombreRol = $_SESSION["nombreRol"];
        }
    ?>
    
    <div class="main-content">
        <div class="container">
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4">
                    <div class="card mt-3"> 
                        <div class="card-header text-center fs-4">
                            <b>Actualizar Perfil</b>
                        </div>

                        <div class="d-flex justify-content-center mt-3">
                            <img 
                                src="../images/<?php echo $datosUsuario['urlImagen'] ?? 'default.png'; ?>" 
                                alt="Foto de perfil"
                                class="img-fluid rounded-circle shadow-sm"
                                style="width: 375px; height: 375px; object-fit: cover;">
                        </div>
                        <div class="card-body">
                        <?php
                            if($nombreRol == 'Abogado')
                            {
                                echo
                                '   
                                    <hr>
                                    <p class="text-start ms-3 mt-3 fs-5"><b>Lic. </b>'.$nombreCompleto.'</p>
                                    <p class="text-start ms-3 fs-5"><b>Rol: </b>'.$nombreRol.'</p>
                                    <p class="text-start ms-3 fs-5"><b>Cédula: </b>'.$datosUsuario["cedula"].'</p>
                                    
                                    <form method="POST" action="" name="formActualizarPerfil" id="formActualizarPerfil" enctype="multipart/form-data">
                                        <div class="mb-3 ms-3 me-3">
                                            <label class="form-label"><b>E-Mail</b></label>
                                            <input type="email" class="form-control" name="correoElectronico" value="'.$datosUsuario["correoElectronico"].'"required>
                                        </div>
                                        <div class="mb-3 ms-3 me-3">
                                            <label class="form-label"><b>Foto de Perfil: </b></label>
                                            <input type="file" class="form-control" name="imagen" id="imagen" required>
                                        </div>
                                        <button type="submit" class="btn btn-primary mb-3 d-grid gap-2 col-6 mx-auto" name="btnActualizarPerfil">
                                            Actualizar Perfil
                                        </button>
                                    </form>
                                ';
                            }
                            else if ($nombreRol == 'Secretaria')
                            {
                                echo
                                '
                                    <p class="text-center mt-3 fs-5"><b>Sec. </b>'.$nombreCompleto.'</p>
                                    <p class="text-start ms-3 fs-5"><b>Rol: </b>'.$nombreRol.'</p>
                                    <p class="text-start ms-3 fs-5"><b>Cédula: </b>'.$datosUsuario["cedula"].'</p>
                                    <p class="text-start ms-3 fs-5"><b>E-Mail: </b>'.$datosUsuario["correoElectronico"].'</p>
                                    <div class="d-grid gap-2 col-6 mx-auto">
                                        <a class="btn btn-primary mb-3" href="ActualizarPerfil.php">Actualizar Perfil</a>
                                    </div>
                                ';
                            }
                            else
                            {
                                echo
                                '
                                    <p class="text-center mt-3 fs-5"><b>Adm. </b>'.$nombreCompleto.'</p>
                                    <p class="text-start ms-3 fs-5"><b>Rol: </b>'.$nombreRol.'</p>
                                    <p class="text-start ms-3 fs-5"><b>Cédula: </b>'.$datosUsuario["cedula"].'</p>
                                    <p class="text-start ms-3 fs-5"><b>E-Mail: </b>'.$datosUsuario["correoElectronico"].'</p>
                                    <div class="d-grid gap-2 col-6 mx-auto">
                                        <a class="btn btn-primary mb-3" href="ActualizarPerfil.php">Actualizar Perfil</a>
                                    </div>
                                ';
                            }
                        ?>
                        </div>
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