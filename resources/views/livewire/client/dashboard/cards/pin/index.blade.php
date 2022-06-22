<div class="container-fluid my-3 py-3">
    <div class="row mb-5">
        <!--Begin::Card Status-->
        @include('livewire.client.dashboard.cards.partials.card-status')
        <!--Begin::Card Status-->
    </div>
    <div class="row mb-5">
        <!--Begin::Sidebar-->
        @include('livewire.client.dashboard.cards.partials.tab-menu')
        <!--Begin::Sidebar-->
        <div class="col-lg-9 mt-lg-0">
            <!--Begin::Alerts-->
            @include('errors.alerts')
            <!--End::Alerts-->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                            <div class="bg-primary shadow-primary border-radius-lg pt-4 pb-3">
                                <h6 class="text-white text-capitalize ps-3">
                                    Pin Code
                                </h6>
                            </div>
                        </div>
                        <div class="card-body px-0 pb-2">
                            <div class="container">
                                <div class="col-md-12 p-0">
                                    @if ($card->pin)
                                        <a class="btn btn-link text-dark px-1 mb-0" href="#"
                                            data-bs-toggle="modal" data-bs-target="#RemovePinModal">
                                            <i class="fas fa-lock-open text-sm me-2">
                                            </i>
                                            Remove Pin

                                        </a>
                                        <a class="btn btn-link text-dark px-1 mb-0" href="#"
                                            data-bs-toggle="modal" data-bs-target="#ChangePinModal">
                                            <i class="fas fa-key text-sm me-2">
                                            </i>
                                            Change Pin
                                        </a>
                                        <a class="btn btn-link text-dark px-1 mb-0" href="#"
                                            data-bs-toggle="modal" data-bs-target="#ForgotPinModal">
                                            <i class="fas fa-lock text-sm me-2">
                                            </i>
                                            Forgot Pin
                                        </a>
                                    @else
                                        <a class="btn btn-link text-dark px-1 mb-0" href="#"
                                            data-bs-toggle="modal" data-bs-target="#AddPinModal">
                                            <i class="fas fa-edit text-sm me-2">
                                            </i>
                                            Add Pin
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--Begin::Add Pin Modal-->
    @include('livewire.client.dashboard.cards.pin.partials.add-pin-modal')
    <!--End::Add Pin Modal-->

    <!--Begin::Remove Pin Modal-->
    @include('livewire.client.dashboard.cards.pin.partials.remove-pin-modal')
    <!--End::Remove Pin Modal-->

    <!--Begin::Change Pin Modal-->
    @include('livewire.client.dashboard.cards.pin.partials.change-pin-modal')
    <!--End::Change Pin Modal-->

    <!--Begin::Forgot Pin Modal-->
    @include('livewire.client.dashboard.cards.pin.partials.forgot-pin-modal')
    <!--End::Forgot Pin Modal-->

</div>
