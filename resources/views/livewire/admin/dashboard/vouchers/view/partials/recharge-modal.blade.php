<div wire:ignore.self class="modal fade" id="RechargeModal" tabindex="-1" role="dialog"
    aria-labelledby="RechargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title font-weight-normal" id="RechargeModalLabel">
                    Recharge Card
                </h5>
                <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row">
                        <div class="col-md-12">
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
                        <div class="col-md-12">
                            <button type="button" class="btn btn-primary" wire:attr='disabled' wire:click='Recharge'>
                                <span wire:loading class="spinner-border spinner-border-sm" role="status"
                                    aria-hidden="true"></span>
                                Recharge
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
