<?php
    include_once $_SERVER['DOCUMENT_ROOT'] . '/JurisTime/View/LayoutExterno.php';
    include_once $_SERVER['DOCUMENT_ROOT'] . '/JurisTime/Controller/InicioController.php';
?>

<!doctype html>
<html lang="es">

<?php
    VerHead();
?>

<body>

    <section id="seccionFormularioRegistro">
        <div class="wrap">
            <h1 class="register-title">Bienvenido(a)!</h1>
            <form class="register" id="formSignin" name="formSignin" action="" method="post">
                <h5> <b>Registrarse</b> </h5>
                <?php
                    if(isset($_POST["Mensaje"]))
                    {
                        echo '<div class="alert alert-danger">' . $_POST["Mensaje"] . '</div>';
                    }
                ?>
                <input type="text" class="register-input" placeholder="Cedula" id="cedula" name="cedula" onkeyup="ConsultarNombre(); soloNumeros(this);">
                <input type="text" class="register-input" placeholder="Nombre Completo" id="nombreCompleto" name="nombreCompleto" readOnly>
                <input type="email" class="register-input" placeholder="Correo Electronico" id="correoElectronico" name="correoElectronico">
                <input type="password" class="register-input" placeholder="Contraseña" id="contrasenna" name="contrasenna">
                <input type="password" class="register-input" placeholder="Confirmar Contraseña" id="confirmarContrasenna" name="confirmarContrasenna">
                <input type="submit" id="btnRegistrar" name="btnRegistrar" class="register-button">
            </form>
        </div>
    </section>

    <?php
        VerJS();
    ?>
</body>

</html>