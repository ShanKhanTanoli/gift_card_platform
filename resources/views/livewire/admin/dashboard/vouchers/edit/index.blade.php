<div class="container-fluid">
    @include('errors.alerts')
    <div class="row mt-3">
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                        <h6 class="text-white text-capitalize ps-3">
                            Update Card
                        </h6>
                    </div>
                </div>
                <div class="card-body px-0 pb-2">
                    <div class="container">
                        <form>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="input-group input-group-static my-3">
                                        <label for="price">Price
                                            ({{ strtoupper(Business::Currency(Auth::user()->id)) }})</label>
                                        <input type="text" wire:model.defer='price' value="{{ old('price') }}"
                                            class="form-control  @error('price') is-invalid @enderror"
                                            placeholder="Enter Price ({{ strtoupper(Business::Currency(Auth::user()->id)) }})">
                                        @error('price')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-group input-group-static my-3">
                                        <label for="balance">Balance Amount
                                            ({{ strtoupper(Business::Currency(Auth::user()->id)) }})</label>
                                        <input type="text" wire:model.defer='balance' value="{{ old('balance') }}"
                                            class="form-control  @error('balance') is-invalid @enderror"
                                            placeholder="Enter Balance Amount ({{ strtoupper(Business::Currency(Auth::user()->id)) }})">
                                        @error('balance')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-group input-group-static my-3">
                                        <label for="expires_at">Expiry Date</label>
                                        <input type="date" wire:model.defer='expires_at'
                                            value="{{ old('expires_at') }}"
                                            class="form-control  @error('expires_at') is-invalid @enderror"
                                            placeholder="Enter Expiry Date">
                                        @error('expires_at')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-group input-group-static my-3">
                                        <label for="user_id">Card Owner</label>
                                        <select wire:model.defer='user_id'
                                            class="form-control  @error('user_id') is-invalid @enderror">
                                            <option value="">Select Owner</option>
                                            @forelse(Business::All()->get() as $business)
                                                <option value="{{ $business->id }}">
                                                    Name : {{ $business->name }}
                                                    Email : {{ $business->email }}
                                                </option>
                                            @empty
                                                <option value="">Please Add Business</option>
                                            @endforelse
                                        </select>
                                        @error('user_id')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <button type="button" class="btn btn-primary" wire:attr='disabled'
                                        wire:click='Update'>
                                        <span wire:loading class="spinner-border spinner-border-sm" role="status"
                                            aria-hidden="true"></span>
                                        Save Changes
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
