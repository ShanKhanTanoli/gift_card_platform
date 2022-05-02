<div class="container-fluid">
    @include('errors.alerts')
    <div class="row mt-3">
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                        <h6 class="text-white text-capitalize ps-3">
                            Stripe Connect Account
                        </h6>
                    </div>
                </div>
                <div class="card-body px-0 pb-2">
                    <div class="container">

                        <!--Begin::If Business has Connect Account-->
                        @if ($account = Auth::user()->account_id)

                            <!--Begin::If Business has Valid Connect Account-->
                            @if ($retrieve = Stripe::RetrieveAccount($account))

                                <div class="alert alert-info text-white">
                                    <i class="fas fa-info-circle"></i>
                                    <strong>You have Connect Account</strong>
                                </div>

                                <!--Begin::If Payouts are Enabled-->
                                @if (!$retrieve->payouts_enabled)
                                    <div class="alert alert-danger text-white">
                                        <i class="fas fa-info-circle"></i>
                                        <strong>Complete your Account</strong>
                                    </div>
                                @endif
                                <!--End::If Payouts are Enabled-->

                                <!--Begin::If Payouts are Enabled-->
                                @if (!$retrieve->payouts_enabled && !$retrieve->charges_enabled && !$retrieve->details_submitted)
                                    <div class="alert alert-danger text-white">
                                        <i class="fas fa-info-circle"></i>
                                        <strong>Please complete your Account</strong>
                                    </div>
                                @endif
                                <!--End::If Payouts are Enabled-->


                                <!--Begin::If Business has a Valid Connect Account-->
                                <form>
                                    <div class="row">
                                        <div class="col-md-12">

                                            <!--Begin::If Payouts are not Enabled-->
                                            @if (!$retrieve->payouts_enabled && !$retrieve->charges_enabled && !$retrieve->details_submitted)
                                            <button type="button" class="btn btn-info" wire:attr='disabled'
                                                wire:click='Complete'>
                                                <span wire:loading wire:target='Complete'
                                                    class="spinner-border spinner-border-sm" role="status"
                                                    aria-hidden="true"></span>
                                                Complete Your Account
                                            </button>
                                            @else
                                            <button type="button" class="btn btn-info" wire:attr='disabled'
                                                wire:click='AccountLogin'>
                                                <span wire:loading wire:target='AccountLogin'
                                                    class="spinner-border spinner-border-sm" role="status"
                                                    aria-hidden="true"></span>
                                                Account Login
                                            </button>
                                            @endif
                                            <!--End::If Payouts are not Enabled-->
                                        </div>
                                    </div>
                                </form>
                                <!--End::If Business has a Valid Connect Account-->

                            @else
                                <!--Begin::If Business has Not a Valid Connect Account-->
                                <!--Begin::Create Account-->
                                @include(
                                    'livewire.business.dashboard.stripe-connect.partials.create-account'
                                )
                                <!--End::Create Account-->
                                <!--End::If Business Not a has Valid Connect Account-->

                            @endif
                            <!--End::If Business has Valid Connect Account-->
                        @else
                            <!--Begin::Create Account-->
                            @include(
                                'livewire.business.dashboard.stripe-connect.partials.create-account'
                            )
                            <!--End::Create Account-->

                        @endif
                        <!--Begin::If Business has Connect Account-->

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
