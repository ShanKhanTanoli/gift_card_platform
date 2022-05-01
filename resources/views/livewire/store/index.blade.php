<div>
    <!--Begin::Header-->
    @include('livewire.store.partials.header')
    <!--End::Header-->
    <main class="main-content  mt-0">
        <section>
            <div class="page-header min-vh-100">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-4 col-lg-5 col-md-7 d-flex flex-column ms-auto me-auto ms-lg-auto ">
                            @include('errors.alerts')
                        </div>
                    </div>
                    <div class="row d-flex">

                        <!--Begin::Business Description-->
                        @include('livewire.store.partials.description')
                        <!--End::Business Description-->

                        <!--Begin::Available Cards-->
                        @include('livewire.store.partials.available-cards')
                        <!--End::Available Cards-->
                    </div>
                </div>
            </div>
        </section>
    </main>
</div>
