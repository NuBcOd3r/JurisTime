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
            <h2 class="text-center">Registrar Cliente</h2>
        </div>
    </div>
    
    <div class="card">
        <div class="card-header position-relative text-center">
            <h5 class="mb-0">Información del Cliente</h5>
        </div>
        <div class="card-body p-4">
            <form id="formRegistrarCliente" method="POST" action="">
                <div class="mb-3">
                    <label for="cedula" class="form-label">Cédula</label>
                    <input type="text" class="form-control form-control-dark" id="cedula" name="cedula" placeholder="Ingrese la cédula" required>
                </div>

                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre Completo</label>
                    <input type="text" class="form-control form-control-dark" id="nombre" name="nombre" placeholder="Ingrese el nombre completo" required>
                </div>

                <div class="mb-3">
                    <label for="correo" class="form-label">Correo Electrónico</label>
                    <input type="email" class="form-control form-control-dark" id="correo" name="correo" placeholder="correo@ejemplo.com" required>
                </div>

                <div class="mb-3">
                    <label for="telefono" class="form-label">Teléfono</label>
                    <input type="tel" class="form-control form-control-dark" id="telefono" name="telefono" placeholder="8888-8888" required>
                </div>

                <div class="row mt-4">
                    <div class="col-12 d-flex justify-content-end gap-2">
                        <a href="ListadoClientes.php" class="btn btn-secondary">
                            <i class="fa-solid fa-times me-1"></i> Cancelar
                        </a>
                        <button type="submit" class="btn btn-primary" name="btnRegistrar" id="btnRegistrar">
                            <i class="fa-solid fa-save me-1"></i> Guardar Cliente
                        </button>
                    </div>
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