<div class="col-4">
    <!--Begin::Card-->
    <div class="card bg-transparent shadow-xl" id="PrintDev">
        <div class="overflow-hidden position-relative border-radius-xl">

            <img src="@if ($card->background) {{ asset(Storage::url($card->background)) }} @else {{ asset('dashboard/img/illustrations/bg-3.jpg') }} @endif"
                class="position-absolute start-0 top-0 w-100 z-index-1 h-100" alt="Card-Background">

            <div class="card-body position-relative z-index-1 p-3">
                <h6 @if ($card->text_color) style="color: {{ $card->text_color }} ;" @else style="color:#fff;" @endif
                    class="mt-0 mb-0 pb-0">
                    {{ Business::DisplayStoreName($card->user_id) }}
                    -
                    {{ Str::ucfirst($card->name) }}
                </h6>
                <div class="d-flex">
                    <div class="col-8">
                        <h6 @if ($card->text_color) style="color: {{ $card->text_color }} ;" @else style="color:#fff;" @endif
                            class="mt-3 mb-0 pb-0">
                            {{ Str::ucfirst($card->type) }}
                        </h6>
                        <h6 @if ($card->text_color) style="color: {{ $card->text_color }} ;" @else style="color:#fff;" @endif
                            class="mt-3 mb-0 pb-0">
                            {{ __('Card Code') }}
                        </h6>
                    </div>
                    <div class="col-4">
                        <div class=" mt-2 mb-3 pb-0" style="text-align: right;">
                            {!! QrCode::size(80)->generate('Card Code') !!}
                        </div>
                    </div>
                </div>
                <div class=" d-flex">
                    <div>
                        <p @if ($card->text_color) style="color: {{ $card->text_color }} ;" @else style="color:#fff;" @endif
                            class="text-sm opacity-8 mb-0">Expiry</p>
                        <h6 @if ($card->text_color) style="color: {{ $card->text_color }} ;" @else style="color:#fff;" @endif
                            class="mb-0">
                            {{ date('d/m/Y', strtotime($card->expires_at)) }}
                        </h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--End::Card-->
</div>
