<div>
    <!--Begin::If card has pin-->
    @if ($card->pin)
        @if (Session::get('validate_pin'))
            <!--Begin::View Card-->
            @include('livewire.business.dashboard.cards.view.partials.card-data')
            <!--End::View Card-->
        @else
            <!--Begin::Enter Pin-->
            @include('livewire.business.dashboard.cards.view.partials.pin-code')
            <!--End::Enter Pin-->
        @endif
    @else
        <!--Begin::View Card-->
        @include('livewire.business.dashboard.cards.view.partials.card-data')
        <!--End::View Card-->
    @endif
    <!--End::If card has pin-->
</div>
