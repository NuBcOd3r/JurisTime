$(function () {

    new DataTable('#tbMaterias', {
        pageLength: 5,
        language: {
            url: 'https://cdn.datatables.net/plug-ins/2.3.4/i18n/es-ES.json',
        },
        columnDefs: [
            { targets: '_all', className: 'text-start' }
        ]
    });

});

document.getElementById('modalEditarMateria')
  .addEventListener('show.bs.modal', event => {

    const boton = event.relatedTarget;

    document.getElementById('idMateriaEditar').value =
        boton.getAttribute('data-id');

    document.getElementById('nombreMateriaEditar').value =
        boton.getAttribute('data-nombre');
});

$(function () {

    $("#formMateria").validate({
        rules: {
            nombreMateria: {
                required: true
            }
        },
        messages: {
            nombreMateria: {
                required: "Se requiere el nombre para continuar"
            }
        }
    });

});

$(function () {

    $("#formEditarMateria").validate({
        rules: {
            nombreMateriaEditar: {
                required: true
            }
        },
        messages: {
            nombreMateriaEditar: {
                required: "Se requiere el nombre para continuar"
            }
        }
    });

});