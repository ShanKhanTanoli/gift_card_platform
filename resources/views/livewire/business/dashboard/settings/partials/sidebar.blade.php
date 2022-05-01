<div class="col-lg-3">
    <div class="card position-sticky">
        <ul class="nav flex-column bg-white border-radius-lg p-3">
            <li wire:ignore.self
                class="nav-item @if (Request::path() == 'Business/Settings/BusinessDetails') active bg-gradient-primary @else @endif">
                <a wire:ignore.self
                    class="nav-link text-dark d-flex @if (Request::path() == 'Business/Settings/BusinessDetails') active text-white @else @endif"
                    href="{{ route('BusinessEditDetails') }}">
                    <i class="fas fa-info-circle me-2"></i>
                    <span class="text-sm">Business</span>
                </a>
            </li>
            <li wire:ignore.self
                class="nav-item @if (Request::path() == 'Business/Settings/Store') active bg-gradient-primary @else @endif">
                <a wire:ignore.self
                    class="nav-link text-dark d-flex @if (Request::path() == 'Business/Settings/Store') active text-white @else @endif"
                    href="{{ route('BusinessEditStore') }}">
                    <i class="fas fa-shopping-bag me-2"></i>
                    <span class="text-sm">Store</span>
                </a>
            </li>
            <li wire:ignore.self
                class="nav-item @if (Request::path() == 'Business/Settings/Profile') active bg-gradient-primary @else @endif">
                <a wire:ignore.self
                    class="nav-link text-dark d-flex @if (Request::path() == 'Business/Settings/Profile') active text-white @else @endif"
                    href="{{ route('BusinessEditProfile') }}">
                    <i class="fas fa-user-edit me-2"></i>
                    <span class="text-sm">Profile</span>
                </a>
            </li>
            <li wire:ignore.self
                class="nav-item @if (Request::path() == 'Business/Settings/Password') active bg-gradient-primary @else @endif">
                <a wire:ignore.self
                    class="nav-link text-dark d-flex @if (Request::path() == 'Business/Settings/Password') active text-white @else @endif"
                    href="{{ route('BusinessEditPassword') }}">
                    <i class="fas fa-lock me-2"></i>
                    <span class="text-sm">Password</span>
                </a>
            </li>
        </ul>
    </div>
</div>
