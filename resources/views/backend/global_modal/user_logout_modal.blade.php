
<div class="modal fade auth-notification-modal" id="logoutWelcomeModal"
     tabindex="-1" aria-labelledby="logoutWelcomeModalLabel"
     aria-hidden="true" data-auth-notification-modal>

    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <div class="modal-body text-center p-4 p-md-5">

                <div class="auth-notification-icon logout">
                    <i class="fas fa-door-open"></i>
                </div>

                <h5 class="auth-notification-title" id="logoutWelcomeModalLabel">
                    Successfully Logged Out
                </h5>

                <p class="auth-notification-message">
                    {{ session('logout_success', 'Your session has ended safely. Thank you for visiting!') }}
                </p>

                <a href="{{ url('/') }}" class="btn auth-notification-btn logout">
                    Back to Home
                </a>

            </div>
        </div>
    </div>
</div>
