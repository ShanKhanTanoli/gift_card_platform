<div class="container-fluid py-4">
    <div class="row">
        <!--Begin::Card-->
        <div class="col-xl-4 mb-xl-0 mb-4">
            <div class="card bg-transparent shadow-xl" id="PrintDev">
                <div class="overflow-hidden position-relative border-radius-xl">
                    <img src="{{ asset('dashboard/img/illustrations/bg-3.jpg') }}"
                        class="position-absolute start-0 top-0 w-100 z-index-1 h-100" alt="Card-Background">
                    {{-- <span class="mask bg-gradient-dark opacity-10"></span> --}}
                    <div class="card-body position-relative z-index-1 p-3">
                        <h6 class="text-white mt-0 mb-0 pb-0">
                            @if ($business = Business::Details($card->owner_id))
                                {{ $business->business_name }}
                            @else
                                Brand Name
                            @endif
                        </h6>
                        <div class="d-flex">
                            <div class="col-8">
                                <h6 class="text-white mt-5 mb-0 pb-0">
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
                                    Price:
                                    <span class="text-dark font-weight-bold ms-sm-2">
                                        {{ $card->price }}
                                        {{ strtoupper(Business::Currency($card->owner_id)) }}
                                    </span>
                                </span>
                                <span class="mb-2 text-xs">
                                    Balance:
                                    <span class="text-dark font-weight-bold ms-sm-2">
                                        {{ $card->balance }}
                                        {{ strtoupper(Business::Currency($card->owner_id)) }}
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
                            <div class="ms-auto text-end">
                                <a class="btn btn-link text-dark px-3 mb-0"
                                    href="{{ route('ClientRechargeCard', $card->code) }}">
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
                                    {{ strtoupper(Business::Currency($card->owner_id)) }}
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
