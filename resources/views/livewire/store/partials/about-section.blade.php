<main id="main">
    <!-- ======= About Section ======= -->
    <section id="about" class="about">
        <div class="container">
            <div class="section-title" data-aos="fade-up">
                <h2>About</h2>
                <p>Store</p>
            </div>
            <div class="row" data-aos="fade-left">
                <div class="col-lg-12 col-md-12">
                    <p>{!! $store->store_description !!}</p>
                </div>
            </div>
        </div>
    </section>
    <!-- End About Section -->

    <!--Begin::Available Cards-->
    @include('livewire.store.partials.available-cards')
    <!--End::Available Cards-->

    <!--Begin::Available Tickets-->
    @include('livewire.store.partials.available-tickets')
    <!--End::Available Tickets-->

    <!--Begin::Available Vouchers-->
    @include('livewire.store.partials.available-vouchers')
    <!--End::Available Vouchers-->
</main>
