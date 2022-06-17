<div class="container-fluid py-4">
    <!--Begin::Card Status-->
    @include(
        'livewire.client.dashboard.cards.partials.card-status')
    <!--End::Card Status-->
    <!--Begin::Errors-->
    @include('errors.alerts')
    <!--End::Errors-->
    <div class="row">
        <!--Begin::Card-->
        <div class="col-xl-4 mb-xl-0 mb-4">
            <div class="card bg-transparent shadow-xl" id="PrintDev">
                <div class="overflow-hidden position-relative border-radius-xl">
                    <img src="{{ asset('dashboard/img/illustrations/bg-3.jpg') }}"
                        class="position-absolute start-0 top-0 w-100 z-index-1 h-100" alt="Card-Background">
                    <div class="card-body position-relative z-index-1 p-3">
                        <div class="d-flex">
                            <div class="col-6">
                                <h6 class="text-white mt-0 mb-0 pb-0">
                                    {{ Str::substr(Business::DisplayStoreName($card->user_id), 0, 20) }}
                                    @if ($find = Card::FindById($card->card_id))
                                        - {{ Str::ucfirst($card->type) }}
                                    @endif
                                </h6>
                            </div>
                            <div class="col-6">
                                <h6 class="text-white mt-0 mb-0 pb-0" style="text-align: right;">
                                    @if ($find = Card::FindById($card->card_id))
                                        {{ Str::substr($find->name, 0, 15) }}
                                    @endif
                                </h6>
                            </div>
                        </div>
                        <div class="d-flex">
                            <div class="col-8">
                                <h6 class="text-white mt-5 pb-0">
                                    {{ $card->code }}
                                </h6>
                            </div>
                            <div class="col-4">
                                <div class=" mt-2 mb-3 pb-0" style="text-align: right;">
                                    {!! QrCode::size(80)->generate($card->code) !!}
                                </div>
                            </div>
                        </div>
                        <div class=" d-flex">
                            <div>
                                <p class="text-white text-sm opacity-8 mb-0">Expiry</p>
                                <h6 class="text-white mb-0">
                                    {{ date('d/m/Y', strtotime($card->expires_at)) }}
                                </h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--End::Card-->

        <!--Begin::Card Information-->
        <div class="col-md-8">
            <div class="card">
                <div class="card-header pb-0">
                    <h6 class="mb-0">Card Information</h6>
                </div>
                <div class="card-body">
                    <ul class="list-group">
                        <li class="list-group-item border-0 d-flex mb-1 bg-gray-100 border-radius-lg">
                            <div class="d-flex flex-column">
                                <span class="mb-2 text-xs">
                                    Company:
                                    <span class="text-dark font-weight-bold ms-sm-2">
                                        {{ Business::DisplayStoreName($card->user_id) }}
                                    </span>
                                </span>
                                <span class="mb-2 text-xs">
                                    Card:
                                    @if ($find = Card::FindById($card->card_id))
                                        <span class="badge bg-info ms-sm-2">
                                            {{ Str::substr($find->name, 0, 15) }}

                                        </span>
                                    @else
                                        <span class="badge bg-danger ms-sm-2">
                                            NOT FOUND
                                        </span>
                                    @endif
                                </span>
                                <span class="mb-2 text-xs">
                                    Type:
                                    <span class="badge bg-info ms-sm-2">
                                        {{ strtoupper($card->type) }}
                                    </span>
                                </span>
                                <span class="mb-2 text-xs">
                                    Price:
                                    <span class="text-dark font-weight-bold ms-sm-2">
                                        {{ $card->price }}
                                        {{ strtoupper(Business::Currency($card->user_id)) }}
                                    </span>
                                </span>
                                <span class="mb-2 text-xs">
                                    Balance:
                                    <span class="text-dark font-weight-bold ms-sm-2">
                                        {{ $card->balance }}
                                        {{ strtoupper(Business::Currency($card->user_id)) }}
                                    </span>
                                </span>
                                <span class="mb-2 text-xs">
                                    Created At:
                                    <span class="text-dark font-weight-bold ms-sm-2">
                                        {{ date('d/m/Y', strtotime($card->created_at)) }}
                                    </span>
                                </span>
                                <span class="mb-2 text-xs">
                                    Current Expiry:
                                    <span class="text-dark font-weight-bold ms-sm-2">
                                        {{ date('d/m/Y', strtotime($card->expires_at)) }}
                                    </span>
                                </span>
                            </div>
                            <!--Begin::Card is Banned-->
                            @if (!$card->trashed())
                                <!--Begin::Card is Expired-->
                                @if (!$card->isExpired())
                                    <div class="ms-auto text-end">
                                        <a class="btn btn-link text-dark px-3 mb-0"
                                            href="{{ route('ClientRechargeCard', $card->slug) }}">
                                            <i class="fas fa-money-bill text-sm me-2">
                                            </i>
                                            Recharge
                                        </a>
                                        <button type="button" class="btn btn-link text-dark px-3 mb-0" id="PrintNow" <i
                                            class="fas fa-print text-sm me-2">
                                            </i>
                                            Print Card
                                        </button>
                                    </div>
                                @endif
                                <!--End::Card is Expired-->
                            @endif
                            <!--End::Card is Banned-->
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!--End::Card Information-->

    </div>
    <div class="row mt-4">

        <!--Begin::Card Recharge History-->
        <div class="col-lg-12 col-12">
            <div class="card h-100 mb-4">
                <div class="card-header pb-0 px-3">
                    <div class="row">
                        <div class="col-md-6">
                            <h6 class="mb-0">Your Recharge History</h6>
                        </div>
                    </div>
                </div>
                <div class="card-body pt-4 p-3">
                    <ul class="list-group">
                        @forelse($recharge as $payment)
                            <li
                                class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                                <div class="d-flex align-items-center">
                                    <div class="d-flex flex-column">
                                        <h6 class="text-xs">
                                            {{ date('d M Y', strtotime($payment->created_at)) }}
                                        </h6>
                                    </div>
                                </div>
                                <div
                                    class="d-flex align-items-center text-success text-gradient text-sm font-weight-bold">
                                    {{ $payment->amount }}
                                    {{ strtoupper(Business::Currency($card->user_id)) }}
                                </div>
                            </li>
                        @empty
                            <li
                                class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                                <div class="d-flex align-items-center">
                                    <h6 class="text-center">
                                        No recharge found
                                    </h6>
                                </div>
                            </li>
                        @endforelse
                    </ul>
                    {{ $recharge->render() }}
                </div>
            </div>
        </div>
        <!--End::Card Recharge History-->

    </div>
    <!--Begin::Card is Banned-->
    @if (!$card->trashed())
        <!--Begin::Card is Expired-->
        @if (!$card->isExpired())
            <script>
                $(document).ready(function() {
                    function printData() {
                        var divToPrint = document.getElementById("PrintDev");
                        newWin = window.open("");
                        newWin.document.write(divToPrint.outerHTML);
                        newWin.print();
                        newWin.close();
                    }
                    $("#PrintNow").click(function() {
                        printData();
                    });
                });
            </script>
        @endif
        <!--End::Card is Expired-->
    @endif
    <!--End::Card is Banned-->
</div>
