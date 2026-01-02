<?php 
    include_once $_SERVER['DOCUMENT_ROOT'] . '/JurisTime/Controller/InicioController.php';

    if(session_status() == PHP_SESSION_NONE)
    {
        session_start();
    }

    if(!isset($_SESSION["nombreCompleto"]))
    {
      header("Location: ../../View/Principal/Home.php");
      exit;
    }

    function VerCss()
    {
        echo
        '
            <head>
                <meta charset="utf-8">
                <meta name="viewport" content="width=device-width, initial-scale=1">
                <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
                <title>JurisTime</title>
                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
                <link rel="stylesheet" href="../css/estilosPrincipales.css">
            </head>
        ';
    }

    function VerSidebar()
    {
        $nombreCompleto = "";
        $nombreRol = "";
        $imagen = "";
        if(isset($_SESSION["nombreCompleto"]))
        {
            $nombreCompleto = $_SESSION["nombreCompleto"];
            $nombreRol = $_SESSION["nombreRol"];
            $imagen = $_SESSION["urlImagen"];
        }
        echo
        '
                <div class="sidebar d-flex flex-column flex-shrink-0 p-3 text-white bg-dark" id="sidebar">
                    <a href="Home.php"
                        class="d-flex justify-content-center align-items-center mb-3 mb-md-0 text-white text-decoration-none">
                        <i class="fa-solid fa-scale-balanced sidebar-logo"></i>
                    </a>
                    <hr>
                    <div class="user-profile-sidebar">
                        <div class="profile-image-container">
                            <img src="../images/'.$imagen.'" alt="Perfil" class="profile-image">
                        </div>
                        <div class="profile-info">
                            <h6 class="profile-name">'.$nombreCompleto.'</h6>
                            <small class="profile-role">'.$nombreRol.'</small>
                        </div>
                    </div>
                    <hr>
                    <ul class="nav nav-pills flex-column mb-auto">
                    ';
                    if($nombreRol == 'Administrador')
                    {
                        echo'
                        <li>
                            <a href="../Administrativo/Dashboard.php" class="nav-link text-white">
                                <i class="fa-solid fa-chart-line me-2"></i> 
                                <span class="menu-text">Dashboard</span>
                            </a>
                        </li>
                        <li>
                            <a href="../Administrativo/GestionUsuarios.php" class="nav-link text-white">
                                <i class="fa-solid fa-users me-2"></i> 
                                <span class="menu-text">Gestión de Usuarios</span>
                            </a>
                        </li>
                        ';
                    }
                    elseif($nombreRol == 'Abogado' || $nombreRol == 'Secretaria')
                    {
                    echo'
                        <li>
                            <a href="../Clientes/ListadoClientes.php" class="nav-link text-white">
                                <i class="fa-solid fa-users me-2"></i>
                                <span class="menu-text">Clientes</span>
                            </a>
                        </li>
                        <li>
                            <a href="../Casos/ListadoCasos.php" class="nav-link text-white">
                                <i class="fa-solid fa-box me-2"></i>
                                <span class="menu-text">Casos</span>
                            </a>
                        </li>
                        <li>
                            <a href="../Calendario/VerCalendario.php" class="nav-link text-white">
                                <i class="fa-solid fa-calendar me-2"></i>
                                <span class="menu-text">Calendario</span>
                            </a>
                        </li>   
                        ';
                    }
                    echo'
                    </ul>
                </div>
        ';
    }

    function VerNavbar()
    {
        $nombreCompleto = "";
        $imagen = "";
        if(isset($_SESSION["nombreCompleto"]))
        {
            $nombreCompleto = $_SESSION["nombreCompleto"];
            $imagen = $_SESSION["urlImagen"];
        }
        echo
        '
            <div class="content-section">
                <nav class="navbar navbar-expand-lg navbar-dark bg-dark top-navbar">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center">
                            <button class="btn-toggle-sidebar" id="toggleSidebar" type="button">
                                <i class="fa-solid fa-bars"></i>
                            </button>
                        </div>
                        <div class="dropdown ms-auto">
                            <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle navbar-profile"
                                id="dropdownUserNavbar" data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="../images/'.$imagen.'" alt="" class="navbar-profile-img">
                                <span class="navbar-username d-none d-lg-inline">'.$nombreCompleto.'</span>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-dark dropdown-menu-end text-small shadow" aria-labelledby="dropdownUserNavbar">
                                <li><a class="dropdown-item" href="../Perfil/MiPerfil.php"><i class="fa-solid fa-user me-2"></i>Mi Perfil</a></li>
                                <li><a class="dropdown-item" href="../Perfil/ActualizarContraseña.php"><i class="fa-solid fa-key me-2"></i>Cambiar Contraseña</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li>
                                    <form action="" method="POST">
                                        <button type="submit" class="dropdown-item" id="btnSalir" name="btnSalir">
                                            <i class="fa-solid fa-right-from-bracket me-2"></i>
                                            <span class="align-middle">Cerrar Sesión</span>
                                         </button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
        ';
    }

    function Cerrar()
    {
        echo '</div>';
    }

    function VerJs()
    {
        echo
        '
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
            <script src="../js/Sidebar.js"></script>
            <script src="../js/Alertas.js"></script>
        ';
    }
?>