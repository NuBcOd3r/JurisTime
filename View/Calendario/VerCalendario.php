<?php
    include_once $_SERVER['DOCUMENT_ROOT'] . '/JurisTime/View/LayoutUtilidades.php';
    include_once $_SERVER['DOCUMENT_ROOT'] . '/JurisTime/Controller/ActividadesController.php';
    include_once $_SERVER['DOCUMENT_ROOT'] . '/JurisTime/Controller/ClientesController.php';
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


<div class="main-content">
    <div class="card">
        <div class="card-body p-3">
            <div id="calendar"></div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalActividad" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">

      <div class="modal-header bg-primary">
        <h5 class="modal-title text-center text-light"><b>Elegir Actividad</b></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <div class="modal-body text-center">
        <button class="btn btn-primary m-2" onclick="abrirModalEvento()">Agregar Evento</button>
        <button class="btn btn-success m-2" onclick="abrirModalCita()">Agregar Cita</button>
      </div>

    </div>
  </div>
</div>

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
      <div class="modal fade" id="modalEvento" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">

            <div class="modal-header">
              <h5 class="modal-title">Nuevo Evento</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">
              <form action="" method=post id="RegistrarEvento" name="RegistrarEvento">
                <p id="fechaEventoTexto" class="fw-bold"></p>
                <input type="hidden" id="fechaEvento" name="fechaEvento">

                <div>
                  <label for="descripcionEvento" class="mb-2">Descripción: </label>
                  <input class="form-control mb-2" id="descripcionEvento" name="descripcionEvento">
                </div>

                <div>
                  <label for="hora" class="mb-2">Hora: </label>
                  <input type="time" class="form-control mb-2" id="hora" name="hora">
                </div>

                <div class="d-flex justify-content-center">
                  <button class="btn btn-primary m-2" style="width:500px" id="btnAgregarEvento" name="btnAgregarEvento">Agregar</button>
                </div>
              </form>
            </div>

          </div>
        </div>
      </div>
    ';
    }
    elseif($nombreRol == 'Secretaria')
    {
    echo
    '
    <div class="modal fade" id="modalEvento" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">

            <div class="modal-header">
              <h5 class="modal-title">Nuevo Evento</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">
              <form action="" method=post id="RegistrarEvento" name="RegistrarEvento">
                <p id="fechaEventoTexto" class="fw-bold"></p>
                <input type="hidden" id="fechaEvento" name="fechaEvento">
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
                <div>
                  <label for="descripcionEvento" class="mb-2">Descripción: </label>
                  <input class="form-control mb-2" id="descripcionEvento" name="descripcionEvento">
                </div>

                <div>
                  <label for="hora" class="mb-2">Hora: </label>
                  <input type="time" class="form-control mb-2" id="hora" name="hora">
                </div>

                <div class="d-flex justify-content-center">
                  <button class="btn btn-primary m-2" style="width:500px" id="btnAgregarEvento" name="btnAgregarEvento">Agregar</button>
                </div>
              </form>
            </div>

          </div>
        </div>
      </div>
    ';
    }
  ?>

<div class="modal fade" id="modalDetalleEvento" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">

      <div class="modal-header bg-primary text-white">
        <h5 class="modal-title">Detalle del evento</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
      </div>

      <div class="modal-body">
        <p><strong>Título:</strong></p>
        <p id="modalTitulo"></p>

        <p><strong>Fecha:</strong></p>
        <p id="modalFecha"></p>

        <p><strong>Hora:</strong></p>
        <p id="modalHora"></p>
      </div>

      <div class="modal-footer">
        <button class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
      </div>

    </div>
  </div>
</div>

<div class="modal fade" id="modalCita" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title">Nueva Cita</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <div class="modal-body">
        <p id="fechaCita" class="fw-bold"></p>
        <input class="form-control" placeholder="Descripción de la cita">
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
<script src="../js/Actividades.js"></script>
<script src="../js/VerCalendario.js"></script>
</body>

</html>