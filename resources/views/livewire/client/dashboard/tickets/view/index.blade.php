<div class="container-fluid py-4">
    <!--Begin::Ticket Status-->
    @include('livewire.client.dashboard.tickets.partials.ticket-status')
    <!--End::Ticket Status-->
    <!--Begin::Errors-->
    @include('errors.alerts')
    <!--End::Errors-->
    <div class="row">
        <!--Begin::Ticket-->
        <div class="col-xl-4 mb-xl-0 mb-4">
            <div class="card bg-transparent shadow-xl" id="PrintDev">
                <div class="overflow-hidden position-relative border-radius-xl">
                    <img src="@if ($voucher = Ticket::FindById($card->card_id)) {{ asset(Storage::url($voucher->background)) }} @else {{ asset('dashboard/img/illustrations/bg-3.jpg') }} @endif"
                    class="position-absolute start-0 top-0 w-100 z-index-1 h-100" alt="Card-Background">
                    <div class="card-body position-relative z-index-1 p-3">
                        <div class="d-flex">
                            <div class="col-6">
                                <h6 class="mt-0 mb-0 pb-0" style="@if ($voucher = Ticket::FindById($card->card_id)) color: {{ $voucher->text_color }} !important; @endif">
                                    {{ Str::substr(Business::DisplayStoreName($card->user_id), 0, 20) }}
                                    @if ($find = Ticket::FindById($card->card_id))
                                        - {{ Str::ucfirst($card->type) }}
                                    @endif
                                </h6>
                            </div>
                            <div class="col-6">
                                <h6 class="mt-0 mb-0 pb-0"
                                    style="text-align: right; @if ($voucher = Ticket::FindById($card->card_id)) color: {{ $voucher->text_color }} !important; @endif">
                                    @if ($find = Ticket::FindById($card->card_id))
                                        {{ Str::substr($find->name, 0, 15) }}
                                    @endif
                                </h6>
                            </div>
                        </div>
                        <div class="d-flex">
                            <div class="col-8">
                                <h6 class="mt-5 pb-0" style="@if ($voucher = Ticket::FindById($card->card_id)) color: {{ $voucher->text_color }} !important; @endif">
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
                                <p class="text-sm opacity-8 mb-0" style="@if ($voucher = Ticket::FindById($card->card_id)) color: {{ $voucher->text_color }} !important; @endif">
                                    Expiry</p>
                                <h6 class="mb-0" style="@if ($voucher = Ticket::FindById($card->card_id)) color: {{ $voucher->text_color }} !important; @endif">
                                    {{ date('d/m/Y', strtotime($card->expires_at)) }}
                                </h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--End::Ticket-->

        <!--Begin::Ticket Information-->
        <div class="col-md-8">
            <div class="card">
                <div class="card-header pb-0">
                    <h6 class="mb-0">Ticket Information</h6>
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
                                    Ticket:
                                    @if ($find = Ticket::FindById($card->card_id))
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
                            <!--Begin::Ticket is Banned-->
                            @if (!$card->trashed())
                                <!--Begin::Ticket is Expired-->
                                @if (!$card->isExpired())
                                    <div class="ms-auto text-end">
                                        <button type="button" class="btn btn-link text-dark px-3 mb-0" id="PrintNow" <i
                                            class="fas fa-print text-sm me-2">
                                            </i>
                                            Print Ticket
                                        </button>
                                    </div>
                                @endif
                                <!--End::Ticket is Expired-->
                            @endif
                            <!--End::Ticket is Banned-->
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!--End::Ticket Information-->
    </div>
    <!--Begin::Ticket is Banned-->
    @if (!$card->trashed())
        <!--Begin::Ticket is Expired-->
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
        <!--End::Ticket is Expired-->
    @endif
    <!--End::Ticket is Banned-->
</div>
