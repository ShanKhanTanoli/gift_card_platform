<div class="container-fluid">
    @include('errors.alerts')
    <div class="row mt-3">
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                        <h6 class="text-white text-capitalize ps-3">
                            Add Card
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
                                        <label for="balance">Usable Amount
                                            ({{ strtoupper(Business::Currency(Auth::user()->id)) }})</label>
                                        <input type="text" wire:model.defer='balance' Usable="{{ old('balance') }}"
                                            class="form-control  @error('balance') is-invalid @enderror"
                                            placeholder="Enter Usable Amount ({{ strtoupper(Business::Currency(Auth::user()->id)) }})">
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
                                        <label for="voucher_category_id">Card Category</label>
                                        <select wire:model.defer='voucher_category_id'
                                            class="form-control  @error('voucher_category_id') is-invalid @enderror">
                                            <option value="">Select Category</option>
                                            @forelse(Business::CardCategories(Auth::user()->id)->get() as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @empty
                                                <option value="">Please Add Category</option>
                                            @endforelse
                                        </select>
                                        @error('voucher_category_id')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="input-group input-group-static my-3">
                                        <label for="quantity">Cards Quantity</label>
                                        <select wire:model.defer='quantity'
                                            class="form-control  @error('quantity') is-invalid @enderror">
                                            <option value="">Select Quantity</option>
                                            @for ($i = 1; $i < 21; $i++)
                                                <option value="{{ $i }}">{{ $i }}
                                                </option>
                                            @endfor
                                        </select>
                                        @error('quantity')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <button type="button" class="btn btn-primary" wire:attr='disabled' wire:click='Add'>
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
