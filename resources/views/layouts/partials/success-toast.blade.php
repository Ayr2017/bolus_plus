@if(session()->hasAny('message'))
    <div class="toast-container position-fixed bottom-0 end-0 p-3">
        <div class="toast fade show " role="alert" aria-live="assertive" aria-atomic="true" id="liveToast">
            <div class="toast-header bg-success-subtle">
                <i class="bi bi-info-circle text-success fw-bolder"></i>
                <strong class="me-auto text-success">Message</strong>
                <small></small>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
                    <p class="text-success ">{{session()->get('message')}}</p>
            </div>
        </div>
    </div>
@endif
