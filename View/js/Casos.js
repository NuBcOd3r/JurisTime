$(function () {

    new DataTable('#tbCasos', {
        language: {
            url: 'https://cdn.datatables.net/plug-ins/2.3.4/i18n/es-ES.json',
        },
        columnDefs: [
            { targets: '_all', className: 'text-start' }
        ]
    });

});

$(function () {

    new DataTable('#tbCantones', {
        pageLength: 5,
        language: {
            url: 'https://cdn.datatables.net/plug-ins/2.3.4/i18n/es-ES.json',
        },
        columnDefs: [
            { targets: '_all', className: 'text-start' }
        ]
    });

});

function cambiarTipoCliente() {
    const tipoCliente = document.getElementById("tipoCliente");
    const parteActora = document.getElementById("parteActora");
    const parteDemandante = document.getElementById("parteDemandante");
    const btnActora = document.getElementById("btnActora");
    const btnDemandante = document.getElementById("btnDemandante");

    const texto = tipoCliente.options[tipoCliente.selectedIndex].text;

    if (texto === "Parte Actora") {
        parteActora.readOnly = true;
        parteActora.value = "";
        btnActora.disabled = false;
        btnDemandante.disabled = true;
        parteDemandante.readOnly = false;
    } 
    else if (texto === "Parte Demandada") {
        parteDemandante.readOnly = true;
        parteDemandante.value = "";
        btnDemandante.disabled = false;
        parteActora.readOnly = false;
        btnActora.disabled = true;
    }
}

$(function () {

    $("#formRegistrarCaso").validate({
        rules: {
            numeroExpediente: {
                required: true
            },
            tipoCliente: {
                required: true
            },
            parteActora: {
                required: true
            },
            parteDemandante: {
                required: true
            },
            materia: {
                required: true
            },
            tipoCaso: {
                required: true
            },
            circuito: {
                required: true
            },
            ubicacionExpediente: {
                required: true
            },
            estado: {
                required: true
            }
        },
        messages: {
            numeroExpediente: {
                required: "El número de expediente es obligatorio."
            },
            tipoCliente: {
                required: "Debe seleccionar el tipo de cliente."
            },
            parteActora: {
                required: "La parte actora es obligatoria."
            },
            parteDemandante: {
                required: "La parte demandante es obligatoria."
            },
            materia: {
                required: "Debe seleccionar la materia del caso."
            },
            tipoCaso: {
                required: "El tipo de caso es obligatorio."
            },
            circuito: {
                required: "Debe seleccionar el circuito."
            },
            ubicacionExpediente: {
                required: "La ubicación del expediente es obligatoria."
            },
            estado: {
                required: "Debe seleccionar el estado del caso."
            }
        }
    });

});

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

let tipoParte = "";  
let clienteSeleccionado = null;

document.addEventListener("DOMContentLoaded", () => {
    document.querySelectorAll(".btn-cliente").forEach(btn => {
        btn.addEventListener("click", function () {
            tipoParte = this.dataset.tipo;
            clienteSeleccionado = null;
            document.getElementById("cedulaBuscar").value = "";
            document.getElementById("resultadoCliente").innerText = "";
        });
    });
});


function buscarCedula() {
    let cedula = document.getElementById("cedulaBuscar").value;

    if (cedula === "") {
        alert("Ingrese una cédula");
        return;
    }

    fetch("/JurisTime/Controller/CasosController.php", {
        method: "POST",
        headers: { "Content-Type": "application/x-www-form-urlencoded" },
        body: "cedula=" + cedula
    })
    .then(r => r.json())
    .then(data => {
        if (data.ok) {
            clienteSeleccionado = data;
            document.getElementById("resultadoCliente").innerText = data.nombre;
        } else {
            clienteSeleccionado = null;
            document.getElementById("resultadoCliente").innerText = "No encontrado";
        }
    });
}

function seleccionarCliente() {

    if (!clienteSeleccionado) {
        alert("Primero busque un cliente");
        return;
    }

    let nombre = clienteSeleccionado.nombre;
    let cedula = document.getElementById("cedulaBuscar").value;

    if (tipoParte === "ACTORA") {
        document.getElementById("parteActora").value = nombre;
        document.getElementById("cedulaActora").value = cedula;
    }

    if (tipoParte === "DEMANDANTE") {
        document.getElementById("parteDemandante").value = nombre;
        document.getElementById("cedulaDemandada").value = cedula;
    }

    bootstrap.Modal.getInstance(
        document.getElementById("ModalCliente")
    ).hide();
}

$(function () {

    $("#formActualizarCaso").validate({
        rules: {
            numeroExpediente: {
                required: true
            },
            tipoCliente: {
                required: true
            },
            parteActora: {
                required: true
            },
            parteDemandante: {
                required: true
            },
            materia: {
                required: true
            },
            tipoCaso: {
                required: true
            },
            circuito: {
                required: true
            },
            ubicacionExpediente: {
                required: true
            },
            estado: {
                required: true
            }
        },
        messages: {
            numeroExpediente: {
                required: "El número de expediente es obligatorio."
            },
            tipoCliente: {
                required: "Debe seleccionar el tipo de cliente."
            },
            parteActora: {
                required: "La parte actora es obligatoria."
            },
            parteDemandante: {
                required: "La parte demandante es obligatoria."
            },
            materia: {
                required: "Debe seleccionar la materia del caso."
            },
            tipoCaso: {
                required: "El tipo de caso es obligatorio."
            },
            circuito: {
                required: "Debe seleccionar el circuito."
            },
            ubicacionExpediente: {
                required: "La ubicación del expediente es obligatoria."
            },
            estado: {
                required: "Debe seleccionar el estado del caso."
            }
        }
    });

});