    <div class="">
        <!-- Navbar -->
        <!-- End Navbar -->
        <div class="container-fluid px-2 px-md-4 mt-6">
            <div class="card card-body mx-3 mx-md-4 mt-n6">
                <div class="row">
                    <div class="row">

                        <div class="col-12 col-xl-4">
                            <div class="card card-plain h-100">
                                <div class="card-header pb-0 p-3">
                                    <div class="row">
                                        <div class="col-md-8 d-flex align-items-center">
                                            <h6 class="mb-0">Profile Information</h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body p-3">

                                    <ul class="list-group">
                                        <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong
                                                class="text-dark">Name:</strong> &nbsp; {{ $user->name }}</li>

                                        <li class="list-group-item border-0 ps-0 text-sm"><strong
                                                class="text-dark">Email:</strong> &nbsp; {{ $user->email }}</li>

                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-xl-4">
                            <div class="card card-plain h-100">
                                <div class="card-header pb-0 p-3">
                                    <h6 class="mb-0">My Subscriptions</h6>
                                </div>
                                <div class="card-body p-3">

                                    <ul class="list-group">
                                        @forelse ($universities as $university)
                                            <li
                                                class="list-group-item border-0 d-flex align-items-center px-0 mb-2 pt-0">

                                                <div
                                                    class="d-flex align-items-start flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm">{{ $university->name }}</h6>
                                                    <p class="mb-0 text-xs">Domain: {{ $university->domains }} |
                                                        Site:
                                                        {{ $university->web_pages }} | Country:
                                                        {{ $university->country }} -
                                                        {{ $university->alpha_two_code }}
                                                    </p>
                                                </div>
                                                <a class="btn btn-link pe-3 ps-0 mb-0 ms-auto w-25 w-md-auto @if ($university->status === 'PENDING') disabled @endif"
                                                   wire:click="unsubscribe({{$university->id}})" href="javascript:;">Unsubscribe</a>
                                            </li>
                                        @empty
                                            <li
                                                class="list-group-item border-0 d-flex align-items-center px-0 mb-2 pt-0">
                                                <div
                                                    class="d-flex align-items-start flex-column justify-content-center">
                                                    <p class="mb-0 text-xs">No universities were found.</p>
                                                </div>
                                            </li>
                                        @endforelse
                                    </ul>
                                </div>
                                <div class="card-footer">
                                    {{ $universities->links() }}
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-xl-4">
                            <div class="card card-plain h-100">
                                <div class="card-header pb-0 p-3">
                                    <h6 class="mb-0">My Suggestions</h6>
                                </div>
                                <div class="card-body p-3">
                                    <ul class="list-group">
                                        @forelse ($suggesteds as $suggested)
                                            <li
                                                class="list-group-item border-0 d-flex align-items-center px-0 mb-2 pt-0">

                                                <div
                                                    class="d-flex align-items-start flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm">{{ $suggested->name }}</h6>
                                                    <p class="mb-0 text-xs">Domain: {{ $suggested->domains }} |
                                                        Site:
                                                        {{ $suggested->web_pages }} | Country:
                                                        {{ $suggested->country }} -
                                                        {{ $suggested->alpha_two_code }}
                                                    </p>
                                                </div>

                                                <a class="btn btn-link pe-3 ps-0 mb-0 ms-auto w-25 w-md-auto"><span
                                                        @class([
                                                            'badge',
                                                            'badge-sm',
                                                            'bg-gradient-success' => $suggested->status === 'APPROVED',
                                                            'bg-gradient-danger' => $suggested->status === 'REJECTED',
                                                            'bg-gradient-secondary' => $suggested->status === 'PENDING',
                                                        ])
                                                        class="badge badge-sm bg-gradient-success">{{ $suggested->status }}</span></a>
                                            </li>
                                        @empty
                                            <li
                                                class="list-group-item border-0 d-flex align-items-center px-0 mb-2 pt-0">
                                                <div
                                                    class="d-flex align-items-start flex-column justify-content-center">
                                                    <p class="mb-0 text-xs">No universities were found.</p>
                                                </div>
                                            </li>
                                        @endforelse
                                    </ul>
                                </div>
                                <div class="card-footer">
                                    {{ $suggesteds->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
