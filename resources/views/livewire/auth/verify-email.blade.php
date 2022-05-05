<main class="main-content  mt-0">
    <section>
        <div class="page-header min-vh-100">
            <div class="container">
                <div class="row">
                    <div class="col-xl-4 col-lg-5 col-md-7 d-flex flex-column ms-auto me-auto ms-lg-auto ">
                        @include('errors.alerts')
                        @if (session('resent'))
                            <div class="alert alert-success" role="alert">
                                {{ __('A fresh verification link has been sent to your email address.') }}
                            </div>
                        @endif
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-4 col-lg-5 col-md-7 d-flex flex-column ms-auto me-auto ms-lg-auto ">
                        <div class="card card-plain">
                            <div class="card-header text-center">
                                <h4 class="font-weight-bolder">
                                    {{ __('Verify Your Email Address') }}
                                </h4>
                            </div>
                            <div class="card-body text-center">
                                {{ __('Before proceeding, please check your email for a verification link.') }}
                                {{ __('If you did not receive the email') }},
                                <button type="button" wire:click='SendVerificationLink()'
                                    class="btn btn-lg bg-gradient-dark mt-2">
                                    <span wire:loading class="spinner-border spinner-border-sm" role="status"
                                        aria-hidden="true"></span>
                                    {{ __('click here to request another') }}
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
