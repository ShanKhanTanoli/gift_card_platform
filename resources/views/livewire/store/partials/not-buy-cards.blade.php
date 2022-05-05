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
                        <p>{{ $card->price }} {{ strtoupper(Business::Currency($card->user_id)) }}</p>
                    </div>
                    <div class="email">
                        <h4>Balance:</h4>
                        <p>{{ $card->balance }} {{ strtoupper(Business::Currency($card->user_id)) }}
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 mt-5 mt-lg-0 aos-init aos-animate" data-aos="fade-left" data-aos-delay="200">
                <div class="alert alert-danger">
                    <strong>You can not buy cards.</strong>
                </div>
                @include('errors.alerts')
            </div>
        </div>
    </div>
</section>
