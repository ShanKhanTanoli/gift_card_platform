<div class="container-fluid py-4">
    <!--Begin::Vouchers Status-->
    @include(
        'livewire.client.dashboard.vouchers.partials.voucher-status'
    )
    <!--End::Vouchers Status-->

    <!--Begin::Errors-->
    @include('errors.alerts')
    <!--End::Errors-->
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
                                        - {{ Str::ucfirst($card->type) }}
                                    @endif
                                </h6>
                            </div>
                            <div class="col-6">
                                <h6 class="mt-0 mb-0 pb-0" style="text-align: right; color:{{ $card->text_color }}!important;">
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
                                <p class="text-sm opacity-8 mb-0" style="color: {{ $card->text_color }} !important;">Expiry</p>
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
                                    Company:
                                    <span class="text-dark font-weight-bold ms-sm-2">
                                        {{ Business::DisplayStoreName($card->user_id) }}
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
                            <!--Begin::Voucher is Banned-->
                            @if (!$card->trashed())
                                <!--Begin::Voucher is Expired-->
                                @if (!$card->isExpired())
                                    <div class="ms-auto text-end">
                                        <button type="button" class="btn btn-link text-dark px-3 mb-0" id="PrintNow" <i
                                            class="fas fa-print text-sm me-2">
                                            </i>
                                            Print Voucher
                                        </button>
                                    </div>
                                @endif
                                <!--End::Voucher is Expired-->
                            @endif
                            <!--End::Voucher is Banned-->
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!--End::Voucher Information-->
    </div>
    <!--Begin::Voucher is Banned-->
    @if (!$card->trashed())
        <!--Begin::Voucher is Expired-->
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
        <!--End::Voucher is Expired-->
    @endif
    <!--End::Voucher is Banned-->
</div>
