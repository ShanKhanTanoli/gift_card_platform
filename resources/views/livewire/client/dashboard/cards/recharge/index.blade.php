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
                                    Recharge Card
                                </h6>
                            </div>
                        </div>
                        <div class="card-body px-0 pb-2">
                            <div class="container-fluid mb-3">
                                <div class="row">
                                    <!--Begin::Select Stripe-->
                                    <div class="col-xl-4 col-sm-12 mb-xl-0 mb-5 mt-3">
                                        <div class="card">
                                            <div class="card-header p-3 pt-2">
                                                <div
                                                    class="icon icon-lg icon-shape bg-gradient-dark shadow-dark text-center border-radius-xl mt-n4 position-absolute">
                                                    <i class="fab fa-stripe opacity-10"></i>
                                                </div>
                                                <div class="text-end pt-1">

                                                    <h4 class="mb-0">
                                                        Stripe
                                                    </h4>
                                                </div>
                                            </div>
                                            <hr class="dark horizontal my-0">
                                            <div class="card-footer p-3 text-center">
                                                <a href="{{ route('ClientRechargeWithStripe', $card->slug) }}"
                                                    class="btn bg-gradient-dark">
                                                    Pay Now
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <!--Begin::Select Stripe-->
                                    <!--Begin::Select Paypal-->
                                    <div class="col-xl-4 col-sm-12 mb-xl-0 mb-5 mt-3">
                                        <div class="card">
                                            <div class="card-header p-3 pt-2">
                                                <div
                                                    class="icon icon-lg icon-shape bg-gradient-dark shadow-dark text-center border-radius-xl mt-n4 position-absolute">
                                                    <i class="fab fa-paypal opacity-10"></i>
                                                </div>
                                                <div class="text-end pt-1">
                                                    <h4 class="mb-0">
                                                        Paypal
                                                    </h4>
                                                </div>
                                            </div>
                                            <hr class="dark horizontal my-0">
                                            <div class="card-footer p-3 text-center">
                                                <a href="{{ route('ClientRechargeWithPaypal', $card->slug) }}"
                                                    class="btn bg-gradient-dark">
                                                    Pay Now
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <!--Begin::Select Paypal-->
                                    <!--Begin::Select Crypto Currency-->
                                    <div class="col-xl-4 col-sm-12 mb-xl-0 mb-5 mt-3">
                                        <div class="card">
                                            <div class="card-header p-3 pt-2">
                                                <div
                                                    class="icon icon-lg icon-shape bg-gradient-dark shadow-dark text-center border-radius-xl mt-n4 position-absolute">
                                                    <i class="fab fa-bitcoin opacity-10"></i>
                                                </div>
                                                <div class="text-end pt-1">
                                                    <h4 class="mb-0">
                                                        Crypto
                                                    </h4>
                                                </div>
                                            </div>
                                            <hr class="dark horizontal my-0">
                                            <div class="card-footer p-3 text-center">
                                                <a href="{{ route('ClientRechargeWithCrypto', $card->slug) }}"
                                                    class="btn bg-gradient-dark">
                                                    Pay Now
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <!--Begin::Select Crypto Currency-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
