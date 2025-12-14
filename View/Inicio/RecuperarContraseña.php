<?php
    include_once $_SERVER['DOCUMENT_ROOT'] . '/Gesti-ndeCitas-BuffeteLegal/View/LayoutExterno.php';
    include_once $_SERVER['DOCUMENT_ROOT'] . '/Gesti-ndeCitas-BuffeteLegal/Controller/InicioController.php';
?>

<!doctype html>
<html lang="es">

<?php
    VerHead();
?>

<body>

    <section id="seccionFormularioLogin">
        <div class="wrap">
            <h1 class="register-title">Bienvenido(a)!</h1>
            <form class="register" id="formRecuperar" name="formRecuperar" action="" method="POST">
                <h5> <b>Recuperar Contraseña</b> </h5>
                <input type="email" class="register-input" placeholder="Correo Electronico" id="correoElectronico" name="correoElectronico">
                <input type="email" class="register-input" placeholder="Confirmar Correo Electronico" id="confirmarCorreoElectronico" name="confirmarCorreoElectronico">
                <input type="submit" id="btnRecuperarContraseña" name="btnRecuperarContraseña" class="register-button">
            </form>
        </div>
    </section>

    <?php
        VerJS();
    ?>
</body>

</html>