<?php
    include_once $_SERVER['DOCUMENT_ROOT'] . '/JurisTime/View/LayoutUtilidades.php';
    include_once $_SERVER['DOCUMENT_ROOT'] . '/JurisTime/Controller/MateriasController.php';
    $materias = ConsultarMaterias();
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
        <div class="container">

            <div class="row mb-3">
                <div class="col-12 mt-4">
                    <h2 class="text-center mb-3">Listado de Materias</h2>
                </div>

                <div class="mb-3">
                    <button class="btn text-white px-4" style="background-color: #0a58ca;" data-bs-toggle="modal"
                        data-bs-target="#modalMateria">
                        Nueva Materia
                    </button>
                </div>
            </div>

            <div class="card">
                <div class="card-body p-0 mt-3">
                    <div class="table-responsive">

                        <table class="table mb-0 text-center" id="tbMaterias" name="tbMaterias">
                            <thead>
                                <tr>
                                    <th class="text-center align-middle">#</th>
                                    <th class="text-center align-middle">Nombre de la Materia</th>
                                    <th class="text-center align-middle">Acciones</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php foreach ($materias as $materia) { ?>
                                <tr>
                                    <td class="text-center align-middle">
                                        <strong><?= $materia['idMateriaLegal'] ?></strong>
                                    </td>

                                    <td class="text-center align-middle">
                                        <strong><?= $materia['nombreMateria'] ?></strong>
                                    </td>

                                    <td class="text-center align-middle">
                                        <div>
                                            <i class="fa-regular fa-pen-to-square"
                                                style="color:#0d6efd; font-size:26px; cursor:pointer;"
                                                title="Editar"
                                                data-bs-toggle="modal"
                                                data-bs-target="#modalEditarMateria"
                                                data-id="<?= $materia['idMateriaLegal'] ?>"
                                                data-nombre="<?= $materia['nombreMateria'] ?>">
                                            </i>
                                        </div>
                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>

                        </table>

                    </div>
                </div>
            </div>

        </div>
    </div>


    <div class="modal fade" id="modalMateria" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content rounded-4">

                <div class="modal-header">
                    <h5 class="modal-title fw-bold">Agregar Materia Legal</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <form id="formMateria" name="formMateria" method="POST">

                    <div class="modal-body px-4">
                        <div class="mb-3">
                            <label class="form-label fw-semibold">
                                Nombre de la materia
                            </label>
                            <input type="text" class="form-control" id="nombreMateria" name="nombreMateria"
                                placeholder="Ej: Derecho Penal" required>
                        </div>
                    </div>

                    <div class="modal-footer justify-content-center">
                        <button type="submit" class="btn btn-primary px-5 rounded-pill" id="btnAgregarMateria"
                            name="btnAgregarMateria">
                            <i class="fa-solid fa-save me-2"></i>
                            Guardar
                        </button>
                    </div>

                </form>

            </div>
        </div>
    </div>

    <div class="modal fade" id="modalEditarMateria" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title fw-bold">Actualizar Materia</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <form method="POST" action="" id="formEditarMateria">

                    <input type="hidden" id="idMateriaEditar" name="idMateriaEditar">

                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label fw-semibold">
                                Nombre de la Materia
                            </label>
                            <input type="text"
                                class="form-control"
                                id="nombreMateriaEditar"
                                name="nombreMateriaEditar"
                                required>
                        </div>
                    </div>

                    <div class="modal-footer justify-content-center">
                        <button type="submit"
                                class="btn text-white px-4"
                                style="background-color:#0a58ca;"
                                name="btnActualizarMateria">
                            Actualizar
                        </button>
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