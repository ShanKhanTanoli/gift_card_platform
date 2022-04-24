<div class="container-fluid my-3 py-3">
    <div class="row mb-5">
        <!--Begin::Sidebar-->
        @include(
            'livewire.business.dashboard.settings.partials.sidebar'
        )
        <!--Begin::Sidebar-->
        <div class="col-lg-9 mt-lg-0 mt-4">
            <!--Begin::Alerts-->
            @include('errors.alerts')
            <!--End::Alerts-->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                            <div class="bg-primary shadow-primary border-radius-lg pt-4 pb-3">
                                <h6 class="text-white text-capitalize ps-3">
                                    Update Business Details
                                </h6>
                            </div>
                        </div>
                        <div class="card-body px-0 pb-2">
                            <div class="container">
                                <form>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="input-group input-group-static my-3">
                                                <label for="business_name">Business Name</label>
                                                <input type="text" wire:model.defer='business_name'
                                                    value="{{ old('business_name') }}"
                                                    class="form-control  @error('business_name') is-invalid @enderror"
                                                    placeholder="Enter Business Name">
                                                @error('business_name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="input-group input-group-static my-3">
                                                <label for="business_email">Business Email</label>
                                                <input type="text" wire:model.defer='business_email'
                                                    value="{{ old('business_email') }}"
                                                    class="form-control  @error('business_email') is-invalid @enderror"
                                                    placeholder="Enter Business Email">
                                                @error('business_email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="input-group input-group-static my-3">
                                                <label for="business_phone">Business Phone</label>
                                                <input type="text" wire:model.defer='business_phone'
                                                    value="{{ old('business_phone') }}"
                                                    class="form-control  @error('business_phone') is-invalid @enderror"
                                                    placeholder="Enter Business Email">
                                                @error('business_phone')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="input-group input-group-static my-3">
                                                <label for="currency_id">Currency</label>
                                                <select wire:model.defer='currency_id'
                                                    class="form-control  @error('currency_id') is-invalid @enderror">
                                                    <option value="">Select Currency</option>
                                                    @forelse (Currency::all() as $currency)
                                                        <option value="{{ $currency->id }}">
                                                            {{ strtoupper($currency->name) }}
                                                        </option>
                                                    @empty
                                                        <option value="">No currency found</option>
                                                    @endforelse
                                                </select>
                                                @error('currency_id')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="input-group input-group-static my-3">
                                                <label for="business_address">Business Address</label>
                                                <textarea wire:model.defer='business_address' class="form-control  @error('business_address') is-invalid @enderror"
                                                    cols="30" rows="10"
                                                    placeholder="Enter Business Address">{{ old('business_address') }}</textarea>
                                                @error('business_address')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-md-6">
                                            <button type="button" class="btn btn-primary" wire:attr='disabled'
                                                wire:click='Update'>
                                                <span wire:loading class="spinner-border spinner-border-sm"
                                                    role="status" aria-hidden="true"></span>
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
    </div>
</div>
