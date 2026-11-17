
<div class="modal fade auth-notification-modal" id="loginWelcomeModal"
     tabindex="-1" aria-labelledby="loginWelcomeModalLabel"
     aria-hidden="true" data-auth-notification-modal>

    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <div class="modal-body text-center p-4 p-md-5">

                <div class="auth-notification-icon success">
                    <i class="fas fa-hand-sparkles"></i>
                </div>

                <h5 class="auth-notification-title" id="loginWelcomeModalLabel">
                    Welcome Back!
                </h5>

                <p class="auth-notification-message">
                    {{ session('login_success', 'You are successfully logged in.') }}
                </p>

                <button type="button" class="btn auth-notification-btn success"
                        data-bs-dismiss="modal">
                    Continue
                </button>

            </div>
        </div>
    </div>
</div>
