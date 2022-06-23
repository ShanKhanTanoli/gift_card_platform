<div wire:ignore.self class="modal fade" id="RemovePinModal" tabindex="-1" role="dialog"
    aria-labelledby="RemovePinModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title font-weight-normal" id="RemovePinModalLabel">
                    Remove Pin
                </h5>
                <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form wire:submit.prevent='RemovePin'>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="input-group input-group-static my-3">
                                <label for="pin">Pin Code</label>
                                <input type="password" wire:model.defer='pin' value="{{ old('pin') }}"
                                    class="form-control  @error('pin') is-invalid @enderror"
                                    placeholder="Enter Pin Code">
                                @error('pin')
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
