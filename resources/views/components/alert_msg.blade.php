@if (session('success'))
    <div class="alert alert-success bg-light">
        {{ session('success') }}
    </div>
@endif

@if (session('error'))
    <div class="alert alert-danger bg-light">
        {{ session('error') }}
    </div>
@endif

@if (session('warning'))
    <div class="alert alert-warning bg-light">
        {{ session('error') }}
    </div>
@endif
