<div class="container-fluid">
    @include('errors.alerts')
    <div class="row mt-3">
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                        <h6 class="text-white text-capitalize ps-3">
                            Add Voucher
                        </h6>
                    </div>
                </div>
                <div class="card-body px-0 pb-2">
                    <div class="container">
                        <form wire:submit.prevent='Add'>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="input-group input-group-static my-3">
                                        <label for="name">Name</label>
                                        <input type="text" wire:model.defer='name' value="{{ old('name') }}"
                                            class="form-control  @error('name') is-invalid @enderror"
                                            placeholder="Enter Name ">
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                @if(Business::count() > 0)
                                <div class="col-md-6">
                                    <div class="input-group input-group-static my-3">
                                        <label for="user_id">Business</label>
                                            <select wire:model.defer='user_id' class="form-control  @error('user_id') is-invalid @enderror">
                                                <option value="">Select Business</option>
                                                @foreach (Business::all()->latest()->get() as $business)
                                                <option value="{{ $business->id }}">
                                                    {{ $business->name }} - {{ $business->email }}
                                                </option> 
                                                @endforeach
                                            </select>
                                            @error('user_id')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                @endif
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
                                        <label for="visibility">Card Visibility</label>
                                        <select wire:model.defer='visibility'
                                            class="form-control  @error('visibility') is-invalid @enderror">
                                            <option value="">Select Visibility</option>
                                            <option value="1">Publish</option>
                                            <option value="0">Archive</option>
                                        </select>
                                        @error('visibility')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary" wire:attr='disabled'>
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
