<div class="container-fluid my-3 py-3">
    <div class="row mb-5">
        <!--Begin::Sidebar-->
        @include('livewire.admin.dashboard.settings.partials.sidebar')
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
                                    Update Settings
                                </h6>
                            </div>
                        </div>
                        <div class="card-body px-0 pb-2">
                            <div class="container">
                                <form wire:submit.prevent='Update'>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="input-group input-group-static my-3">
                                                <label for="company_name">Company Name</label>
                                                <input type="text" wire:model.defer='company_name'
                                                    value="{{ old('company_name') }}"
                                                    class="form-control  @error('company_name') is-invalid @enderror"
                                                    placeholder="Enter Company Name">
                                                @error('company_name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="input-group input-group-static my-3">
                                                <label for="company_email">Company Email</label>
                                                <input type="text" wire:model.defer='company_email'
                                                    value="{{ old('company_email') }}"
                                                    class="form-control  @error('company_email') is-invalid @enderror"
                                                    placeholder="Enter Company Email">
                                                @error('company_email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="input-group input-group-static my-3">
                                                <label for="company_phone">Company Phone</label>
                                                <input type="text" wire:model.defer='company_phone'
                                                    value="{{ old('company_phone') }}"
                                                    class="form-control  @error('company_phone') is-invalid @enderror"
                                                    placeholder="Enter Company Email">
                                                @error('company_phone')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="input-group input-group-static my-3">
                                                <label for="comission_percentage">Comission Percentage (%)</label>
                                                <input type="text" wire:model.defer='comission_percentage'
                                                    value="{{ old('comission_percentage') }}"
                                                    class="form-control  @error('comission_percentage') is-invalid @enderror"
                                                    placeholder="Enter Comission Percentage (%)">
                                                @error('comission_percentage')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="input-group input-group-static my-3">
                                                <label for="company_address">Company Address</label>
                                                <textarea wire:model.defer='company_address' class="form-control  @error('company_address') is-invalid @enderror"
                                                    cols="30" rows="10" placeholder="Enter Company Address">{{ old('company_address') }}</textarea>
                                                @error('company_address')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-md-6">
                                            <button type="submit" class="btn btn-primary" wire:attr='disabled'>
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
