@if (session('status'))
    <div class="alert alert-success alert-dismissible text-center" id="success-alert">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>{{ session('status') }}</strong>.
    </div>
@endif
@push('scripts')
    <script>
        $(document).ready (function(){
            window.setTimeout(function () {
                $("#success-alert").alert('close'); }, 3000);
        });
    </script>
@endpush
