@if (Session::has('success'))
    <div class="position-fixed bottom-1 end-1 z-index-2">
        <div class="toast fade show p-2 mt-2 bg-success" role="alert" aria-live="assertive" id="dangerToast"
            aria-atomic="true">
            <div class="toast-header border-0 bg-success">
                <span class="me-auto text-white font-weight-bold">
                    <strong>
                        {{ Session::get('success') }}
                    </strong>
                </span>
                <i class="fas fa-times text-md ms-3 cursor-pointer text-white" data-bs-dismiss="toast"
                    aria-label="Close"></i>
            </div>
        </div>
    </div>
@endif

@if (Session::has('error'))
    <div class="position-fixed bottom-1 end-1 z-index-2">
        <div class="toast fade show p-2 mt-2 bg-danger" role="alert" aria-live="assertive" id="dangerToast"
            aria-atomic="true">
            <div class="toast-header border-0 bg-danger">
                <span class="me-auto text-white font-weight-bold">
                    <strong>
                        {{ Session::get('error') }}
                    </strong>
                </span>
                <i class="fas fa-times text-md ms-3 cursor-pointer text-white" data-bs-dismiss="toast"
                    aria-label="Close"></i>
            </div>
        </div>
    </div>
@endif
