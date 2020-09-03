function get_nama_repas(nama_id){
	document.querySelector('#'+nama_id).addEventListener('submit', function(e) {
            var form = this;
            e.preventDefault();
            swal({
                title: "Confirmation Password Reset",
                text: "Are You Sure To Password Reset This Account?",
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
	