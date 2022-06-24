<div class="container-fluid py-4">
    <!--Begin::Alerts-->
    @include('errors.alerts')
    <!--End::Alerts-->
    <!--Begin::Voucher Status-->
    @include('livewire.admin.dashboard.vouchers.view.partials.voucher-status')
    <!--End::Voucher Status-->
    <div class="row">
        <!--Begin::Voucher-->
        <div class="col-xl-4 mb-xl-0 mb-4">
            <div class="card bg-transparent shadow-xl" id="PrintDev">
                <div class="overflow-hidden position-relative border-radius-xl">
                    <img src="@if ($card->background) {{ asset(Storage::url($card->background)) }} @else {{ asset('dashboard/img/illustrations/bg-3.jpg') }} @endif"
                        class="position-absolute start-0 top-0 w-100 z-index-1 h-100" alt="Card-Background">
                    <div class="card-body position-relative z-index-1 p-3">
                        <div class="d-flex">
                            <div class="col-6">
                                <h6 class="mt-0 mb-0 pb-0" style="color: {{ $card->text_color }} !important;">
                                    {{ Str::substr(Business::DisplayStoreName($card->user_id), 0, 20) }}
                                    @if ($find = Voucher::FindById($card->card_id))
                                        {{ Str::ucfirst($card->type) }}
                                    @endif
                                </h6>
                            </div>
                            <div class="col-6">
                                <h6 class="mt-0 mb-0 pb-0"
                                    style="text-align: right; color:{{ $card->text_color }}!important;">
                                    @if ($find = Voucher::FindById($card->card_id))
                                        {{ Str::substr($find->name, 0, 15) }}
                                    @endif
                                </h6>
                            </div>
                        </div>
                        <div class="d-flex">
                            <div class="col-8">
                                <h6 class="mt-5 pb-0" style="color: {{ $card->text_color }} ;">
                                    {{ $card->code }}
                                </h6>
                            </div>
                            <div class="col-4">
                                <div class=" mt-2 mb-3 pb-0" style="text-align: right;">
                                    {!! QrCode::size(80)->generate($card->code) !!}
                                </div>
                            </div>
                        </div>
                        <div class="d-flex">
                            <div>
                                <p class="text-sm opacity-8 mb-0" style="color: {{ $card->text_color }} !important;">
                                    Expiry</p>
                                <h6 class="mb-0" style="color: {{ $card->text_color }} !important;">
                                    {{ date('d/m/Y', strtotime($card->expires_at)) }}
                                </h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--End::Voucher-->

        <!--Begin::Voucher Information-->
        <div class="col-md-8">
            <div class="card">
                <div class="card-header pb-0">
                    <h6 class="mb-0">Voucher Information</h6>
                </div>
                <div class="card-body">
                    <ul class="list-group">
                        <li class="list-group-item border-0 d-flex mb-1 bg-gray-100 border-radius-lg">
                            <div class="d-flex flex-column">
                                <span class="mb-2 text-xs">
                                    Brand:
                                    <span class="badge bg-info ms-sm-2">
                                        {{ Str::substr(Business::DisplayStoreName($card->user_id), 0, 20) }}
                                    </span>
                                </span>
                                <span class="mb-2 text-xs">
                                    Voucher:
                                    @if ($find = Voucher::FindById($card->card_id))
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
                                    Expiry:
                                    <span class="text-dark font-weight-bold ms-sm-2">
                                        {{ date('d/m/Y', strtotime($card->expires_at)) }}
                                    </span>
                                </span>
                                @if ($card->isRedeemed())
                                    <span class="mb-2 text-xs">
                                        Redeemed:
                                        <span class="text-dark font-weight-bold ms-sm-2">
                                            {{ date('d/m/Y', strtotime($card->redeemed_at)) }}
                                        </span>
                                    </span>
                                @endif
                            </div>
                            <div class="ms-auto text-end">

                                @if ($card->trashed())
                                    <button type="button" wire:click="Unban"
                                        class="btn btn-link text-success px-1 mb-0">
                                        <i class="fas fa-check text-sm me-2">
                                        </i>
                                        Unban
                                    </button>
                                @else
                                    <button type="button" wire:click="Ban"
                                        class="btn btn-link text-danger px-1 mb-0">
                                        <i class="fas fa-ban text-sm me-2">
                                        </i>
                                        Ban
                                    </button>
                                @endif


                                @if (!$card->trashed())
                                    <!--Begin::If card is not expired-->
                                    @if (!$card->isExpired())
                                        <!--Begin::If card is not redeemed-->
                                        @if (!$card->isRedeemed())
                                            @if ($card->balance != 0)
                                                <a class="btn btn-link text-dark px-3 mb-0" href="#"
                                                    data-bs-toggle="modal" data-bs-target="#RedeemModal">
                                                    <i class="fas fa-money-bill text-sm me-2">
                                                    </i>
                                                    Redeem
                                                </a>
                                            @else
                                                <span class="badge bg-gradient-danger">
                                                    ZER0 BALANCE
                                                </span>
                                            @endif
                                        @else
                                            <span class="badge bg-gradient-danger">
                                                REDEEMED
                                            </span>
                                        @endif
                                        <!--Begin::If card is not redeemed-->
                                    @endif
                                    <!--End::If card is not expired-->
                                @endif

                                <button type="button" class="btn btn-link text-dark px-3 mb-0" id="PrintNow">
                                    <i class="fas fa-print text-sm me-2"></i>
                                    Print Voucher
                                </button>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!--End::Voucher Information-->
    </div>
    <div class="row mt-4">
        <!--Begin::Card Redeem History-->
        <div class="col-lg-12 col-12">
            <div class="card h-100 mb-4">
                <div class="card-header pb-0 px-3">
                    <div class="row">
                        <div class="col-md-6">
                            <h6 class="mb-0">Redeem History</h6>
                        </div>
                    </div>
                </div>
                <div class="card-body pt-4 p-3">
                    <ul class="list-group">
                        @forelse($redeeming as $redeem)
                            <li
                                class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                                <div class="d-flex align-items-center">
                                    <div class="d-flex flex-column">
                                        <h6 class="text-xs">
                                            {{ date('d M Y', strtotime($redeem->created_at)) }}
                                        </h6>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center">
                                    <div class="d-flex flex-column">
                                        <h6 class="text-xs">
                                            {{ Str::substr($redeem->description, 0, 20) }}
                                        </h6>
                                    </div>
                                </div>
                                <div
                                    class="d-flex align-items-center text-success text-gradient text-sm font-weight-bold">
                                    {{ $redeem->amount }}
                                    {{ strtoupper(Business::Currency($card->user_id)) }}
                                </div>
                            </li>
                        @empty
                            <li
                                class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                                <div class="d-flex align-items-center">
                                    <h6 class="text-center">
                                        No redeeming history found
                                    </h6>
                                </div>
                            </li>
                        @endforelse
                    </ul>
                </div>
                <div class="card-footer text-center">
                    <button type="button" class="btn btn-primary btn-sm" wire:attr='disabled'
                        wire:click='LoadMoreRedeemingHistory'>
                        <span wire:loading wire:target='LoadMoreRedeemingHistory'
                            class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                        Load More
                    </button>
                </div>
            </div>
        </div>
        <!--End::Card Redeem History-->
        @if (!$card->isExpired())
            @if ($card->balance != 0)
                <!--Begin::Redeem Modal-->
                @include('livewire.business.dashboard.vouchers.view.partials.redeem-modal')
                <!--End::Redeem Modal-->
            @endif
        @endif
    </div>
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
</div>
