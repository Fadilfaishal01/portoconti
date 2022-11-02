<script src="{{ asset('assets/plugins/jquery/dist/jquery.min.js') }}"></script>
<script src="{{ asset('assets/plugins/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/js/app-style-switcher.js') }}"></script>
<script src="{{ asset('assets/js/waves.js') }}"></script>
<script src="{{ asset('assets/js/sidebarmenu.js') }}"></script>
<script src="{{ asset('assets/js/custom.js') }}"></script>

{{-- Select2 --}}
<script src="{{ asset('assets/js/plugins/select2/select2.full.min.js') }}"></script>

{{-- Swal --}}
<script src="{{ asset('assets/js/plugins/swal/sweetalert2.all.min.js') }}"></script>

{{-- DataTable --}}
<script src="{{ asset('assets/js/plugins/datatable/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins/datatable/dataTables.bootstrap.min.js') }}"></script>

{{-- Fontawesome --}}
<script src="{{ asset('assets/js/all.min.js') }}"></script>
<script>
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timerProgressBar: true,
        timer: 3000,
        didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
    });
</script>