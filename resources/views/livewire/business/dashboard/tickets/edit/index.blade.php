<div class="container-fluid">
    @include('errors.alerts')
    <div class="row mt-3">
        <!--Begin::Edit Card Form-->
        @include('livewire.business.dashboard.cards.edit.partials.edit-ticket-form')
        <!--End::Edit Card Form-->

        <!--Begin::Edit Card-->
        @include('livewire.business.dashboard.cards.edit.partials.edit-ticket')
        <!--End::Edit Card-->
    </div>
</div>
