<?php
    include_once $_SERVER['DOCUMENT_ROOT'] . '/JurisTime/View/LayoutUtilidades.php';
    include_once $_SERVER['DOCUMENT_ROOT'] . '/JurisTime/Controller/ClientesController.php';
    include_once $_SERVER['DOCUMENT_ROOT'] . '/JurisTime/Controller/CasosController.php';
    $abogados = ConsultarAbogados();
    $tipoCliente = ConsultarTipoCliente();
    $materia = ConsultarMaterias();
    $circuito = ConsultarCircuito();
    $estado = ConsultarEstado();
    $cantones = ConsultarCantones();
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
                <h5 class="mb-0">Registro de Casos</h5>
            </div>
            <div class="card-body p-4">
                <form id="formRegistrarCaso" method="POST" action="">
                ';
                    if(isset($_POST["Mensaje"]))
                    {
                        echo "<div class='alert alert-danger alert-dismissible'>" . $_POST['Mensaje'] . "</div>";
                    }
                echo
                '
                    <div class="mb-3">
                        <label for="numeroExpediente" class="form-label">Numero de Expediente</label>
                        <input type="text" class="form-control form-control-dark" placeholder="Ejm. 25-001074-0639-LA-1" id="numeroExpediente" name="numeroExpediente">
                    </div>

                    <div class="mb-3">
                        <label for="tipoCliente" class="form-label">Tipo de Cliente</label>
                        <select name="tipoCliente" id="tipoCliente" class="form-select form-select-dark" onchange="cambiarTipoCliente()" required>
                            <option value="">Seleccione un tipo de Cliente</option>
                            ';
                            if(!empty($tipoCliente))
                            {
                                foreach($tipoCliente as $opcion)
                                {
                                    echo '<option value="' . $opcion['idTipoCliente'] . '">' . htmlspecialchars($opcion['nombreTipoCliente']) . '</option>';
                                }
                            }
                            else
                            {
                                echo"<option value=''>No hay tipos de cliente por mostrar</option>";
                            }
                        echo
                        '
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Parte Actora</label>
                        <div class="d-flex gap-2">
                            <input type="text" id="parteActora" name="parteActora" class="form-control form-control-dark">
                            <button type="button"
                                class="btn btn-primary btn-cliente"
                                data-bs-toggle="modal"
                                data-bs-target="#ModalCliente"
                                data-tipo="ACTORA"
                                disabled
                                id="btnActora">
                            Consultar
                        </button>
                        </div>
                    </div>
                    
                    <input type="hidden" id="cedulaActora" name="cedulaActora">

                    <div class="mb-3">
                        <label class="form-label">Parte Demandante</label>
                        <div class="d-flex gap-2">
                            <input type="text" id="parteDemandante" name="parteDemandante" class="form-control form-control-dark">
                            <button type="button"
                                class="btn btn-primary btn-cliente"
                                data-bs-toggle="modal"
                                data-bs-target="#ModalCliente"
                                data-tipo="DEMANDANTE"
                                disabled
                                id="btnDemandante">
                            Consultar
                        </button>
                        </div>
                    </div>

                    <input type="hidden" id="cedulaDemandada" name="cedulaDemandada">

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
                        <label for="tipoCaso" class="form-label">Tipo de Caso</label>
                        <input type="text" class="form-control form-control-dark" id="tipoCaso" name="tipoCaso"
                            placeholder="Divorcio" required>
                    </div>

                    <div class="mb-3">
                        <label for="circuito" class="form-label">Circuito</label>

                        <div class="d-flex gap-2">
                            <select name="circuito" id="circuito" class="form-select form-select-dark" required>
                                <option value="">Seleccione un circuito</option>';
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
                        <label for="ubicacionExpediente" class="form-label">Ubicación del Expediente</label>
                        <input type="text" class="form-control form-control-dark" id="ubicacionExpediente" name="ubicacionExpediente"
                            placeholder="D2" required>
                    </div>

                    <div class="mb-3">
                        <label for="estado" class="form-label">Estado del Caso</label>
                        <select name="estado" id="estado" class="form-select form-select-dark" required>
                            <option value="">Seleccione un tipo de Estado</option>
                            ';
                            if(!empty($estado))
                            {
                                foreach($estado as $opcion)
                                {
                                    echo '<option value="' . $opcion['idEstado'] . '">' . htmlspecialchars($opcion['nombreEstado']) . '</option>';
                                }
                            }
                            else
                            {
                                echo"<option value=''>No hay estados por mostrar</option>";
                            }
                        echo
                        '
                        </select>
                    </div>

                    <div class="row mt-4">
                        <div class="col-12 d-flex justify-content-end gap-2">
                            <a href="ListadoClientes.php" class="btn btn-secondary">
                                <i class="fa-solid fa-times me-1"></i> Cancelar
                            </a>
                            <button type="submit" class="btn btn-primary" name="btnRegistrarCaso" id="btnRegistrarCaso">
                                <i class="fa-solid fa-save me-1"></i> Guardar Caso
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
                <h5 class="mb-0">Registro de Casos</h5>
            </div>
            <div class="card-body p-4">
                <form id="formRegistrarCaso" method="POST" action="">
                ';
                    if(isset($_POST["Mensaje"]))
                    {
                        echo "<div class='alert alert-danger alert-dismissible'>" . $_POST['Mensaje'] . "</div>";
                    }
                echo
                '
                    <div class="mb-3">
                        <label for="numeroExpediente" class="form-label">Numero de Expediente</label>
                        <input type="text" class="form-control form-control-dark" placeholder="Ejm. 25-001074-0639-LA-1" id="numeroExpediente" name="numeroExpediente">
                    </div>

                    <div class="mb-3">
                        <label for="abogado" class="form-label">Abogado</label>
                        <select name="abogado" id="abogado" class="form-select form-select-dark" required>
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
                        <label for="tipoCliente" class="form-label">Tipo de Cliente</label>
                        <select name="tipoCliente" id="tipoCliente" class="form-select form-select-dark" onchange="cambiarTipoCliente()" required>
                            <option value="">Seleccione un tipo de Cliente</option>
                            ';
                            if(!empty($tipoCliente))
                            {
                                foreach($tipoCliente as $opcion)
                                {
                                    echo '<option value="' . $opcion['idTipoCliente'] . '">' . htmlspecialchars($opcion['nombreTipoCliente']) . '</option>';
                                }
                            }
                            else
                            {
                                echo"<option value=''>No hay tipos de cliente por mostrar</option>";
                            }
                        echo
                        '
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Parte Actora</label>
                        <div class="d-flex gap-2">
                            <input type="text" id="parteActora" name="parteActora" class="form-control form-control-dark">
                            <button type="button"
                                class="btn btn-primary btn-cliente"
                                data-bs-toggle="modal"
                                data-bs-target="#ModalCliente"
                                data-tipo="ACTORA"
                                disabled
                                id="btnActora">
                            Consultar
                        </button>
                        </div>
                    </div>
                    
                    <input type="hidden" id="cedulaActora" name="cedulaActora">

                    <div class="mb-3">
                        <label class="form-label">Parte Demandante</label>
                        <div class="d-flex gap-2">
                            <input type="text" id="parteDemandante" name="parteDemandante" class="form-control form-control-dark">
                            <button type="button"
                                class="btn btn-primary btn-cliente"
                                data-bs-toggle="modal"
                                data-bs-target="#ModalCliente"
                                data-tipo="DEMANDANTE"
                                disabled
                                id="btnDemandante">
                            Consultar
                        </button>
                        </div>
                    </div>

                    <input type="hidden" id="cedulaDemandada" name="cedulaDemandada">

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
                        <label for="tipoCaso" class="form-label">Tipo de Caso</label>
                        <input type="text" class="form-control form-control-dark" id="tipoCaso" name="tipoCaso"
                            placeholder="Divorcio" required>
                    </div>

                    <div class="mb-3">
                        <label for="circuito" class="form-label">Circuito</label>

                        <div class="d-flex gap-2">
                            <select name="circuito" id="circuito" class="form-select form-select-dark" required>
                                <option value="">Seleccione un circuito</option>';
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
                        <label for="ubicacionExpediente" class="form-label">Ubicación del Expediente</label>
                        <input type="text" class="form-control form-control-dark" id="ubicacionExpediente" name="ubicacionExpediente"
                            placeholder="D2" required>
                    </div>

                    <div class="mb-3">
                        <label for="estado" class="form-label">Estado del Caso</label>
                        <select name="estado" id="estado" class="form-select form-select-dark" required>
                            <option value="">Seleccione un tipo de Estado</option>
                            ';
                            if(!empty($estado))
                            {
                                foreach($estado as $opcion)
                                {
                                    echo '<option value="' . $opcion['idEstado'] . '">' . htmlspecialchars($opcion['nombreEstado']) . '</option>';
                                }
                            }
                            else
                            {
                                echo"<option value=''>No hay estados por mostrar</option>";
                            }
                        echo
                        '
                        </select>
                    </div>

                    <div class="row mt-4">
                        <div class="col-12 d-flex justify-content-end gap-2">
                            <a href="ListadoClientes.php" class="btn btn-secondary">
                                <i class="fa-solid fa-times me-1"></i> Cancelar
                            </a>
                            <button type="submit" class="btn btn-primary" name="btnRegistrarCaso" id="btnRegistrarCaso">
                                <i class="fa-solid fa-save me-1"></i> Guardar Caso
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

    <div class="modal fade" id="ModalCliente" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title">Buscar Cliente</h5>
                    <button class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">
                <div class="d-flex gap-2">
                    <input type="text" id="cedulaBuscar"
                        class="form-control mb-0"
                        placeholder="Ingrese cédula" onkeyup="soloNumeros(this);">

                    <button class="btn btn-primary" onclick="buscarCedula()">
                        Consultar
                    </button>
                </div>            
                    <p class="mt-3">
                        <strong>Cliente:</strong><span id="resultadoCliente"></span>
                    </p>
                </div>

                <div class="modal-footer">
                    <button class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-success" onclick="seleccionarCliente()">
                        Seleccionar Cliente
                    </button>
                </div>

            </div>
        </div>
    </div>

    <?php
    VerJs()
    ?>
</body>

</html>