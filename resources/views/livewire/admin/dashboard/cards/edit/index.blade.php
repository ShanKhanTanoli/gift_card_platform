<div class="container-fluid">
    @include('errors.alerts')
    <div class="row mt-3">
        <!--Begin::Edit Card Form-->
        @include('livewire.admin.dashboard.cards.edit.partials.edit-card-form')
        <!--End::Edit Card Form-->

        <!--Begin::Edit Card-->
        @include('livewire.admin.dashboard.cards.edit.partials.edit-card')
        <!--End::Edit Card-->
    </div>
</div>
