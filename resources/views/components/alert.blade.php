<script>
    $(document).ready(function() {
        toastr.{{ Session::get('type') }}('{{ Session::get('alert') }}');
    });

    {{ //       Session::forget('alert'),
        //     Session::forget('type');
        Session::flush() }}
</script>
