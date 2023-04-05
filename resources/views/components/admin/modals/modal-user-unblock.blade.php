@props(['id', 'iteration'])

<div id="unblock_user_{{ $iteration }}" class="modal fade" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body p-4">

                <div class="mb-4">
                    <p class="p-0 text-start">You are about to unblock this user.</p>
                    <p class="p-0 text-start">Click "Confirm" to proceed.</p>
                </div>

                <div class="d-flex justify-content-end">
                    <span class="me-2">
                        <a href="{{ route('user-unblock', $id) }}" class="general_button modal_button">CONFIRM</a>
                    </span>

                    <span>
                        <a class="general_button modal_button" data-bs-dismiss="modal" aria-label="Close">CANCEL</a>
                    </span>
                </div>

            </div>
        </div>
    </div>
</div>
