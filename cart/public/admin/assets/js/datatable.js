$(function(e) {
    'use strict';

    // DATATABLE 1
    $('#datatable1').DataTable({
        responsive: true,
        language: {
            searchPlaceholder: 'Search...',
            sSearch: '',
            lengthMenu: '_MENU_ items/page',
            "url": "https://cdn.datatables.net/plug-ins/1.12.0/i18n/ar.json"
        }
    });

    // DATATABLE 2
    $('#datatable2').DataTable({
        bLengthChange: false,
        searching: false,
        responsive: true,
        "url": "https://cdn.datatables.net/plug-ins/1.12.0/i18n/ar.json"
    });

    // SELECT2
    $('.dataTables_length select').select2({
        minimumResultsForSearch: Infinity
    });
});