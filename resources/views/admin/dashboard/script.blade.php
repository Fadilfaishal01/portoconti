<script type="text/javascript">
    @if(Session::has('successLogin'))
        Toast.fire({
            title: `Berhasil`,
            icon: `success`,
            html: `{{ session('successLogin') }}`,
            timer: `3500`,
            showConfirmButton: false,
        });
    @endif
</script>