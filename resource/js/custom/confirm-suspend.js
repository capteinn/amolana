function get_nama_suspend(nama_id)
	{
			document.querySelector('#'+nama_id).addEventListener('submit', function(e) {
            var form = this;
            e.preventDefault();
            swal({
                title: "Konfirmasi NonAtifkan Akun",
                text: "Apakah anda Yakin Ingin meNonAktifkan Data Ini?",
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

