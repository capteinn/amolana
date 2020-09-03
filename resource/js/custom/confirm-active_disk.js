function get_nama_actived(nama_id)
	{
			document.querySelector('#'+nama_id).addEventListener('submit', function(e) {
            var form = this;
            e.preventDefault();
            swal({
                title: "Konfirmasi Aktifkan Account",
                text: "Apakah anda Yakin Ingin Aktifkan Account Ini?",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: '#DD6B55',
                confirmButtonText: 'Ya, Saya Yakin!',
                cancelButtonText: "Tidak, Batalkan!",
                closeOnConfirm: false,
                closeOnCancel: true
            },
            function(isConfirm) {
                if (isConfirm) {
					form.submit();             
                }
				else {
                    swal("Cancelled", "Anda Membatalkan Konfirmasi!", "error");
                }
            });
        });
	}

