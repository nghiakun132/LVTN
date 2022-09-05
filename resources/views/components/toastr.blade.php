<script>
    @if (Session::has('error'))
        toastr.error("{{ Session::get('error') }}");
        setTimeout(() => {
            {{ Session::forget('error') }}
        }, 3000);
    @endif

    @if (Session::has('success'))
        toastr.options = {
            "closeButton": true,
            "progressBar": true,
            "positionClass": "toast-top-left",
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        }
        toastr.success("{{ Session::get('success') }}");

        setTimeout(() => {
            {{ Session::forget('success') }}
        }, 3000);
    @endif
</script>
