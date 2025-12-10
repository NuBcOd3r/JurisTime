$(function () {

    $("#formRecuperar").validate({
        rules: {
            correoElectronico: {
                required: true,
                email: true
            },
            confirmarCorreoElectronico: {
                required: true,
                email: true,
                equalTo: "#correoElectronico"
            }
        },
        messages: {
            correoElectronico: {
                required: "Se requiere el correo electrónico para continuar",
                email: "Ingrese un correo válido"
            },
            confirmarCorreoElectronico: {
                required: "Se requiere el correo electrónico para continuar",
                email: "Ingrese un correo válido",
                equalTo: "Los correos no coinciden"
            }
        }
    });

});
