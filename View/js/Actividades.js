let fechaSeleccionada = null;

const modalActividad = new bootstrap.Modal(
    document.getElementById('modalActividad')
);
const modalEvento = new bootstrap.Modal(
    document.getElementById('modalEvento')
);
const modalCita = new bootstrap.Modal(
    document.getElementById('modalCita')
);

function abrirModalActividad(fecha) {
    fechaSeleccionada = fecha;
    modalActividad.show();
}

function abrirModalEvento() {
    modalActividad.hide();
    document.getElementById('fechaEventoTexto').innerText = 'Fecha: ' + fechaSeleccionada;
    document.getElementById('fechaEvento').value = fechaSeleccionada;
    modalEvento.show();
}

function abrirModalCita() {
    modalActividad.hide();
    document.getElementById('fechaCita').innerText =
        'Fecha: ' + fechaSeleccionada;
    modalCita.show();
}
