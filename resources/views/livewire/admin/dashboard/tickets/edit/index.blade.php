<div class="container-fluid">
    @include('errors.alerts')
    <div class="row mt-3">
        <!--Begin::Edit Ticket Form-->
        @include('livewire.admin.dashboard.tickets.edit.partials.edit-ticket-form')
        <!--End::Edit Ticket Form-->

        <!--Begin::Edit Ticket-->
        @include('livewire.admin.dashboard.tickets.edit.partials.edit-ticket')
        <!--End::Edit Ticket-->
    </div>
</div>
