@if($store->display_cards)
<section id="cards" class="pricing">
    <div class="container">
        <div class="section-title" data-aos="fade-up">
            <h2>Cards</h2>
            <p>Check our Cards</p>
        </div>
        <div class="row" data-aos="fade-left">
            @foreach ($cards as $card)
                <div class="col-lg-3 col-md-6 mb-5">
                    <div class="box featured" data-aos="zoom-in" data-aos-delay="100">
                        <h4>
                            <sup>{{ strtoupper(Business::Currency($card->owner_id)) }}</sup>
                            {{ $card->price }}
                        </h4>
                        <ul>
                            <li>Balance {{ $card->balance }} {{ strtoupper(Business::Currency($card->owner_id)) }}
                            </li>
                        </ul>
                        <div class="btn-wrap">
                            @if(Auth::user())
                            <!--End::If Card Price is Zero-->
                            @if($card->price == 0)
                            <button style="border:none;" type="button" class="btn-buy" wire:attr='disabled'
                                wire:click="GetFree('{{ $card->code }}')">
                                <span wire:loading wire:target="GetFree('{{ $card->code }}')"
                                    class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                    Get Free
                            </button>
                            @else
                            <button style="border:none;" type="button" class="btn-buy" wire:attr='disabled'
                                wire:click="BuyNow('{{ $card->code }}')">
                                <span wire:loading wire:target="BuyNow('{{ $card->code }}')"
                                    class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                Buy Now
                            </button>
                            @endif
                            <!--End::If Card Price is Zero-->
                            @else
                            <a class="btn-buy" href="{{ route('login') }}">
                                <strong>
                                    Please Login to continue
                                </strong>
                            </a>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endif
