<div class="profile-edit-main">
    {{-- Personal Information --}}
    <section class="profile-edit-card profile-edit-reveal">
        <div class="profile-edit-section-heading">
            <div class="profile-edit-section-icon personal">
                <i class="fas fa-user"></i>
            </div>

            <div>
                <h5>Personal Information</h5>
                <p>Update your name and account identity.</p>
            </div>
        </div>

        <div class="profile-edit-fields-grid">
            <div class="profile-edit-field">
                <label for="name">
                    Full Name <span>*</span>
                </label>

                <div class="profile-edit-input-wrapper">
                    <i class="fas fa-user input-icon"></i>
                    <input type="text" name="name" id="name"
                        class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $user->name) }}"
                        placeholder="Enter your full name" autocomplete="name">
                </div>

                @error('name')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>

            <div class="profile-edit-field">
                <label for="username">
                    Username <span>*</span>
                </label>

                <div class="profile-edit-input-wrapper">
                    <i class="fas fa-at input-icon"></i>
                    <input type="text" name="username" id="username"
                        class="form-control @error('username') is-invalid @enderror"
                        value="{{ old('username', $user->username) }}" placeholder="Enter your username"
                        autocomplete="username">
                </div>

                @error('username')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>

            <div class="profile-edit-field full-width">
                <label for="email">
                    Email Address <span>*</span>
                </label>

                <div class="profile-edit-input-wrapper">
                    <i class="fas fa-envelope input-icon"></i>
                    <input type="email" name="email" id="email"
                        class="form-control @error('email') is-invalid @enderror"
                        value="{{ old('email', $user->email) }}" placeholder="Enter your email address"
                        autocomplete="email">
                </div>

                @error('email')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>

        </div>
    </section>

    {{-- Contact Information --}}
    <section class="profile-edit-card profile-edit-reveal">
        <div class="profile-edit-section-heading">
            <div class="profile-edit-section-icon contact">
                <i class="fas fa-address-book"></i>
            </div>

            <div>
                <h5>Contact Information</h5>
                <p>Keep your registered phone numbers up to date.</p>
            </div>
        </div>

        <div class="profile-edit-fields-grid">
            <div class="profile-edit-field">
                <label for="phone">Primary Phone</label>
                <div class="profile-edit-input-wrapper">
                    <i class="fas fa-phone input-icon"></i>
                    <input type="tel" name="phone" id="phone"
                        class="form-control @error('phone') is-invalid @enderror"
                        value="{{ old('phone', $user->phone) }}" placeholder="Enter primary phone" autocomplete="tel">
                </div>

                @error('phone')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>

            <div class="profile-edit-field">
                <label for="phone_2">Alternative Phone</label>
                <div class="profile-edit-input-wrapper">
                    <i class="fas fa-mobile-alt input-icon"></i>
                    <input type="tel" name="phone_2" id="phone_2"
                        class="form-control @error('phone_2') is-invalid @enderror"
                        value="{{ old('phone_2', $user->phone_2) }}" placeholder="Enter alternative phone">
                </div>

                @error('phone_2')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>

        </div>
    </section>

    {{-- Profile Picture --}}
    <section class="profile-edit-card profile-edit-reveal">
        <div class="profile-edit-section-heading">
            <div class="profile-edit-section-icon picture">
                <i class="fas fa-image"></i>
            </div>

            <div>
                <h5>Profile Picture</h5>
                <p>Choose a professional image for your account.</p>
            </div>
        </div>

        <div class="profile-picture-upload">
            <div class="profile-picture-preview">
                <img src="{{ $user->profile_picture ? asset($user->profile_picture) : asset('uploads/images/default.jpg') }}"
                    id="profileImagePreviewSecondary" alt="Profile preview">
            </div>

            <div class="profile-picture-upload-content">

                <label for="profile_picture" class="profile-picture-upload-btn">
                    <i class="fas fa-cloud-upload-alt"></i>
                    Choose Image
                </label>

                <input type="file" name="profile_picture" id="profile_picture"
                    class="d-none @error('profile_picture') is-invalid @enderror"
                    accept="image/jpeg,image/png,image/jpg,image/webp">

                <p>JPG, JPEG, PNG or WEBP. Follow your server's upload size limit.</p>

                <span id="profileImageFileName">
                    No new image selected
                </span>

                @error('profile_picture')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>
        </div>
    </section>

    {{-- Password Management --}}
    <section class="profile-edit-card profile-edit-reveal">
        <div class="profile-edit-section-heading">
            <div class="profile-edit-section-icon security">
                <i class="fas fa-lock"></i>
            </div>

            <div>
                <h5>Change Password</h5>
                <p>Leave these fields empty if you don't want to change your password.</p>
            </div>
        </div>

        <div class="profile-password-notice">
            <i class="fas fa-info-circle"></i>
            Your current password is to change your password.
        </div>

        <div class="profile-edit-fields-grid">
            <div class="profile-edit-field full-width">
                <label for="current_password">Current Password</label>
                <div class="profile-password-input">
                    <input type="password" name="current_password" id="current_password"
                        class="form-control @error('current_password') is-invalid @enderror"
                        placeholder="Enter your current password" autocomplete="current-password">

                    <button type="button" class="toggle-password" data-target="current_password"
                        aria-label="Show current password">
                        <i class="fas fa-eye"></i>
                    </button>
                </div>

                @error('current_password')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>

            <div class="profile-edit-field">
                <label for="new_password">New Password</label>
                <div class="profile-password-input">
                    <input type="password" name="new_password" id="new_password"
                        class="form-control @error('new_password') is-invalid @enderror"
                        placeholder="Enter new password" autocomplete="new-password">

                    <button type="button" class="toggle-password" data-target="new_password"
                        aria-label="Show new password">
                        <i class="fas fa-eye"></i>
                    </button>
                </div>

                @error('new_password')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror

                <div class="profile-password-strength" id="passwordStrengthWrapper">
                    <div class="profile-password-strength-track">
                        <span id="passwordStrengthBar"></span>
                    </div>
                    <small id="passwordStrengthText">Password strength</small>
                </div>
            </div>

            <div class="profile-edit-field">
                <label for="confirm_password">Confirm New Password</label>

                <div class="profile-password-input">
                    <input type="password" name="confirm_password" id="confirm_password"
                        class="form-control @error('confirm_password') is-invalid @enderror"
                        placeholder="Confirm new password" autocomplete="new-password">

                    <button type="button" class="toggle-password" data-target="confirm_password"
                        aria-label="Show confirmation password">
                        <i class="fas fa-eye"></i>
                    </button>
                </div>

                @error('confirm_password')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror

                <small class="profile-password-match" id="passwordMatchText"></small>
            </div>
        </div>
    </section>
</div>
