<div class="container-fluid">
    @include('errors.alerts')
    <div class="row mt-4">
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                        <h6 class="text-white text-capitalize ps-3">
                            Cards
                        </h6>
                    </div>
                </div>
                <div class="card-body px-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Name
                                    </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Type
                                    </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Code
                                    </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Balance
                                    </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Expiry
                                    </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Recharge
                                    </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Status
                                    </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        View
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($cards as $voucher)
                                    <tr>
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm">
                                                        @if ($card = Card::FindById($voucher->card_id))
                                                            {{ Str::substr($card->name, 0, 15) }}
                                                        @else
                                                            NOT FOUND
                                                        @endif
                                                    </h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <div class="d-flex flex-column justify-content-center">
                                                    @if ($card = Card::FindById($voucher->card_id))
                                                        <span class="badge bg-info">
                                                            {{ Str::substr($card->type, 0, 15) }}
                                                        </span>
                                                    @else
                                                        <span class="badge bg-danger">
                                                            NOT FOUND
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm">
                                                        {{ $voucher->slug }}
                                                    </h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm">
                                                        {{ $voucher->balance }}
                                                        {{ strtoupper(Business::Currency(Auth::user()->id)) }}
                                                    </h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm">
                                                        {{ date('d M Y', strtotime($voucher->expires_at)) }}
                                                    </h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="align-middle">
                                            @if ($voucher->type == 'card')
                                                <button class="btn btn-sm btn-info"
                                                    wire:click='Recharge("{{ $voucher->slug }}")'>
                                                    <span wire:loading wire:target='Recharge("{{ $voucher->slug }}")'
                                                        class="spinner-border spinner-border-sm" role="status"
                                                        aria-hidden="true"></span>
                                                    Recharge
                                                </button>
                                            @else
                                                <button class="btn btn-sm btn-danger disabled">
                                                    CAN NOT
                                                </button>
                                            @endif
                                        </td>
                                        <td class="align-middle">
                                            <div class="d-flex px-2 py-1">
                                                <div class="d-flex flex-column justify-content-center">
                                                    <!--Begin::If Banned-->
                                                    @if ($voucher->trashed())
                                                        <span class="badge bg-gradient-danger">
                                                            BANNED
                                                        </span>
                                                    @else
                                                        <!--Begin::If Expired-->
                                                        @if ($voucher->isExpired())
                                                            <span class="badge bg-gradient-danger">
                                                                Expired
                                                            </span>
                                                        @else
                                                            <span class="badge bg-gradient-success">
                                                                Active
                                                            </span>
                                                        @endif
                                                        <!--End::If Expired-->
                                                    @endif
                                                    <!--End::If Banned-->
                                                </div>
                                            </div>
                                        </td>
                                        <td class="align-middle">
                                            <button class="btn btn-sm btn-info"
                                                wire:click='View("{{ $voucher->slug }}")'>
                                                <span wire:loading wire:target='View("{{ $voucher->slug }}")'
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
                    {{ $cards->render() }}
                </div>
            </div>
        </div>
    </div>
</div>
