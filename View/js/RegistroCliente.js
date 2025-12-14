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

    $("#formRegistrarCliente").validate({
        rules: {
            nacionalidad: {
                required: true
            },
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
            telefono: {
                required: true
            }
        },
        messages: {
            nacionalidad: {
                required: "Se requiere la nacionalidad para continuar"
            },
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
            telefono: {
                required: "Se requiere el telefono para continuar"
            }
        }
    });

});

function cambiarNacionalidad() {
    const nacionalidad = document.getElementById("nacionalidad");
    const cedula = document.getElementById("cedula");
    const nombre = document.getElementById("nombreCompleto");

    const texto = nacionalidad.options[nacionalidad.selectedIndex].text;

    if (texto === "Nacional") {
        nombre.readOnly = true;
        nombre.value = "";
        cedula.onkeyup = function () {
            ConsultarNombre();
            soloNumeros(this);
        };
    } else {
        nombre.readOnly = false;
        cedula.onkeyup = null;
    }
}

$(function () {

    new DataTable('#tbClientes', {
        language: {
            url: 'https://cdn.datatables.net/plug-ins/2.3.4/i18n/es-ES.json',
        },
        columnDefs: [
            { targets: '_all', className: 'text-start' }
        ]
    });

});