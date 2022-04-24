<div class="container-fluid my-3 py-3">
    <div class="row mb-5">
        <!--Begin::Sidebar-->
        @include('livewire.business.dashboard.settings.partials.sidebar')
        <!--Begin::Sidebar-->
        <div class="col-lg-9 mt-lg-0">
            <!--Begin::Alerts-->
            @include('errors.alerts')
            <!--End::Alerts-->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                            <div class="bg-primary shadow-primary border-radius-lg pt-4 pb-3">
                                <h6 class="text-white text-capitalize ps-3">
                                    Update Profile
                                </h6>
                            </div>
                        </div>
                        <div class="card-body px-0 pb-2">
                            <div class="container">
                                <form>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="input-group input-group-static my-3">
                                                <label for="name">Name</label>
                                                <input type="text" wire:model.defer='name'
                                                    value="{{ old('name') }}"
                                                    class="form-control  @error('name') is-invalid @enderror"
                                                    placeholder="Enter Name">
                                                @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="input-group input-group-static my-3">
                                                <label for="user_name">User Name</label>
                                                <input type="text" wire:model.defer='user_name'
                                                    value="{{ old('user_name') }}"
                                                    class="form-control  @error('user_name') is-invalid @enderror"
                                                    placeholder="Enter User Name">
                                                @error('user_name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="input-group input-group-static my-3">
                                                <label for="email">Email</label>
                                                <input type="email" wire:model.defer='email'
                                                    value="{{ old('email') }}"
                                                    class="form-control  @error('email') is-invalid @enderror"
                                                    placeholder="Enter Email">
                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="input-group input-group-static my-3">
                                                <label for="number">Number</label>
                                                <input type="text" wire:model.defer='number'
                                                    value="{{ old('number') }}"
                                                    class="form-control  @error('number') is-invalid @enderror"
                                                    placeholder="Enter Number">
                                                @error('number')
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
                                                wire:click='UpdateProfile'>
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
