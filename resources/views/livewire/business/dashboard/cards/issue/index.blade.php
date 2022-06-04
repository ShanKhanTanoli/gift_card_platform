<div class="container-fluid">
    @include('errors.alerts')
    <div class="row mt-3">
        <!--Begin::Issue Card Form-->
        @include('livewire.business.dashboard.cards.issue.partials.issue-card-form')
        <!--End::Issue Card Form-->

        <!--Begin::View Card-->
        @include('livewire.business.dashboard.cards.issue.partials.view-card')
        <!--End::View Card-->
    </div>
</div>
