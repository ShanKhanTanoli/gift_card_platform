<div wire:ignore.self class="modal fade" id="delete-notification" tabindex="-1" role="dialog"
    aria-labelledby="modal-notification" aria-hidden="true">
    <div class="modal-dialog modal-danger modal-dialog-centered modal-" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="py-3 text-center">
                    <i class="fas fa-exclamation-triangle fa-4x text-danger">
                    </i>
                    <h4 class="mt-3">
                        Are you sure you want to delete?
                    </h4>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-lg btn-block bg-gradient-danger"
                    wire:click='Delete("{{ $delete->id }}")'>
                    <span wire:loading wire:target='Delete("{{ $delete->id }}")'
                        class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                    DELETE
                </button>
                <button type="button" class="btn btn-lg btn-block bg-gradient-dark"
                    data-bs-dismiss="modal">CANCEL</button>
            </div>
        </div>
    </div>
</div>
