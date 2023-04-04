@props(['user_id'])

@if(session('connexion-cart'))
    <div id="message_modal" class="modal fade" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

                <div class="modal-content">
                    <div class="popup_message modal-body d-flex flex-no-wrap align-items-center justify-content-between">

                        <div>
                            <p class="p-0 text-start">You must be logged in to add a package to your cart.</p>
                            <p class="p-0 m-0 text-start">Thank you!</p>
                        </div>

                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                    </div>
                </div>

            </div>
        </div>
    </div>
@endif

@if (session('user-blocked'))
    <div id="message_modal" class="modal fade" tabindex="-1" aria-labelledby="unblockUserModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="popup_message modal-body d-flex flex-no-wrap align-items-center justify-content-between">

                    <div>
                        <p class="p-0 text-start">You are about to unblock this user.</p>
                        <p class="p-0 text-start">Click "Confirm" to proceed.</p>
                    </div>

                    <a href="{{ route('user-unblock', $user_id ) }}" role="button" data-bs-dismiss="modal" class="general_button">CONFIRM</a>

                    <button type="button" class="general_button" data-bs-dismiss="modal" aria-label="Close">CANCEL</button>

                </div>
            </div>
        </div>
    </div>
@endif
