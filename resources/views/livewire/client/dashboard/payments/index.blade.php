<div class="container-fluid">
    @include('errors.alerts')
    <div class="row mt-4">
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                        <h6 class="text-white text-capitalize ps-3">
                            Payments
                        </h6>
                    </div>
                </div>
                <div class="card-body px-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        #
                                    </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Card
                                    </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Paid
                                    </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Card Expiry
                                    </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Payment Date
                                    </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        View Card
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($payments as $payment)
                                    <tr>
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm">
                                                        {{ $loop->iteration }}
                                                    </h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm">
                                                        <!--Begin::If Voucher Found-->
                                                        @if ($voucher = Voucher::FindById($payment->voucher_id))
                                                            <!--Begin::If Card Found-->
                                                            @if ($card = Card::FindById($voucher->card_id))
                                                                {{ Str::substr($card->name, 0, 20) }}
                                                            @else
                                                                {{ __('Not Found') }}
                                                            @endif
                                                            <!--End::If Card Found-->
                                                        @else
                                                            {{ __('Not Found') }}
                                                        @endif
                                                        <!--End::If Voucher Found-->
                                                    </h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm">
                                                        {{ $payment->price }}
                                                        {{ strtoupper($payment->currency) }}
                                                    </h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm">
                                                          <!--Begin::If Voucher Found-->
                                                          @if ($voucher = Voucher::FindById($payment->voucher_id))
                                                          <!--Begin::If Card Found-->
                                                          @if ($card = Card::FindById($voucher->card_id))
                                                          {{ date('d M Y', strtotime($card->expires_at)) }}
                                                          @else
                                                              {{ __('Not Found') }}
                                                          @endif
                                                          <!--End::If Card Found-->
                                                      @else
                                                          {{ __('Not Found') }}
                                                      @endif
                                                      <!--End::If Voucher Found-->
                                                    </h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm">
                                                        {{ date('d M Y', strtotime($payment->created_at)) }}
                                                    </h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="align-middle">
                                            <button class="btn btn-sm btn-info"
                                                wire:click='ViewCard("{{ $payment->voucher_id }}")'>
                                                <span wire:loading
                                                    wire:target='ViewCard("{{ $payment->voucher_id }}")'
                                                    class="spinner-border spinner-border-sm" role="status"
                                                    aria-hidden="true"></span>
                                                View
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer">
                    {{ $payments->render() }}
                </div>
            </div>
        </div>
    </div>
</div>
