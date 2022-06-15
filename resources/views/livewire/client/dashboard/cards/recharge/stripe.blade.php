<div class="container-fluid py-4">
    @include('errors.alerts')
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
                            @if ($business = Business::Details($card->user_id))
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

        <!--Begin::Card Recharge-->
        <div class="col-12 mt-3">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                        <h6 class="text-white text-capitalize ps-3">
                            Recharge Card
                        </h6>
                    </div>
                </div>
                <div class="card-body px-0 pb-2">
                    <div class="container">
                        <form>
                            <div class="row">

                                <div class="col-md-12">
                                    <div class="input-group input-group-static my-3">
                                        <label for="holder_name">Card Holder Name</label>
                                        <input type="text" wire:model.defer='holder_name'
                                            value="{{ old('holder_name') }}"
                                            class="form-control  @error('holder_name') is-invalid @enderror"
                                            placeholder="Enter Card Holder Name">
                                        @error('holder_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="input-group input-group-static my-3">
                                        <label for="card_number">Card Number</label>
                                        <input type="text" wire:model.defer='card_number'
                                            value="{{ old('card_number') }}"
                                            class="form-control  @error('card_number') is-invalid @enderror"
                                            placeholder="Enter Card Number">
                                        @error('card_number')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>


                                <div class="col-md-6">
                                    <div class="input-group input-group-static my-3">
                                        <label for="card_expiry">Card Expiry</label>
                                        <input type="date" wire:model.defer='card_expiry'
                                            value="{{ old('card_expiry') }}"
                                            class="form-control  @error('card_expiry') is-invalid @enderror"
                                            placeholder="Enter Card Expiry">
                                        @error('card_expiry')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="input-group input-group-static my-3">
                                        <label for="card_cvc">Card CVC</label>
                                        <input type="text" wire:model.defer='card_cvc' value="{{ old('card_cvc') }}"
                                            class="form-control  @error('card_cvc') is-invalid @enderror"
                                            placeholder="Enter Card CVC">
                                        @error('card_cvc')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="input-group input-group-static my-3">
                                        <label for="balance">Balance Amount
                                            ({{ strtoupper(Business::Currency(Auth::user()->id)) }})</label>
                                        <input type="text" wire:model.defer='balance' value="{{ old('balance') }}"
                                            class="form-control  @error('balance') is-invalid @enderror"
                                            placeholder="Enter Balance Amount ({{ strtoupper(Business::Currency(Auth::user()->id)) }})">
                                        @error('balance')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <button type="button" class="btn btn-primary" wire:attr='disabled'
                                        wire:click='Recharge'>
                                        <span wire:loading class="spinner-border spinner-border-sm" role="status"
                                            aria-hidden="true"></span>
                                        Save Changes
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!--End::Card Recharge-->
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
