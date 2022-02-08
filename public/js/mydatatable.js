$(document).ready(function() {

    var companyname = "Company Name";
    // Project dataTable
    $('#project').DataTable({
        "lengthMenu": [
            [20, 25, 30, 40, 50, -1],
            [20, 25, 30, 40, 50, "All"]
        ],
        dom: 'lBfrtip',
        buttons: [

            {
                extend: 'copy',
                className: 'btn btn-indigo btn-rounded',
                messageTop: companyname,
                title: companyname,
                exportOptions: {
                    columns: [0, 1]
                }
            },
            {
                extend: 'csv',
                className: 'btn btn-indigo',
                messageTop: companyname,
                title: companyname,
                exportOptions: {
                    columns: [0, 1]
                }
            },
            {
                extend: 'excel',
                className: 'btn btn-indigo',
                messageTop: companyname,
                title: companyname,
                exportOptions: {
                    columns: [0, 1]

                }
            },
            {
                extend: 'pdf',
                className: 'btn btn-indigo',
                messageTop: companyname,
                title: companyname,
                exportOptions: {
                    columns: [0, 1]

                }
            },
            {
                extend: 'print',
                className: 'btn btn-indigo btn-rounded',
                messageTop: companyname,
                title: companyname,
                exportOptions: {
                    columns: [0, 1]

                }
            },

        ],



    });
    // Project dataTable



    // Task dataTable
    $('#task').DataTable({
        "lengthMenu": [
            [20, 25, 30, 40, 50, -1],
            [20, 25, 30, 40, 50, "All"]
        ],
        dom: 'lBfrtip',
        buttons: [

            {
                extend: 'copy',
                className: 'btn btn-indigo btn-rounded',
                messageTop: companyname,
                title: companyname,
                exportOptions: {
                    columns: [0, 1]
                }
            },
            {
                extend: 'csv',
                className: 'btn btn-indigo',
                messageTop: companyname,
                title: companyname,
                exportOptions: {
                    columns: [0, 1]
                }
            },
            {
                extend: 'excel',
                className: 'btn btn-indigo',
                messageTop: companyname,
                title: companyname,
                exportOptions: {
                    columns: [0, 1]

                }
            },
            {
                extend: 'pdf',
                className: 'btn btn-indigo',
                messageTop: companyname,
                title: companyname,
                exportOptions: {
                    columns: [0, 1]

                }
            },
            {
                extend: 'print',
                className: 'btn btn-indigo btn-rounded',
                messageTop: companyname,
                title: companyname,
                exportOptions: {
                    columns: [0, 1]

                }
            },

        ],



    });
    // Task dataTable


    // Addlist dataTable
    $('#addlist').DataTable({
        "lengthMenu": [
            [20, 25, 30, 40, 50, -1],
            [20, 25, 30, 40, 50, "All"]
        ],
        dom: 'lBfrtip',
        buttons: [

            {
                extend: 'copy',
                className: 'btn btn-indigo btn-rounded',
                messageTop: companyname,
                title: companyname,
                exportOptions: {
                    columns: [0, 2]
                }
            },
            {
                extend: 'csv',
                className: 'btn btn-indigo',
                messageTop: companyname,
                title: companyname,
                exportOptions: {
                    columns: [0, 2]
                }
            },
            {
                extend: 'excel',
                className: 'btn btn-indigo',
                messageTop: companyname,
                title: companyname,
                exportOptions: {
                    columns: [0, 2]

                }
            },
            {
                extend: 'pdf',
                className: 'btn btn-indigo',
                messageTop: companyname,
                title: companyname,
                exportOptions: {
                    columns: [0, 2]

                }
            },
            {
                extend: 'print',
                className: 'btn btn-indigo btn-rounded',
                messageTop: companyname,
                title: companyname,
                exportOptions: {
                    columns: [0, 2]

                }
            },

        ],



    });
    // Addlist dataTable


    // Task dataTable
    $('#tasklistshow').DataTable({
        "lengthMenu": [
            [20, 25, 30, 40, 50, -1],
            [20, 25, 30, 40, 50, "All"]
        ],
        dom: 'lBfrtip',
        buttons: [

            {
                extend: 'copy',
                className: 'btn btn-indigo btn-rounded',
                messageTop: companyname,
                title: companyname,
                exportOptions: {
                    columns: [0, 1]
                }
            },
            {
                extend: 'csv',
                className: 'btn btn-indigo',
                messageTop: companyname,
                title: companyname,
                exportOptions: {
                    columns: [0, 1]
                }
            },
            {
                extend: 'excel',
                className: 'btn btn-indigo',
                messageTop: companyname,
                title: companyname,
                exportOptions: {
                    columns: [0, 1]

                }
            },
            {
                extend: 'pdf',
                className: 'btn btn-indigo',
                messageTop: companyname,
                title: companyname,
                exportOptions: {
                    columns: [0, 1]

                }
            },
            {
                extend: 'print',
                className: 'btn btn-indigo btn-rounded',
                messageTop: companyname,
                title: companyname,
                exportOptions: {
                    columns: [0, 1]

                }
            },

        ],



    });
    // Task dataTable

});