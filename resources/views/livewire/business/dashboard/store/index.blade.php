<div class="container-fluid">
    @include('errors.alerts')

    @include('errors.alerts')
    <div class="row mb-4">
        <div class="col-xl-4 col-sm-12 mb-xl-0 mb-4">
            <a href="#">
                <div class="card">
                    <div class="card-header p-3 pt-2" style="border-radius: 0;">
                        <div
                            class="icon icon-lg icon-shape bg-gradient-primary shadow-dark text-center border-radius-xl mt-n4 position-absolute">
                            <i class="fas fa-credit-card opacity-10"></i>
                        </div>
                        <div class="text-end pt-1">
                            <p
                                class="text-sm mb-0 text-capitalize @if (Request::path() == 'Business/Cards') text-primary @endif">
                                Total Cards</p>
                            <h4 class="mb-0 @if (Request::path() == 'Business/Cards') text-primary @endif">
                                {{ Business::CountCards(Auth::user()->id) }}
                            </h4>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-xl-4 col-sm-12 mb-xl-0 mb-4">
            <a href="{{ route('BusinessCards') }}">
                <div class="card">
                    <div class="card-header p-3 pt-2" style="border-radius: 0;">
                        <div
                            class="icon icon-lg icon-shape bg-gradient-primary shadow-dark text-center border-radius-xl mt-n4 position-absolute">
                            <i class="fas fa-credit-card opacity-10"></i>
                        </div>
                        <div class="text-end pt-1">
                            <p
                                class="text-sm mb-0 text-capitalize @if (Request::path() == 'Business/Cards') text-primary @endif">
                                UnSold Cards</p>
                            <h4 class="mb-0 @if (Request::path() == 'Business/Cards') text-primary @endif">
                                {{ Business::CountUnSoldCards(Auth::user()->id) }}
                            </h4>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-xl-4 col-sm-12 mb-xl-0 mb-4">
            <a href="{{ route('BusinessSoldCards') }}">
                <div class="card">
                    <div class="card-header p-3 pt-2" style="border-radius: 0;">
                        <div
                            class="icon icon-lg icon-shape bg-gradient-primary shadow-dark text-center border-radius-xl mt-n4 position-absolute">
                            <i class="fas fa-credit-card opacity-10"></i>
                        </div>
                        <div class="text-end pt-1">
                            <p
                                class="text-sm mb-0 text-capitalize @if (Request::path() == 'Business/SoldCards') text-primary @endif">
                                Sold Cards</p>
                            <h4 class="mb-0 @if (Request::path() == 'Business/SoldCards') text-primary @endif">
                                {{ Business::CountSoldCards(Auth::user()->id) }}
                            </h4>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>
    <!--Begin::Info Messages-->
    <div class="row mt-4">
        <!--Begin::Display Card Status-->
        <div class="col-12">
            @if ($store = Business::Store(Auth::user()->id))
                @if ($store->display_cards)
                    <div class="alert alert-success text-white">
                        <i class="fas fa-info-circle"></i>
                        <strong>
                            Your cards are being displayed on the store page.
                        </strong>
                    </div>
                @else
                    <div class="alert alert-info text-white">
                        <i class="fas fa-info-circle"></i> Your cards are not being displayed on the store page.
                        <a style="text-decoration:underline;" class="text-white"
                            href="{{ route('BusinessEditStore') }}">
                            <strong>
                                Go to this page
                            </strong>
                        </a>
                    </div>
                @endif
            @endif
        </div>
        <!--End::Display Card Status-->

        <!--Begin::Display Store Address-->
        <div class="col-12">
            @if ($store = Business::Store(Auth::user()->id))
                <div class="alert alert-info text-white">
                    <i class="fas fa-info-circle"></i> Your Store Address.
                    <a target="new" style="text-decoration:underline;" class="text-white"
                        href="{{ route('StorePage', $store->store_name) }}">
                        <strong>
                            {{ route('StorePage', $store->store_name) }}
                        </strong>
                    </a>
                </div>
            @endif
        </div>
        <!--End::Display Store Address-->

        <!--begin::Store Description-->
        @if ($store = Business::Store(Auth::user()->id))
            <div class="col-12">
                <div class="card my-4">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                            <h6 class="text-white text-capitalize ps-3">
                                Store Description
                            </h6>
                        </div>
                    </div>
                    <div class="card-body px-0 pb-2">
                        <div class="container">
                            <div class="row">
                                <p class="p-3">
                                    {!! $store->store_description !!}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
        <!--End::Store Description-->
    </div>
</div>
