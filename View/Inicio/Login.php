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

    <section id="seccionFormularioLogin">
        <div class="wrap">
            <h1 class="register-title">Bienvenido(a)!</h1>
            <form class="register" id="formLogin" name="formLogin" action="" method="post">
                <h5> <b>Inicio de Sesión</b> </h5>
                <?php
                    if(isset($_POST["Mensaje"]))
                    {
                        echo '<div class="alert alert-danger">' . $_POST["Mensaje"] . '</div>';
                    }
                ?>
                <input type="email" class="register-input" placeholder="Correo Electronico" id="correoElectronico" name="correoElectronico">
                <input type="password" class="register-input" placeholder="Contraseña" id="contrasenna" name="contrasenna">
                <input type="submit" id="btnLogin" name="btnLogin" class="register-button">
                <hr>
                <p class="text-center mt-3 mb-1">¿Aún no tienes cuenta?<a href="Registrarse.php">Registrarse</a></p>
                <p class="text-center mb-0">¿Olvidaste tu contraseña?<a href="RecuperarContraseña.php">Click Aquí</a></p>
            </form>
        </div>
    </section>

    <?php
        VerJS();
    ?>
</body>

</html>