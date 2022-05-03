<div>
    <!--Begin::Header-->
    @include('livewire.store.partials.header')
    <!--End::Header-->

    <!--Begin::If User Logged in-->
    @if ($user = Auth::user())

        <!--Begin::If Admin-->
        @if (Admin::Is($user->id))
            <!--Begin::Can not buy Cards-->
            @include('livewire.store.partials.not-buy-cards')
            <!--End::Can not buy Cards-->
        @endif
        <!--End::If Admin-->

        <!--Begin::If Business-->
        @if (Business::Is($user->id))
            <!--Begin::Can not buy Cards-->
            @include('livewire.store.partials.not-buy-cards')
            <!--End::Can not buy Cards-->
        @endif
        <!--End::If Business-->


        <!--Begin::If Client-->
        @if (Client::Is($user->id))
            <!--Begin::Buy Card-->
            @include('livewire.store.partials.buy-card')
            <!--End::Buy Card-->
        @endif
        <!--End::If Client-->

    <!--Begin::If User is not Logged in-->
    @else

    <section style="margin-top: 150px;" id="BuyCard" class="contact">
        <div class="container">
            <div class="section-title aos-init aos-animate" data-aos="fade-up">
                <h2>Buy</h2>
                <p>Card</p>
            </div>
            <div class="row">
                <div class="col-lg-4 aos-init aos-animate" data-aos="fade-right" data-aos-delay="100">
                    <div class="info">
                        <div class="address">
                            <h4>Price:</h4>
                            <p>{{ $card->price }} {{ strtoupper(Business::Currency($card->owner_id)) }}</p>
                        </div>
                        <div class="email">
                            <h4>Balance:</h4>
                            <p>{{ $card->balance }} {{ strtoupper(Business::Currency($card->owner_id)) }}
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 mt-5 mt-lg-0 aos-init aos-animate" data-aos="fade-left" data-aos-delay="200">
                    <div class="alert alert-danger">
                        <strong>Please loin to continue.
                            <a class="text-danger" href="{{ route('login') }}">Login here</a>
                        </strong>
                    </div>
                </div>
            </div>
        </div>
    </section>
    

    @endif
    <!--End::If User Logged in-->



</div>
