<div>
    <!--Begin::If card has pin-->
    @if ($card->pin)
        @if (Session::get('validate_pin'))
            <!--Begin::View Card-->
            @include('livewire.client.dashboard.cards.view.partials.card-data')
            <!--End::View Card-->
        @else
            <!--Begin::Enter Pin-->
            @include('livewire.client.dashboard.cards.view.partials.pin')
            <!--End::Enter Pin-->
        @endif
    @else
        <!--Begin::View Card-->
        @include('livewire.client.dashboard.cards.view.partials.card-data')
        <!--End::View Card-->
    @endif
    <!--End::If card has pin-->
</div>
