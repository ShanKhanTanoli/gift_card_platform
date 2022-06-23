<div class="container-fluid">
    @include('errors.alerts')
    <div class="row mb-4">
        <div class="col-xl-6 col-sm-12 mb-xl-0 mb-4">
            <a href="{{ route('AdminTickets') }}">
                <div class="card">
                    <div class="card-header p-3 pt-2" style="border-radius: 0;">
                        <div
                            class="icon icon-lg icon-shape bg-gradient-primary shadow-dark text-center border-radius-xl mt-n4 position-absolute">
                            <i class="fas fa-ticket-alt opacity-10"></i>
                        </div>
                        <div class="text-end pt-1">
                            <p
                                class="text-sm mb-0 text-capitalize @if (Request::path() == 'Admin/Tickets') text-primary @endif">
                                Tickets</p>
                            <h4 class="mb-0 @if (Request::path() == 'Admin/Tickets') text-primary @endif">
                                {{ Ticket::Count() }}
                            </h4>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-xl-6 col-sm-12 mb-xl-0 mb-4">
            <a href="{{ route('AdminAddTicket') }}">
                <div class="card">
                    <div class="card-header p-3 pt-2" style="border-radius: 0;">
                        <div
                            class="icon icon-lg icon-shape bg-gradient-primary shadow-dark text-center border-radius-xl mt-n4 position-absolute">
                            <i class="fas fa-plus opacity-10"></i>
                        </div>
                        <div class="text-end pt-1">
                            <p class="text-sm mb-0 text-capitalize">Add New</p>
                            <h4 class="mb-0">
                                Ticket
                            </h4>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                        <h6 class="text-white text-capitalize ps-3">
                            Tickets
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
                                        Price
                                    </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Balance
                                    </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Expires At
                                    </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Created At
                                    </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Status
                                    </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Sold
                                    </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Edit
                                    </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Visibility
                                    </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Ban/Unban
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
                                                        @if (Str::length($card->name) > 15)
                                                            {!! Str::substr($card->name, 0, 15) !!}...
                                                        @else
                                                            {!! $card->name !!}
                                                        @endif
                                                    </h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm">
                                                        {{ $card->price }}
                                                        {{ strtoupper(Business::Currency($card->user_id)) }}
                                                    </h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm">
                                                        {{ $card->balance }}
                                                        {{ strtoupper(Business::Currency($card->user_id)) }}
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
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm">
                                                        {{ date('d M Y', strtotime($card->created_at)) }}
                                                    </h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="align-middle">
                                            <div class="d-flex px-2 py-1">
                                                <div class="d-flex flex-column justify-content-center">
                                                    <!--Begin::Card is Banned-->
                                                    @if ($card->trashed())
                                                        <span class="badge bg-gradient-danger">
                                                            BANNED
                                                        </span>
                                                    @else
                                                        <!--Begin::Card is Expired-->
                                                        @if ($card->isExpired())
                                                            <span class="badge bg-gradient-danger">
                                                                {{ strtoupper('Expired') }}
                                                            </span>
                                                        @else
                                                            <!--Begin::Card is Published/Archived-->
                                                            @if ($card->isPublished())
                                                                <span class="badge bg-gradient-info">
                                                                    {{ strtoupper('Published') }}
                                                                </span>
                                                            @else
                                                                <span class="badge bg-gradient-danger">
                                                                    {{ strtoupper('Archived') }}
                                                                </span>
                                                            @endif
                                                            <!--End::Card is Published/Archived-->
                                                        @endif
                                                        <!--End::Card is Expired-->
                                                    @endif
                                                    <!--End::Card is Banned-->
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm">
                                                        {{ Ticket::CountSold($card->id) }}
                                                    </h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="align-middle">
                                                <button class="btn btn-sm btn-success"
                                                    wire:click='Edit("{{ $card->slug }}")'>
                                                    <span wire:loading wire:target='Edit("{{ $card->slug }}")'
                                                        class="spinner-border spinner-border-sm" role="status"
                                                        aria-hidden="true"></span>
                                                    Edit
                                                </button>
                                        </td>
                                        <td class="align-middle">
                                            @if ($card->trashed())
                                                <button class="btn btn-sm btn-danger disabled">
                                                    BANNED
                                                </button>
                                            @else
                                                <!--Begin::Card is Published/Archived-->
                                                @if ($card->isPublished())
                                                    <button class="btn btn-sm btn-danger"
                                                        wire:click='ArchiveConfirmation("{{ $card->slug }}")'>
                                                        <span wire:loading
                                                            wire:target='ArchiveConfirmation("{{ $card->slug }}")'
                                                            class="spinner-border spinner-border-sm" role="status"
                                                            aria-hidden="true"></span>
                                                        Archive
                                                    </button>
                                                @else
                                                    <button class="btn btn-sm btn-info"
                                                        wire:click='Publish("{{ $card->id }}")'>
                                                        <span wire:loading wire:target='Publish("{{ $card->id }}")'
                                                            class="spinner-border spinner-border-sm" role="status"
                                                            aria-hidden="true"></span>
                                                        Publish
                                                    </button>
                                                @endif
                                            @endif
                                        </td>
                                        <td class="align-middle">
                                            @if ($card->trashed())
                                                <button class="btn btn-sm btn-danger"
                                                    wire:click='Unban("{{ $card->id }}")'>
                                                    <span wire:loading wire:target='Unban("{{ $card->id }}")'
                                                        class="spinner-border spinner-border-sm" role="status"
                                                        aria-hidden="true"></span>
                                                    Unban
                                                </button>
                                            @else
                                                <button class="btn btn-sm btn-info"
                                                    wire:click='BanConfirmation("{{ $card->slug }}")'>
                                                    <span wire:loading
                                                        wire:target='BanConfirmation("{{ $card->slug }}")'
                                                        class="spinner-border spinner-border-sm" role="status"
                                                        aria-hidden="true"></span>
                                                    Ban
                                                </button>
                                            @endif
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

    @if ($archive)
        <!--Begin::ArchiveModal-->
        @include('livewire.business.dashboard.partials.archive-modal')
        <!--End::ArchiveModal-->
    @endif

    @if ($ban)
    <!--Begin::BanModel-->
    @include('livewire.admin.dashboard.partials.ban-modal')
    <!--End::BanModel-->
@endif

    <!--Begin::Script-->
    @section('scripts')
        <script>
            Livewire.on('archive', function() {
                $('#archive-notification').modal('show');
            })

            Livewire.on('ban', function() {
                $('#ban-notification').modal('show');
            })
        </script>
    @endsection
    <!--End::Script-->
</div>
