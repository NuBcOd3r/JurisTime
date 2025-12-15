<?php
    include_once $_SERVER['DOCUMENT_ROOT'] . '/JurisTime/Model/InicioModel.php';
    include_once $_SERVER['DOCUMENT_ROOT'] . '/JurisTime/Controller/UtilidadesController.php';
    
    if(session_status() == PHP_SESSION_NONE)
    {
        session_start();
    }

    if(isset($_POST["btnRegistrar"]))
    {
        $cedula = $_POST["cedula"];
        $nombreCompleto = $_POST["nombreCompleto"];
        $correoElectronico = $_POST["correoElectronico"];
        $contrasenna = $_POST["contrasenna"];
        $contrasennaHash = password_hash($contrasenna, PASSWORD_DEFAULT);

        $resultado = RegistrarUsuarioModel($cedula, $nombreCompleto, $correoElectronico, $contrasennaHash);

        if($resultado)
        {
            header("Location: ../../View/Inicio/Login.php");
            exit;
        }
        else
        {
            $_POST["Mensaje"] = "No se ha podido agregar el usuario.";
        }
    }

    if(isset($_POST["btnLogin"]))
    {
        $correoElectronico = $_POST["correoElectronico"];
        $contrasenna = $_POST["contrasenna"];

        $resultado = IniciarSesionModel($correoElectronico, $contrasenna);

        if($resultado)
        {
            $_SESSION["idUsuario"] = $resultado["idUsuario"];
            $_SESSION["nombreCompleto"] = $resultado["nombreCompleto"];
            $_SESSION["nombreRol"] = $resultado["nombreRol"];
            $_SESSION["urlImagen"] = $resultado["urlImagen"];
            header("Location: ../../View/Principal/Home.php");
            exit;
        }
        else
        {
            $_POST["Mensaje"] = "No se ha podido iniciar sesión.";
        }
    }


    if (isset($_POST["btnRecuperarContraseña"])) 
    {
        $correoElectronico = $_POST["correoElectronico"];
        $resultado = RecuperarCuentaModel($correoElectronico);

        if ($resultado) {

            $contrasennaGenerada = GenerarContrasenna();
            $contrasennaHash = password_hash($contrasennaGenerada, PASSWORD_DEFAULT);

            $resultadoActualizar = ActualizarContrasennaModel($resultado['idUsuario'], $contrasennaHash);

            if ($resultadoActualizar) {

                $mensaje = "
                <!DOCTYPE html>
                <html lang='es'>
                <head>
                    <meta charset='UTF-8'>
                    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
                    <title>Recuperar Contraseña - JurisTime</title>
                </head>
                <body style='margin:0; padding:0; font-family: Arial, sans-serif; background-color:#f4f4f4;'>
                    <table width='100%' cellpadding='0' cellspacing='0' style='background-color:#f4f4f4; padding:40px 0;'>
                        <tr>
                            <td align='center'>
                                <table width='600' cellpadding='0' cellspacing='0' style='background-color:#ffffff; border-radius:8px; overflow:hidden; box-shadow: 0 4px 12px rgba(0,0,0,0.15);'>
                                    
                                    <!-- Header -->
                                    <tr>
                                        <td style='background: linear-gradient(135deg, #0d6efd 0%, #0a58ca 100%); padding:40px 30px; text-align:center;'>
                                            <div style='font-size:60px; margin-bottom:10px;'>⚖️</div>
                                            <h1 style='margin:0; color:#ffffff; font-size:32px; font-weight:700;'>JurisTime</h1>
                                        </td>
                                    </tr>

                                    <!-- Body -->
                                    <tr>
                                        <td style='padding:40px 30px; color:#333333;'>
                                            <h2 style='color:#0d6efd; font-size:24px; margin-top:0; margin-bottom:20px;'>Recuperación de Contraseña</h2>
                                            
                                            <p style='margin:15px 0; font-size:16px; line-height:1.6;'>Hola,</p>
                                            
                                            <p style='margin:15px 0; font-size:16px; line-height:1.6;'>Hemos recibido una solicitud para restablecer la contraseña de tu cuenta en <strong>JurisTime</strong>.</p>
                                            
                                            <p style='margin:15px 0; font-size:16px; line-height:1.6;'>Tu nueva contraseña temporal es:</p>

                                            <!-- Password Box -->
                                            <table width='100%' cellpadding='0' cellspacing='0' style='margin:30px 0;'>
                                                <tr>
                                                    <td style='background-color:#f8f9fa; border-left:4px solid #0d6efd; padding:20px; border-radius:4px; text-align:center;'>
                                                        <p style='margin:0 0 10px 0; color:#666666; font-size:14px; text-transform:uppercase; letter-spacing:1px;'>Contraseña Temporal</p>
                                                        <div style='font-size:28px; font-weight:700; color:#0d6efd; letter-spacing:2px; font-family:Courier New, monospace;'>{$contrasennaGenerada}</div>
                                                    </td>
                                                </tr>
                                            </table>

                                            <!-- Alert Box -->
                                            <table width='100%' cellpadding='0' cellspacing='0' style='margin:20px 0;'>
                                                <tr>
                                                    <td style='background-color:#fff3cd; border-left:4px solid #ffc107; padding:15px; border-radius:4px;'>
                                                        <p style='margin:0; color:#856404; font-size:14px;'><strong>⚠️ Importante:</strong> Por tu seguridad, te recomendamos cambiar esta contraseña temporal una vez que ingreses al sistema.</p>
                                                    </td>
                                                </tr>
                                            </table>

                                            <hr style='border:none; border-top:1px solid #e0e0e0; margin:30px 0;'>

                                            <p style='margin:15px 0; font-size:14px; color:#666666; line-height:1.6;'>Si no solicitaste este cambio, por favor ignora este correo o contacta con nuestro equipo de soporte de inmediato.</p>
                                            
                                            <p style='margin:15px 0; font-size:14px; color:#666666; line-height:1.6;'>Gracias por confiar en <strong>JurisTime</strong>.</p>
                                        </td>
                                    </tr>

                                    <!-- Footer -->
                                    <tr>
                                        <td style='background-color:#212529; padding:30px; text-align:center; color:#adb5bd; font-size:14px;'>
                                            <p style='margin:5px 0;'><strong style='color:#ffffff;'>JurisTime</strong> - Sistema de Gestión Legal</p>
                                            <p style='margin:5px 0;'>📧 soporte@juristime.com | 📞 +506 1234-5678</p>
                                            <p style='margin:20px 0 5px 0; font-size:12px; color:#6c757d;'>© 2024 JurisTime. Todos los derechos reservados.</p>
                                        </td>
                                    </tr>

                                </table>
                            </td>
                        </tr>
                    </table>
                </body>
                </html>
                ";

                EnviarCorreo('Recuperar Acceso - JurisTime', $mensaje, $resultado["correoElectronico"]);

                $_SESSION["MensajeExito"] = "Se ha enviado una nueva contraseña a tu correo electrónico.";
                header("Location: ../../View/Inicio/Login.php");
                exit;
            } else {
                $_POST["Mensaje"] = "No se pudo actualizar la contraseña. Intenta nuevamente.";
            }
        } else {
            $_POST["Mensaje"] = "El correo electrónico no está registrado en el sistema.";
        }
    }

    if(isset($_POST["btnSalir"]))
    {
        session_destroy();
        header("Location: ../../View/Inicio/Login.php");
        exit;
    }
?>