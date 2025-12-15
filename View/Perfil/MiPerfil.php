<?php
    include_once $_SERVER['DOCUMENT_ROOT'] . '/JurisTime/View/LayoutUtilidades.php';
    include_once $_SERVER['DOCUMENT_ROOT'] . '/JurisTime/Controller/PerfilController.php';
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
                        <div class="card-header text-center fs-4"> <b>Mi Perfil</b></div>
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
                                    <p class="text-start ms-3 fs-5"><b>E-Mail: </b>'.$datosUsuario["correoElectronico"].'</p>
                                    <div class="d-grid gap-2 col-6 mx-auto">
                                        <a class="btn btn-primary mb-3" href="ActualizarPerfil.php">Actualizar Perfil</a>
                                    </div>
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