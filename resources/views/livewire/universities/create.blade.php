<div class="container-fluid px-2 px-md-4 mt-6">

    <div class="card card-body mx-3 mx-md-4 mt-n6">

        <div class="card card-plain h-100">
            <div class="card-header pb-0 p-3">
                <div class="row">
                    <div class="col-md-8 d-flex align-items-center">
                        <h6 class="mb-3">University Information</h6>
                    </div>
                </div>
            </div>
            <div class="card-body p-3">
                <form wire:submit.prevent='save'>
                    <div class="row">

                        <div class="mb-3 col-md-6">

                            <label class="form-label">NAME</label>
                            <input wire:model.lazy="university.name" type="text" class="form-control border border-2 p-2">
                            @error('university.name')
                            <p class='text-danger inputerror'>{{ $message }} </p>
                            @enderror
                        </div>

                        <div class="mb-3 col-md-6">

                            <label class="form-label">DOMAIN</label>
                            <input wire:model.lazy="university.domains" type="text" class="form-control border border-2 p-2">
                            @error('university.domains')
                            <p class='text-danger inputerror'>{{ $message }} </p>
                            @enderror
                        </div>

                        <div class="mb-3 col-md-6">

                            <label class="form-label">SITE</label>
                            <input wire:model.lazy="university.web_pages" type="text" class="form-control border border-2 p-2">
                            @error('university.web_pages')
                            <p class='text-danger inputerror'>{{ $message }} </p>
                            @enderror
                        </div>

                        <div class="mb-3 col-md-6">

                            <label class="form-label">COUNTRY</label>
                            <input wire:model.lazy="university.country" type="text" class="form-control border border-2 p-2">
                            @error('university.country')
                            <p class='text-danger inputerror'>{{ $message }} </p>
                            @enderror
                        </div>

                        <div class="mb-3 col-md-6">
                            <label class="form-label">COUNTRY CODE</label>
                            <input wire:model.lazy="university.alpha_two_code" type="text" class="form-control border border-2 p-2">
                            @error('university.alpha_two_code')
                            <p class='text-danger inputerror'>{{ $message }} </p>
                            @enderror
                        </div>
                    </div>
                    <button type="submit" class="btn bg-gradient-dark">Submit</button>
                </form>

            </div>
        </div>


    </div>

</div>
