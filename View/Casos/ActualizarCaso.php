<?php
    include_once $_SERVER['DOCUMENT_ROOT'] . '/JurisTime/View/LayoutUtilidades.php';
    include_once $_SERVER['DOCUMENT_ROOT'] . '/JurisTime/Controller/ClientesController.php';
    include_once $_SERVER['DOCUMENT_ROOT'] . '/JurisTime/Controller/CasosController.php';
    $abogados = ConsultarAbogados();
    $materia = ConsultarMaterias();
    $circuito = ConsultarCircuito();
    $estado = ConsultarEstado();
    $cantones = ConsultarCantones();
    if (!isset($_GET['id'])) 
    {
        header("Location: ListadoCasos.php");
        exit;
    }

    $idCaso = $_GET['id'];

    $informacion = ConsultarDetalleCaso($idCaso);

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
            <div class="card-header text-center">
                <h5 class="mb-0">Actualizar Caso #'. $idCaso .'</h5>
            </div>

            <form method="POST" action="" id="formActualizarCaso" name="formActualizarCaso">
                <div class="container">
                    <div class="row mt-4">

                        <div class="col-md-8 text-white">

                            <div class="info-card p-4">
                                <h5 class="mb-3">Información del Caso</h5>

                                <input type="hidden" name="idCaso" id="idCaso" value="'. htmlspecialchars($informacion['idCaso']) .'">

                                <div class="mb-3">
                                    <label class="form-label">Número de Expediente</label>
                                    <input type="text" name="numeroExpediente"
                                        class="form-control form-control-dark"
                                        value="'. htmlspecialchars($informacion['numeroExpediente']) .'">
                                </div>

                                <div class="mb-3">
                                    <label for="materia" class="form-label">Matería</label>
                                    <select name="materia" id="materia" class="form-select form-select-dark" required>
                                    <option value="">Seleccione un tipo de Materia</option>
                                        ';
                                        if(!empty($materia))
                                        {
                                            foreach($materia as $opcion)
                                            {
                                                echo '<option value="' . $opcion['idMateriaLegal'] . '">' . htmlspecialchars($opcion['nombreMateria']) . '</option>';
                                            }
                                        }
                                        else
                                        {
                                            echo"<option value=''>No hay materias por mostrar</option>";
                                        }
                                    echo 
                                    '
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Tipo de Caso</label>
                                    <input type="text" name="tipoCaso"
                                        class="form-control form-control-dark"
                                        value="'. htmlspecialchars($informacion['tipoCaso']).'">
                                </div>

                                <div class="mb-3">
                                    <label for="circuito" class="form-label">Circuito</label>

                                    <div class="d-flex gap-2">
                                            <select name="circuito" id="circuito" class="form-select form-select-dark" required>
                                            <option value="">Seleccione un circuito</option>  
                                                ';
                                                if (!empty($circuito)) 
                                                {
                                                    foreach ($circuito as $opcion) 
                                                    {
                                                        echo '<option value="' . $opcion['idCircuito'] . '">' .
                                                            htmlspecialchars($opcion['nombreCircuito']) .
                                                            '</option>';
                                                    }
                                                } else 
                                                {
                                                    echo "<option value=''>No hay circuitos por mostrar</option>";
                                                }
                                            echo'
                                            </select>

                                            <button  class="btn btn-primary px-5" data-bs-toggle="modal" data-bs-target="#ModalCantones">
                                                Consultar
                                            </button>
                                        </div>
                                    </div>

                                <div class="mb-3">
                                    <label class="form-label">Ubicación del Expediente</label>
                                    <input type="text" name="ubicacionExpediente"
                                        class="form-control form-control-dark"
                                        value="'. htmlspecialchars($informacion['ubicacionExpediente']) .'">
                                </div>

                                <div class="mb-3">
                                    <label for="estado" class="form-label">Estado del Caso</label>
                                    <select name="estado" id="estado" class="form-select form-select-dark" required>
                                    <option value="">Seleccione un tipo de Estado</option>
                                ';

                                if (!empty($estado)) {
                                    foreach ($estado as $opcion) {

                                        $selected = ($opcion['idEstado'] == $informacion['idEstado'])
                                            ? 'selected'
                                            : '';

                                        echo '<option value="' . $opcion['idEstado'] . '" ' . $selected . '>'
                                            . htmlspecialchars($opcion['nombreEstado']) .
                                            '</option>';
                                    }
                                } else {
                                    echo "<option value=''>No hay estados por mostrar</option>";
                                }

                                echo '
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 text-white">
                            <div class="info-card p-3 small opacity-75">
                                <div class="card">
                                <div class="card-header">
                                    <h6 class="fs-5">Cliente</h6>
                                </div>
                                    <div class="card-body p-2">
                                        <p class="text-white"><strong>Nombre:</strong> ' . htmlspecialchars($informacion['cliente']) . '</p>
                                        <p class="text-white"><strong>Cédula:</strong> ' . htmlspecialchars($informacion['cedula']) . '</p>
                                        <p class="text-white"><strong>Correo:</strong> ' . htmlspecialchars($informacion['correoElectronico']) . '</p>
                                        <p class="text-white"><strong>Teléfono:</strong> ' . htmlspecialchars($informacion['telefono']) . '</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-end gap-3 mt-4 mb-4">

                            <button type="submit" name="btnActualizarCaso"
                                    class="btn btn-success btn-lg">
                                <i class="fa-solid fa-floppy-disk"></i> Actualizar
                            </button>

                            <a href="VerDetallesCaso.php?id=<?= $idCaso ?>"
                            class="btn btn-outline-danger btn-lg">
                                <i class="fa-solid fa-xmark"></i> Cancelar
                            </a>

                        </div>

                    </div>
                </div>
            </form>
        </div>
    </div>';
    }
    elseif($nombreRol == 'Secretaria')
    {
    echo'
        <div class="main-content">
        <div class="card">
            <div class="card-header text-center">
                <h5 class="mb-0">Actualizar Caso #'. $idCaso .'</h5>
            </div>

            <form method="POST" action="">
                <div class="container">
                    <div class="row mt-4">

                        <div class="col-md-8 text-white">

                            <div class="info-card p-4">
                                <h5 class="mb-3">Información del Caso</h5>

                                <div class="mb-3">
                                    <label for="abogado" class="form-label">Abogado</label>
                                    <select name="abogado" id="abogado" class="form-select form-select-dark" required>
                                    <option value="">Seleccione un abogado</option>    
                                    ';
                                        if (!empty($abogados)) {
                                            foreach ($abogados as $abogado) {
                                                $selected = ($abogado['idUsuario'] == $abogadoSeleccionado) ? 'selected' : '';
                                                echo '<option value="' . $abogado['idUsuario'] . '" ' . $selected . '>'
                                                    . htmlspecialchars($abogado['nombreCompleto']) . '</option>';
                                            }
                                        } else {
                                            echo '<option value="">No hay abogados por mostrar</option>';
                                        }
                                        echo'
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Número de Expediente</label>
                                    <input type="text" name="numeroExpediente"
                                        class="form-control form-control-dark"
                                        value="'. htmlspecialchars($informacion['numeroExpediente']) .'">
                                </div>

                                <div class="mb-3">
                                    <label for="materia" class="form-label">Matería</label>
                                    <select name="materia" id="materia" class="form-select form-select-dark" required>
                                    <option value="">Seleccione un tipo de Materia</option>    
                                    ';
                                        if(!empty($materia))
                                        {
                                            foreach($materia as $opcion)
                                            {
                                                echo '<option value="' . $opcion['idMateriaLegal'] . '">' . htmlspecialchars($opcion['nombreMateria']) . '</option>';
                                            }
                                        }
                                        else
                                        {
                                            echo"<option value=''>No hay materias por mostrar</option>";
                                        }
                                    echo 
                                    '
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Tipo de Caso</label>
                                    <input type="text" name="tipoCaso"
                                        class="form-control form-control-dark"
                                        value="'. htmlspecialchars($informacion['tipoCaso']).'">
                                </div>

                                <div class="mb-3">
                                    <label for="circuito" class="form-label">Circuito</label>

                                    <div class="d-flex gap-2">
                                            <select name="circuito" id="circuito" class="form-select form-select-dark" required>
                                            <option value="">Seleccione un circuito</option>   
                                            ';
                                                if (!empty($circuito)) 
                                                {
                                                    foreach ($circuito as $opcion) 
                                                    {
                                                        echo '<option value="' . $opcion['idCircuito'] . '">' .
                                                            htmlspecialchars($opcion['nombreCircuito']) .
                                                            '</option>';
                                                    }
                                                } else 
                                                {
                                                    echo "<option value=''>No hay circuitos por mostrar</option>";
                                                }
                                            echo'
                                            </select>

                                            <button  class="btn btn-primary px-5" data-bs-toggle="modal" data-bs-target="#ModalCantones">
                                                Consultar
                                            </button>
                                        </div>
                                    </div>

                                <div class="mb-3">
                                    <label class="form-label">Ubicación del Expediente</label>
                                    <input type="text" name="ubicacionExpediente"
                                        class="form-control form-control-dark"
                                        value="'. htmlspecialchars($informacion['ubicacionExpediente']) .'">
                                </div>

                                <div class="mb-3">
                                    <label for="estado" class="form-label">Estado del Caso</label>
                                    <select name="estado" id="estado" class="form-select form-select-dark" required>
                                    <option value="">Seleccione un tipo de Estado</option>
                                    
                                        ';
                                        if (!empty($estado)) {
                                            foreach ($estado as $opcion) {

                                                $selected = ((int)$opcion['idEstado'] === (int)$informacion['idEstado'])
                                                    ? 'selected'
                                                    : '';

                                                echo '<option value="' . $opcion['idEstado'] . '" ' . $selected . '>'
                                                    . htmlspecialchars($opcion['nombreEstado']) .
                                                    '</option>';
                                            }
                                        } else {
                                            echo "<option value=''>No hay estados por mostrar</option>";
                                        }
                                        echo'
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 text-white">
                            <div class="info-card p-3 small opacity-75">
                                <div class="card">
                                <div class="card-header">
                                    <h6 class="fs-5">Cliente</h6>
                                </div>
                                    <div class="card-body p-2">
                                        <p class="text-white"><strong>Nombre:</strong> ' . htmlspecialchars($informacion['cliente']) . '</p>
                                        <p class="text-white"><strong>Cédula:</strong> ' . htmlspecialchars($informacion['cedula']) . '</p>
                                        <p class="text-white"><strong>Correo:</strong> ' . htmlspecialchars($informacion['correoElectronico']) . '</p>
                                        <p class="text-white"><strong>Teléfono:</strong> ' . htmlspecialchars($informacion['telefono']) . '</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-end gap-3 mt-4 mb-4">

                            <button type="submit" name="btnActualizarCaso"
                                    class="btn btn-success btn-lg">
                                <i class="fa-solid fa-floppy-disk"></i> Actualizar
                            </button>

                            <a href="VerDetallesCaso.php?id=<?= $idCaso ?>"
                            class="btn btn-outline-danger btn-lg">
                                <i class="fa-solid fa-xmark"></i> Cancelar
                            </a>

                        </div>

                    </div>
                </div>
            </form>
        </div>
    </div>';
    }
    ?>
   
<div class="modal fade" id="ModalCantones" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" style="max-width: 1100px;">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Listado de Cantones</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
            <div class="modal-body">
                <table class="table mb-0 text-center" id="tbCantones" name="tbCantones">
                    <thead>
                        <tr>
                            <th scope="col" class="text-center align-middle">Circuito</th>
                            <th scope="col" class="text-center align-middle">Cantón</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($cantones as $canton)
                        {
                            echo '
                                <tr>
                                    <td class="text-center align-middle"><strong>' . $canton['nombreCircuito'] . '</strong></td>
                                    <td class="text-center align-middle"><strong>' . $canton['nombreCanton'] . '</strong></td>
                                </tr>';
                        }
                        ?>
                    </tbody>
                </table>
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