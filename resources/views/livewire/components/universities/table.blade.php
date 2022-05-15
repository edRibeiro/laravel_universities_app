<div class="card my-4">
    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
        <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
            <div class="d-flex flex-row align-items-center justify-content-between">
                <h6 class="text-white mx-3"><strong> Universities</strong>
                </h6>
                <div class="input-group input-group-alternative mb-3 w-30 ">
                    <input wire:model="search" type="search" class="form-control form-control-alternative bg-white"
                        placeholder="Search" aria-label="University's name">
                    {{-- <button class="btn btn-outline-white  mb-0" type="button" id="button-addon2">Button</button> --}}
                </div>
                <div class="me-3 my-3 text-end">
                    <a class="btn btn-outline-light mb-0" href="{{ route('universities.create') }}"><i
                            class="material-icons text-sm">add</i>&nbsp;&nbsp;Suggest
                            University</a>
                </div>
            </div>
            <div class="ms-md-auto pe-md-3 d-flex align-items-center">
            </div>
        </div>
        <div class="card-body px-0 pb-2">
            <div class="table-responsive p-0 pb-2">
                <table class="table align-items-center mb-0">
                    <thead>
                        <tr>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                NAME</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                SITE</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                DOMAIN</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                COUNTRY</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                COUNTRY CODE
                            </th>
                            <th class="text-secondary opacity-7"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($universities as $university)
                            <tr>
                                <td>
                                    <div class="d-flex flex-column justify-content-center">
                                        <h6 class="mb-0 text-sm">{{ $university->name }}</h6>
                                        @if ($university->status === 'PENDING')
                                            <p class="text-xs text-secondary mb-0">{{ $university->status }}</p>
                                        @endif
                                    </div>
                                </td>
                                <td class="align-middle text-center text-sm">
                                    <p class="text-xs text-secondary mb-0">{{ $university->web_pages }}
                                    </p>
                                </td>
                                <td class="align-middle text-center text-sm">
                                    <p class="text-xs text-secondary mb-0">{{ $university->domains }}
                                    </p>
                                </td>
                                <td class="align-middle text-center">
                                    <span
                                        class="text-secondary text-xs font-weight-bold">{{ $university->country }}</span>
                                </td>
                                <td class="align-middle text-center">
                                    <span
                                        class="text-secondary text-xs font-weight-bold">{{ $university->alpha_two_code }}</span>
                                </td>
                                <td class="align-middle">
                                    <a rel="tooltip" class="btn btn-success btn-link @if ($university->status === 'PENDING') disabled @endif" wire:click="subiscribe({{ $university->id }})" data-original-title=""
                                        title="">
                                        <i class="material-icons">edit</i>
                                        <div class="ripple-container">subiscribe</div>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
        <div class="card-footer">
            {{ $universities->links() }}
        </div>
    </div>
</div>
