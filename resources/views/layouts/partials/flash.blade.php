<div class="container">
@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if (session('error'))
    <div class="alert alert-danger alert-message d-flex rounded p-0" role="alert">
        <div class="alert-icon d-flex justify-content-center align-items-center flex-grow-0 flex-shrink-0 py-3">
            <i class="fa fa-ban"></i>
        </div>
        <div class="d-flex align-items-center py-2 px-3">
            {{ session('error') }}
        </div>
    </div>

@endif

@if (session('info'))
    <div class="alert alert-info">
        {{ session('info') }}
    </div>
@endif
</div>
<style>
    .alert-message .alert-icon {
        width: 3rem;
    }
    .alert-message .close{
        font-size: 1rem;
        color: #a6a6a6;
    }
    .alert-primary .alert-icon {
        background-color: #b8daff;
    }
    .alert-secondary .alert-icon {
        background-color: #d6d8db;
    }
    .alert-success .alert-icon {
        background-color: #c3e6cb;
    }
    .alert-danger .alert-icon {
        background-color: #f5c6cb;
    }
    .alert-warning .alert-icon {
        background-color: #ffeeba;
    }
    .alert-info .alert-icon {
        background-color: #bee5eb;
    }
    .alert-light .alert-icon {
        background-color: #fdfdfe;
    }
    .alert-dark .alert-icon {
        background-color: #c6c8ca;
    }

</style>