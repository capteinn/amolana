$(document).ready(function(){
	var nama_dokumen = $('#nama-dokumen').val();
            $('.dataTables-dashboard').DataTable({
                "bDeferRender": true,
				"order": [],
                dom: '<"html5buttons"B>lTfgitp',
                buttons: [
                    /* {extend: 'copy'},
                    {extend: 'csv', title: nama_dokumen},
                    {extend: 'excel', title: nama_dokumen},
                    {extend: 'pdf', title: nama_dokumen},

                    {extend: 'print',
                     customize: function (win){
                            $(win.document.body).addClass('white-bg');
                            $(win.document.body).css('font-size', '10px');

                            $(win.document.body).find('table')
                                    .addClass('compact')
                                    .css('font-size', 'inherit');
                    }
                    } */
                ]

            });
        });