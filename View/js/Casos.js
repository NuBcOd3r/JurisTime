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