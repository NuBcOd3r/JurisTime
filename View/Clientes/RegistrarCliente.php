<?php
    include_once $_SERVER['DOCUMENT_ROOT'] . '/JurisTime/View/LayoutUtilidades.php';
    include_once $_SERVER['DOCUMENT_ROOT'] . '/JurisTime/Controller/ClientesController.php';
    $nacionalidad = ConsultarNacionalidad();
    $abogados = ConsultarAbogados();
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
    
    if($nombreRol == 'Abogado')
    {
    echo
    '
    <div class="main-content">
        <div class="card">
            <div class="card-header position-relative text-center">
                <h5 class="mb-0">Información del Cliente</h5>
            </div>
            <div class="card-body p-4">
                <form id="formRegistrarCliente" method="POST" action="">
                ';
                    if(isset($_POST["Mensaje"]))
                    {
                        echo "<div class='alert alert-danger alert-dismissible'>" . $_POST['Mensaje'] . "</div>";
                    }
                echo
                '
                    <div class="mb-3">
                        <label for="nacionalidad" class="form-label">Nacionalidad</label>
                        <select name="nacionalidad" id="nacionalidad" class="form-select form-select-dark" onchange="cambiarNacionalidad()" required>
                            <option value="">Seleccione una nacionalidad</option>
                            ';
                            if(!empty($nacionalidad))
                            {
                                foreach($nacionalidad as $opcion)
                                {
                                    echo '<option value="' . $opcion['idNacionalidad'] . '">' . htmlspecialchars($opcion['nombreNacionalidad']) . '</option>';
                                }
                            }
                            else
                            {
                                echo"<option value=''>No hay nacionalidades por mostrar</option>";
                            }
                        echo
                        '
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="cedula" class="form-label">Cédula</label>
                        <input type="text" class="form-control form-control-dark" placeholder="Ingrese una cedula o identificación" id="cedula" name="cedula">
                    </div>

                    <div class="mb-3">
                        <label for="nombreCompleto" class="form-label">Nombre Completo</label>
                        <input type="text" class="form-control form-control-dark" placeholder="Ingrese el nombre completo" id="nombreCompleto" name="nombreCompleto">
                    </div>

                    <div class="mb-3">
                        <label for="correoElectronico" class="form-label">Correo Electrónico</label>
                        <input type="email" class="form-control form-control-dark" id="correoElectronico" name="correoElectronico"
                            placeholder="correo@ejemplo.com" required>
                    </div>

                    <div class="mb-3">
                        <label for="telefono" class="form-label">Teléfono</label>
                        <input type="number" class="form-control form-control-dark" id="telefono" name="telefono"
                            placeholder="8888-8888" onkeyup="soloNumeros(this);" required>
                    </div>

                    <div class="row mt-4">
                        <div class="col-12 d-flex justify-content-end gap-2">
                            <a href="ListadoClientes.php" class="btn btn-secondary">
                                <i class="fa-solid fa-times me-1"></i> Cancelar
                            </a>
                            <button type="submit" class="btn btn-primary" name="btnRegistrarCliente" id="btnRegistrarCliente">
                                <i class="fa-solid fa-save me-1"></i> Guardar Cliente
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    ';
    }
    elseif($nombreRol == 'Secretaria')
    {
    echo
    '
    <div class="main-content">
        <div class="card">
            <div class="card-header position-relative text-center">
                <h5 class="mb-0">Información del Cliente</h5>
            </div>
            <div class="card-body p-4">
                <form id="formRegistrarCliente" method="POST" action="">
                ';
                    if(isset($_POST["Mensaje"]))
                    {
                        echo "<div class='alert alert-danger alert-dismissible'>" . $_POST['Mensaje'] . "</div>";
                    }
                echo
                '
                    <div class="mb-3">
                        <label for="nacionalidad" class="form-label">Nacionalidad</label>
                        <select name="nacionalidad" id="nacionalidad" class="form-select form-select-dark" onchange="cambiarNacionalidad()" required>
                            <option value="">Seleccione una nacionalidad</option>
                            ';
                            if(!empty($nacionalidad))
                            {
                                foreach($nacionalidad as $opcion)
                                {
                                    echo '<option value="' . $opcion['idNacionalidad'] . '">' . htmlspecialchars($opcion['nombreNacionalidad']) . '</option>';
                                }
                            }
                            else
                            {
                                echo"<option value=''>No hay nacionalidades por mostrar</option>";
                            }
                        echo
                        '
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="nacionalidad" class="form-label">Abogado</label>
                        <select name="Abogado" id="Abogado" class="form-select form-select-dark" required>
                            <option value="">Seleccione un abogado</option>
                            ';
                            if(!empty($abogados))
                            {
                                foreach($abogados as $abogado)
                                {
                                    echo '<option value="' . $abogado['idUsuario'] . '">' . htmlspecialchars($abogado['nombreCompleto']) . '</option>';
                                }
                            }
                            else
                            {
                                echo"<option value=''>No hay abogados por mostrar</option>";
                            }
                        echo
                        '
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="cedula" class="form-label">Cédula</label>
                        <input type="text" class="form-control form-control-dark" placeholder="Ingrese una cedula o identificación" id="cedula" name="cedula">
                    </div>

                    <div class="mb-3">
                        <label for="nombreCompleto" class="form-label">Nombre Completo</label>
                        <input type="text" class="form-control form-control-dark" placeholder="Ingrese el nombre completo" id="nombreCompleto" name="nombreCompleto">
                    </div>

                    <div class="mb-3">
                        <label for="correoElectronico" class="form-label">Correo Electrónico</label>
                        <input type="email" class="form-control form-control-dark" id="correoElectronico" name="correoElectronico"
                            placeholder="correo@ejemplo.com" required>
                    </div>

                    <div class="mb-3">
                        <label for="telefono" class="form-label">Teléfono</label>
                        <input type="number" class="form-control form-control-dark" id="telefono" name="telefono"
                            placeholder="8888-8888" onkeyup="soloNumeros(this);" required>
                    </div>

                    <div class="row mt-4">
                        <div class="col-12 d-flex justify-content-end gap-2">
                            <a href="ListadoClientes.php" class="btn btn-secondary">
                                <i class="fa-solid fa-times me-1"></i> Cancelar
                            </a>
                            <button type="submit" class="btn btn-primary" name="btnRegistrarCliente" id="btnRegistrarCliente">
                                <i class="fa-solid fa-save me-1"></i> Guardar Cliente
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    ';
    }
    ?>

    <?php
    Cerrar()
    ?>

    <?php
    VerJs()
    ?>
</body>

</html>