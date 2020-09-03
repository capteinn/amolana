function get_file_delete(){
    swal({
        title: "Confirmation Delete",
        text: "Are You Sure To Delete This File?",
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
                swal("Success", "You Confirmation!", "success");
            }
			else{
                swal("Cancelled", "You Cancel Confirmation!", "error");
            }
    });
}
	