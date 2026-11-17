@php
    $logout_url = View::getSection('logout_url') ?? config('adminlte.logout_url', 'logout');
    $profile_url = View::getSection('profile_url') ?? 'user_profile';

    $user = Auth::user();

    if (config('adminlte.usermenu_profile_url', false)) {
        $profile_url = $user->adminlte_profile_url();
    }

    if (config('adminlte.use_route_url', false)) {
        $profile_url = $profile_url ? route($profile_url) : '';
        $logout_url = $logout_url ? route($logout_url) : '';
    } else {
        $profile_url = $profile_url ? url($profile_url) : '';
        $logout_url = $logout_url ? url($logout_url) : '';
    }
@endphp

<li class="nav-item dropdown user-menu premium-user-menu">

    {{-- User Menu Toggle --}}
    <a href="#" class="nav-link dropdown-toggle premium-user-toggle" data-toggle="dropdown" aria-expanded="false">

        @if (config('adminlte.usermenu_image'))
            <img src="{{ $user->adminlte_image() }}" class="user-image premium-user-image" alt="{{ $user->name }}">
        @else
            <span class="premium-user-avatar">
                {{ strtoupper(substr($user->name, 0, 1)) }}
            </span>
        @endif

        <span class="premium-user-name">
            {{ $user->name }}
        </span>

        <i class="fas fa-chevron-down premium-user-chevron"></i>
    </a>

    {{-- Premium User Dropdown --}}
    <ul class="dropdown-menu dropdown-menu-right premium-user-dropdown">

        {{-- Profile Header --}}
        <li class="premium-user-header">
            <div class="premium-user-header-content">

                @if (config('adminlte.usermenu_image'))
                    <img src="{{ $user->adminlte_image() }}" class="premium-user-header-image"
                        alt="{{ $user->name }}">
                @else
                    <div class="premium-user-header-avatar">
                        {{ strtoupper(substr($user->name, 0, 1)) }}
                    </div>
                @endif

                <div class="premium-user-header-info">
                    <h6>{{ $user->name }}</h6>
                    <span>
                        <i class="fas fa-circle"></i>
                        Account
                    </span>
                </div>

            </div>
        </li>

        {{-- Account Menu --}}
        <li class="premium-user-menu-items">

            <a href="{{ $profile_url ?: '#' }}" class="premium-user-menu-item">

                <span class="premium-menu-icon profile">
                    <i class="fas fa-user"></i>
                </span>

                <span class="premium-menu-content">
                    <strong>My Profile</strong>
                    <small>View and update your profile</small>
                </span>

                <i class="fas fa-angle-right premium-menu-arrow"></i>
            </a>

            <a href="{{ route('settings.index') }}" class="premium-user-menu-item">

                <span class="premium-menu-icon settings">
                    <i class="fas fa-cog"></i>
                </span>

                <span class="premium-menu-content">
                    <strong>Settings</strong>
                    <small>Manage your preferences</small>
                </span>

                <i class="fas fa-angle-right premium-menu-arrow"></i>
            </a>

        </li>

        {{-- Logout --}}
        <li class="premium-user-logout-wrapper">

            <a href="#" class="premium-user-menu-item premium-user-logout"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">

                <span class="premium-menu-icon logout">
                    <i class="fas fa-power-off"></i>
                </span>

                <span class="premium-menu-content">
                    <strong>Sign Out</strong>
                    <small>Securely end your session</small>
                </span>

                <i class="fas fa-angle-right premium-menu-arrow"></i>
            </a>

            <form id="logout-form" action="{{ $logout_url }}" method="POST" class="d-none">
                @if (config('adminlte.logout_method'))
                    {{ method_field(config('adminlte.logout_method')) }}
                @endif

                {{ csrf_field() }}
            </form>

        </li>

    </ul>

</li>
