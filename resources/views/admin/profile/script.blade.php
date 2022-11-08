<script type="text/javascript">
    $('#formUbahProfile').submit(function(e) {
        e.preventDefault();

        let formData = new FormData(this);

        $.ajax({
            type: 'POST',
            url : "{{ route('profile.updateProfile') }}",
            contentType: false,
            processData: false,
            data: formData,
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
            },
            error: function(data) {
                Swal.close();
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