@props(['id', 'iteration'])

<div id="unblock_user_{{ $iteration }}" class="modal fade admin_modal" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            {{-- <div class="popup_message modal-body d-flex flex-no-wrap align-items-center justify-content-between"> --}}
            <div class="modal-body d-flex flex-no-wrap align-items-center justify-content-between">

                <div>
                    <p class="p-0 text-start">You are about to unblock this user.</p>
                    <p class="p-0 text-start">Click "Confirm" to proceed.</p>
                </div>

                <a href="{{ route('user-unblock', $id) }}" role="button" class="general_button">CONFIRM</a>

                <button type="button" class="general_button" data-bs-dismiss="modal" aria-label="Close">CANCEL</button>

            </div>
        </div>
    </div>
</div>
