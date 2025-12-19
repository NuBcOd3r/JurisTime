let calendar;

document.addEventListener('DOMContentLoaded', function () {
    const calendarEl = document.getElementById('calendar');

    const calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',
        locale: 'es',

        headerToolbar: {
            left: 'prev,next today',
            center: 'title',
            right: 'dayGridMonth,timeGridWeek,timeGridDay'
        },

        buttonText: {
            today: 'Hoy',
            month: 'Mes',
            week: 'Semana',
            day: 'Día'
        },

        slotLabelFormat: {
            hour: 'numeric',
            minute: '2-digit',
            hour12: true
        },

        eventTimeFormat: {
            hour: 'numeric',
            minute: '2-digit',
            hour12: true
        },

        events: '../../Controller/CalendarioController.php',
        
        dateClick: function (info) {
            document.getElementById('fechaEvento').innerText = info.dateStr;
            document.getElementById('fechaEventoInput').value = info.dateStr;

            const modal = new bootstrap.Modal(
                document.getElementById('modalEvento')
            );
            modal.show();
        },

        eventClick: function (info) {
            info.jsEvent.preventDefault();

            document.getElementById('modalTitulo').innerText = info.event.title;

            const fecha = info.event.start.toLocaleDateString('es-CR', {
                year: 'numeric',
                month: 'long',
                day: 'numeric'
            });

            const hora = info.event.start.toLocaleTimeString('es-CR', {
                hour: 'numeric',
                minute: '2-digit',
                hour12: true
            });

            document.getElementById('modalFecha').innerText = fecha;
            document.getElementById('modalHora').innerText = hora;

            const modal = new bootstrap.Modal(
                document.getElementById('modalDetalleEvento')
            );
            modal.show();
        }
    });

    calendar.render();
});

document.getElementById('toggleSidebar').addEventListener('click', function () {
    document.body.classList.toggle('sidebar-collapsed');

    setTimeout(() => {
        if (calendar) {
            calendar.updateSize();
        }
    }, 350);
});
