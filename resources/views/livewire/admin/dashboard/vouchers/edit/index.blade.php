<div class="container-fluid">
    @include('errors.alerts')
    <div class="row mt-3">
        <!--Begin::Edit Voucher Form-->
        @include('livewire.admin.dashboard.vouchers.edit.partials.edit-voucher-form')
        <!--End::Edit Voucher Form-->

        <!--Begin::Edit Voucher-->
        @include('livewire.admin.dashboard.vouchers.edit.partials.edit-voucher')
        <!--End::Edit Voucher-->
    </div>
</div>
