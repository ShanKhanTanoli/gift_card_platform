<div class="container-fluid">
    @include('errors.alerts')
    <div class="row mt-3">
        <!--Begin::Edit Ticket Form-->
        @include('livewire.business.dashboard.tickets.edit.partials.edit-ticket-form')
        <!--End::Edit Ticket Form-->

        <!--Begin::Edit Ticket-->
        @include('livewire.business.dashboard.tickets.edit.partials.edit-ticket')
        <!--End::Edit Ticket-->
    </div>
</div>
