<div>

    <div class="container-fluid py-4">
        @if (session()->has('status'))
            <div class="row">
                <div class="alert alert-success alert-dismissible text-white" role="alert">
                    <span class="text-sm">{{ Session::get('status') }}</span>
                    <button type="button" class="btn-close text-lg py-3 opacity-10" data-bs-dismiss="alert"
                        aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        @endif
        <div class="row">
            <div class="col-12">
                @livewire('components.universities.table')
            </div>
        </div>
    </div>
</div>
