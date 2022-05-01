<div class="col-lg-3">
    <div class="card position-sticky">
        <ul class="nav flex-column bg-white border-radius-lg p-3">
            <li wire:ignore.self
                class="nav-item @if (Request::path() == 'Client/Settings/Profile') active bg-gradient-primary @else @endif">
                <a wire:ignore.self
                    class="nav-link text-dark d-flex @if (Request::path() == 'Client/Settings/Profile') active text-white @else @endif"
                    href="{{ route('ClientEditProfile') }}">
                    <i class="fas fa-user-edit me-2"></i>
                    <span class="text-sm">Profile</span>
                </a>
            </li>
            <li wire:ignore.self
                class="nav-item @if (Request::path() == 'Client/Settings/Password') active bg-gradient-primary @else @endif">
                <a wire:ignore.self
                    class="nav-link text-dark d-flex @if (Request::path() == 'Client/Settings/Password') active text-white @else @endif"
                    href="{{ route('ClientEditPassword') }}">
                    <i class="fas fa-lock me-2"></i>
                    <span class="text-sm">Password</span>
                </a>
            </li>
        </ul>
    </div>
</div>
