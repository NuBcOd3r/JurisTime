<?php
    include_once $_SERVER['DOCUMENT_ROOT'] . '/Gesti-ndeCitas-BuffeteLegal/View/LayoutUtilidades.php';
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
    <div class="row mb-3">
        <div class="col-12">
            <h2 class="text-center">Listado de Clientes</h2>
        </div>
    </div>
    
    <div class="card">
        <div class="card-header position-relative text-center mt-0 mb-3">
            <h5 class="mb-0">Clientes Registrados</h5>
            <a href="RegistrarCliente.php" class="btn btn-primary btn-sm position-absolute end-0 top-50 translate-middle-y me-3">
                <i class="fa-solid fa-plus me-1"></i> Nuevo Cliente
            </a>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table mb-0">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Cedula</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Correo Electronico</th>
                            <th scope="col">Teléfono</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                            <td>@mdo</td>
                            <td>
                                <button class="btn btn-sm btn-primary me-1">
                                    <i class="fa-solid fa-edit"></i>
                                </button>
                                <button class="btn btn-sm btn-danger">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>Jacob</td>
                            <td>Thornton</td>
                            <td>@fat</td>
                            <td>@mdo</td>
                            <td>
                                <button class="btn btn-sm btn-primary me-1">
                                    <i class="fa-solid fa-edit"></i>
                                </button>
                                <button class="btn btn-sm btn-danger">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">3</th>
                            <td>Larry</td>
                            <td>Bird</td>
                            <td>@twitter</td>
                            <td>@mdo</td>
                            <td>
                                <button class="btn btn-sm btn-primary me-1">
                                    <i class="fa-solid fa-edit"></i>
                                </button>
                                <button class="btn btn-sm btn-danger">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">4</th>
                            <td>Juan</td>
                            <td>Pérez</td>
                            <td>@jperez</td>
                            <td>@mdo</td>
                            <td>
                                <button class="btn btn-sm btn-primary me-1">
                                    <i class="fa-solid fa-edit"></i>
                                </button>
                                <button class="btn btn-sm btn-danger">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">5</th>
                            <td>María</td>
                            <td>González</td>
                            <td>@mgonzalez</td>
                            <td>@mdo</td>
                            <td>
                                <button class="btn btn-sm btn-primary me-1">
                                    <i class="fa-solid fa-edit"></i>
                                </button>
                                <button class="btn btn-sm btn-danger">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
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