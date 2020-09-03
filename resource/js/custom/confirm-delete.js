function get_nama_delete(nama_id){
	document.querySelector('#'+nama_id).addEventListener('submit', function(e) {
            var form = this;
            e.preventDefault();
            swal({
                title: "Confirmation Delete",
                text: "Are You Sure To Delete This Account?",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: '#DD6B55',
                confirmButtonText: 'Yes, Sure!',
                cancelButtonText: "No, Cancel!",
                closeOnConfirm: false,
                closeOnCancel: true
            },
            function(isConfirm) {
                if (isConfirm) {
					form.submit();
                }
				else {
                    swal("Cancelled", "You Cancel Confirmation!", "error");
                }
            });
        });
}
	