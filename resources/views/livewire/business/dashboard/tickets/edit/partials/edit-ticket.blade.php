<div class="col-4">
    <!--Begin::Card-->
    <div class="card bg-transparent shadow-xl" id="PrintDev">
        <div class="overflow-hidden position-relative border-radius-xl">

            @if ($temporary_image)
                <img src="{{ $temporary_image->temporaryUrl() }}"
                    class="position-absolute start-0 top-0 w-100 z-index-1 h-100" alt="Card-Background">
            @else
                <img src="@if ($card->background) {{ asset(Storage::url($card->background)) }} @else {{ asset('dashboard/img/illustrations/bg-3.jpg') }} @endif"
                    class="position-absolute start-0 top-0 w-100 z-index-1 h-100" alt="Card-Background">
            @endif

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

    <!--Begin::Customize Card-->
    <div class="card my-4">
        <div class="card-body px-0 pb-2">
            <div class="container">
                <form wire:submit.prevent='Customize'>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="input-group input-group-static my-3">
                                <label for="text_color">Text Color</label>
                                <input type="color" wire:model.defer='text_color' value="{{ old('text_color') }}"
                                    class="form-control  @error('text_color') is-invalid @enderror"
                                    placeholder="Select Color">
                                @error('text_color')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="input-group input-group-static my-3">
                                <label for="background">Background</label>
                                <input style="display: none;" id="background" type="file" wire:model.defer='temporary_image'
                                    value="{{ old('temporary_image') }}"
                                    class="form-control  @error('temporary_image') is-invalid @enderror"
                                    placeholder="Select Background">
                                @error('temporary_image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <button type="button" id="ChangeBG" class="btn btn-link p-0" wire:attr='disabled'>
                                <span wire:loading wire:target='ChangeBG' class="spinner-border spinner-border-sm"
                                    role="status" aria-hidden="true"></span>
                                <i class="fas fa-upload"></i> Change Background
                            </button>
                        </div>
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary" wire:attr='disabled'>
                                <span wire:loading wire:target='Customize' class="spinner-border spinner-border-sm"
                                    role="status" aria-hidden="true"></span>
                                Save Changes
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--End::Customize Card-->

    @section('scripts')
        <script>
            $(document).ready(function() {
                $("#ChangeBG").on('click', function() {
                    $("#background").click();
                });
            });
        </script>
    @endsection

</div>
