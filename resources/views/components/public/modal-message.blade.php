@if (session('connexion-cart'))
    <div id="message_modal" class="modal fade" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

                <div class="modal-content">
                    <div class="popup_message modal-body d-flex flex-no-wrap align-items-center justify-content-between">

                        <div>
                            <p class="p-0 text-start">You must be logged in to add a package to your cart.</p>
                            <p class="p-0 m-0 text-start">Thank you!</p>
                        </div>

                        <button type="button" class="btn-close" data-bs-dismiss="modal" data-bs-target="#my-modal" aria-label="Close"></button>

                    </div>
                </div>

            </div>
        </div>
    </div>
@endif
