function ConsultarNombre()
{
    let cedula = document.getElementById("cedula").value;
    document.getElementById("nombreCompleto").value = "";

    if(cedula.length >= 9)
    {
        $.ajax({
            type: 'GET',
            url: 'https://apis.gometa.org/cedulas/' + cedula,
            dataType: 'json',
            success: function(data){
                if(data.resultcount > 0)
                {
                    document.getElementById("nombreCompleto").value = data.nombre;
                }
            }
        });
    }    
}

function soloNumeros(input) {
    let inicio = "";
    
    for (let i = 0; i < input.value.length; i++) {
        let code = input.value.charCodeAt(i); 
        
        if ((code >= 48 && code <= 57) || code === 46 || code < 32) {
            inicio += input.value[i];
        }
    }
    
    input.value = inicio; 
}

$(function () {

    $("#formSignin").validate({
        rules: {
            cedula: {
                required: true
            },
            nombreCompleto: {
                required: true
            },
            correoElectronico: {
                required: true,
                email: true
            },
            contrasenna: {
                required: true
            },
            confirmarContrasenna: {
                required: true,
                equalTo: "#contrasenna"
            }
        },
        messages: {
            cedula: {
                required: "Se requiere la cédula para continuar"
            },
            nombreCompleto: {
                required: "Se requiere el nombre completo para continuar"
            },
            correoElectronico: {
                required: "Se requiere el correo electrónico para continuar",
                email: "Ingrese un correo válido"
            },
            contrasenna: {
                required: "Se requiere la contraseña para continuar"
            },
            confirmarContrasenna: {
                required: "Se requiere confirmar la contraseña para continuar",
                equalTo: "Las contraseñas no coinciden"
            }
        }
    });

});
