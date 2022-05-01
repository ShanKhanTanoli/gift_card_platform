<div class="col-xl-6 d-flex flex-column ms-auto me-auto ms-lg-auto ">
    <div class="card my-4">
        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
            <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3">
                    Available Cards
                </h6>
            </div>
        </div>
        <div class="card-body px-0 pb-2">
            <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                    <thead>
                        <tr>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                Price
                            </th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                Balance
                            </th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                Expires At
                            </th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                Buy
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cards as $card)
                            <tr>
                                <td>
                                    <div class="d-flex px-2 py-1">
                                        <div class="d-flex flex-column justify-content-center">
                                            <h6 class="mb-0 text-sm">
                                                {{ $card->price }}
                                                {{ strtoupper(Business::Currency($business)) }}
                                            </h6>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex px-2 py-1">
                                        <div class="d-flex flex-column justify-content-center">
                                            <h6 class="mb-0 text-sm">
                                                {{ $card->balance }}
                                                {{ strtoupper(Business::Currency($business)) }}
                                            </h6>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex px-2 py-1">
                                        <div class="d-flex flex-column justify-content-center">
                                            <h6 class="mb-0 text-sm">
                                                {{ date('d M Y', strtotime($card->expires_at)) }}
                                            </h6>
                                        </div>
                                    </div>
                                </td>
                                <td class="align-middle">
                                    <button class="btn btn-sm btn-info" wire:click='Buy("{{ $card->code }}")'>
                                        <span wire:loading wire:target='Buy("{{ $card->code }}")'
                                            class="spinner-border spinner-border-sm" role="status"
                                            aria-hidden="true"></span>
                                        Buy
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer">
            {{ $cards->render() }}
        </div>
    </div>
</div>
