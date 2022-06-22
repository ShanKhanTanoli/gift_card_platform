<div wire:ignore.self class="modal fade" id="ForgotPinModal" tabindex="-1" role="dialog"
    aria-labelledby="ForgotPinModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title font-weight-normal" id="ForgotPinModalLabel">
                    Forgot Pin
                </h5>
                <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form wire:submit.prevent='ForgotPin'>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="input-group input-group-static my-3">
                                <label for="email">Email</label>
                                <input type="email" wire:model.defer='email' value="{{ old('email') }}"
                                    class="form-control  @error('email') is-invalid @enderror"
                                    placeholder="Enter Email">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="input-group input-group-static my-3">
                                <label for="password">Password</label>
                                <input type="password" wire:model.defer='password' value="{{ old('password') }}"
                                    class="form-control  @error('password') is-invalid @enderror"
                                    placeholder="Enter Password">
                                @error('password')
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
                                Remove
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
