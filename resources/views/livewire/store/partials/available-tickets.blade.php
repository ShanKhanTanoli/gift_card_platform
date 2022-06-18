@if ($store->display_cards)
    <section id="tickets" class="pricing">
        <div class="container">
            <div class="section-title" data-aos="fade-up">
                <h2>Tickets</h2>
                <p>Check our Tickets</p>
            </div>
            <div class="row" data-aos="fade-left">
                @foreach ($tickets as $card)
                    @if (Ticket::CanBePurchased($card->slug))
                        <div class="col-lg-3 col-md-6 mb-5">
                            <div class="box featured" data-aos="zoom-in" data-aos-delay="100">
                                <h3>
                                    @if (Str::length($card->name) > 15)
                                        {!! Str::substr($card->name, 0, 15) !!}...
                                    @else
                                        {{ $card->name }}
                                    @endif
                                </h3>
                                <h4>
                                    <sup>{{ strtoupper(Business::Currency($card->user_id)) }}</sup>
                                    {{ $card->price }}
                                </h4>
                                <ul>
                                    <li>
                                        <strong>
                                            {{ strtoupper($card->type) }}
                                        </strong>
                                    </li>
                                </ul>
                                <ul>
                                    <li>Balance
                                        <strong>
                                            {{ $card->balance }}
                                            {{ strtoupper(Business::Currency($card->user_id)) }}
                                        </strong>
                                    </li>
                                    <li>
                                        Rechargeable
                                        @if ($card->type == 'card')
                                            <i class="fas fa-check text-green"></i>
                                        @else
                                            <i class="fas fa-times text-danger"></i>
                                        @endif
                                    </li>
                                    <li>
                                        Add Pin Code
                                        @if ($card->type == 'card')
                                            <i class="fas fa-check text-green"></i>
                                        @else
                                            <i class="fas fa-times text-danger"></i>
                                        @endif
                                    </li>
                                    <li>
                                        Can Activate
                                        @if ($card->type == 'card')
                                            <i class="fas fa-check text-green"></i>
                                        @else
                                            <i class="fas fa-times text-danger"></i>
                                        @endif
                                    </li>
                                    <li>
                                        Can Deactivate
                                        @if ($card->type == 'card')
                                            <i class="fas fa-check text-green"></i>
                                        @else
                                            <i class="fas fa-times text-danger"></i>
                                        @endif
                                    </li>
                                    <li>
                                        Can Use
                                        @if ($card->type == 'card')
                                            Until Expiry
                                        @else
                                            One Time
                                        @endif
                                    </li>
                                </ul>
                                <!--End::If Card-->
                                <div class="btn-wrap">
                                    @if (Auth::user())
                                        <!--End::If Card Price is Zero-->
                                        @if ($card->price == 0)
                                            <button style="border:none;" type="button" class="btn-buy"
                                                wire:attr='disabled' wire:click="GetFree('{{ $card->slug }}')">
                                                <span wire:loading wire:target="GetFree('{{ $card->slug }}')"
                                                    class="spinner-border spinner-border-sm" role="status"
                                                    aria-hidden="true"></span>
                                                Get Free
                                            </button>
                                        @else
                                            <button style="border:none;" type="button" class="btn-buy"
                                                wire:attr='disabled' wire:click="BuyNow('{{ $card->slug }}')">
                                                <span wire:loading wire:target="BuyNow('{{ $card->slug }}')"
                                                    class="spinner-border spinner-border-sm" role="status"
                                                    aria-hidden="true"></span>
                                                Buy Now
                                            </button>
                                        @endif
                                        <!--End::If Card Price is Zero-->
                                    @else
                                        <a class="btn-buy" href="{{ route('login') }}">
                                            <strong>
                                                Please Login to buy
                                            </strong>
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
                @include('errors.alerts')
            </div>
        </div>
    </section>
@endif
