$(function () {

    $("#formLogin").validate({
        rules: {
            correoElectronico: {
                required: true,
                email: true
            },
            contrasenna: {
                required: true
            }
        },
        messages: {
            correoElectronico: {
                required: "Se requiere el correo electrónico para continuar",
                email: "Ingrese un correo válido"
            },
            contrasenna: {
                required: "Se requiere la contraseña para continuar"
            }
        }
    });

});