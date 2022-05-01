<div class="container-fluid py-4">
    <div class="row">
        <!--Begin::Card-->
        <div class="col-xl-4 mb-xl-0 mb-4">
            <div class="card bg-transparent shadow-xl" id="PrintDev">
                <div class="overflow-hidden position-relative border-radius-xl">
                    <img src="{{ asset('dashboard/img/illustrations/bg-3.jpg') }}"
                        class="position-absolute start-0 top-0 w-100 z-index-1 h-100" alt="Card-Background">
                    <div class="card-body position-relative z-index-1 p-3">
                        <h6 class="text-white mt-0 mb-0 pb-0">
                            Brand Name
                        </h6>
                        <div class="d-flex">
                            <div class="col-8">
                                <h6 class="text-white mt-5 mb-0 pb-0">
                                    XXXX-XXXX-XXXX-XXXX
                                </h6>
                            </div>
                            <div class="col-4">
                                <div class=" mt-2 mb-3 pb-0" style="text-align: right;">
                                    {!! QrCode::size(80)->generate('XXXX-XXXX-XXXX-XXXX') !!}
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
                                        {{ strtoupper(Business::Currency(Auth::user()->id)) }}
                                    </span>
                                </span>
                                <span class="mb-2 text-xs">
                                    Balance:
                                    <span class="text-dark font-weight-bold ms-sm-2">
                                        {{ $card->balance }}
                                        {{ strtoupper(Business::Currency(Auth::user()->id)) }}
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
                                    href="{{ route('AdminEditCard', $card->unique_id) }}">
                                    <i class="fas fa-edit text-sm me-2">
                                    </i>
                                    Edit
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
