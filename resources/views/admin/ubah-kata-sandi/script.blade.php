<script type="text/javascript">
    $('#formUbahKataSandi').submit(function(e) {
        $('#passwordBaru').removeClass('is-invalid');
        $('#konfirmasiPasswordBaru').removeClass('is-invalid');
        $('.messageErrorValidasiKataSandi').html('');
        $('.messageErrorValidasiKonfirmasiKataSandi').html('');
        e.preventDefault();

        let formData = new FormData(this);

        $.ajax({
            type: "POST",
            url : "{{ route('ubah-kata-sandi.updateKataSandi') }}",
            data: formData,
            contentType: false,
            processData: false,
            beforeSend: function(data) {
                Toast.fire({
                    title: `Memuat Data...`,
                    icon: 'info',
                    showConfirmButton: false,
                });
            },
            success: function(data) {
                Swal.close();
                Toast.fire({
                    title: `${data.title}`,
                    icon: `${data.status}`,
                    html: `${data.message}`,
                    timer: `${data.timer}`,
                    showConfirmButton: false,
                });
                $('.form-control').val('');
            },
            error: function(data) {
                Swal.close();
                $.each(data.responseJSON.errorValidasi, function(kData, vData) {
                    if (kData == 'konfirmasiPasswordBaru') {
                        $('#konfirmasiPasswordBaru').addClass('is-invalid');
                        $('.messageErrorValidasiKonfirmasiKataSandi').html(`
                            <span class="text-danger">${vData[0]}</span>
                        `);
                    }

                    if (kData == 'passwordBaru') {
                        $('#passwordBaru').addClass('is-invalid');
                        $('.messageErrorValidasiKataSandi').html(`
                            <span class="text-danger">${vData[0]}</span>
                        `);
                    }
                })
                Toast.fire({
                    title: `${data.responseJSON.title}`,
                    icon: `${data.responseJSON.status}`,
                    html: `${data.responseJSON.message}`,
                    timer: `${data.responseJSON.timer}`,
                    showConfirmButton: false,
                });
            }
        })
    })
</script>