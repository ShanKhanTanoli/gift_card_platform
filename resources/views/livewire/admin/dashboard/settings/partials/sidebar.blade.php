<div class="col-lg-3">
    <div class="card position-sticky">
        <ul class="nav flex-column bg-white border-radius-lg p-3">
            <li wire:ignore.self class="nav-item @if (Request::path() == 'Admin/Settings/General') active bg-gradient-primary @else @endif">
                <a wire:ignore.self
                    class="nav-link text-dark d-flex @if (Request::path() == 'Admin/Settings/General') active text-white @else @endif"
                    href="{{ route('AdminSettings') }}">
                    <i class="fas fa-cog me-2"></i>
                    <span class="text-sm">General</span>
                </a>
            </li>
            <li wire:ignore.self class="nav-item @if (Request::path() == 'Admin/Settings/Profile') active bg-gradient-primary @else @endif">
                <a wire:ignore.self
                    class="nav-link text-dark d-flex @if (Request::path() == 'Admin/Settings/Profile') active text-white @else @endif"
                    href="{{ route('AdminEditProfile') }}">
                    <i class="fas fa-user-edit me-2"></i>
                    <span class="text-sm">Profile</span>
                </a>
            </li>
            <li wire:ignore.self class="nav-item @if (Request::path() == 'Admin/Settings/Currency') active bg-gradient-primary @else @endif">
                <a wire:ignore.self
                    class="nav-link text-dark d-flex @if (Request::path() == 'Admin/Settings/Currency') active text-white @else @endif"
                    href="{{ route('AdminCurrency') }}">
                    <i class="fas fa-coins me-2"></i>
                    <span class="text-sm">Currency</span>
                </a>
            </li>
            <li wire:ignore.self class="nav-item @if (Request::path() == 'Admin/Settings/Stripe') active bg-gradient-primary @else @endif">
                <a wire:ignore.self
                    class="nav-link text-dark d-flex @if (Request::path() == 'Admin/Settings/Stripe') active text-white @else @endif"
                    href="{{ route('AdminStripe') }}">
                    <i class="fab fa-cc-stripe me-2"></i>
                    <span class="text-sm">Stripe</span>
                </a>
            </li>
            <li wire:ignore.self class="nav-item @if (Request::path() == 'Admin/Settings/Password') active bg-gradient-primary @else @endif">
                <a wire:ignore.self
                    class="nav-link text-dark d-flex @if (Request::path() == 'Admin/Settings/Password') active text-white @else @endif"
                    href="{{ route('AdminEditPassword') }}">
                    <i class="fas fa-lock me-2"></i>
                    <span class="text-sm">Password</span>
                </a>
            </li>
        </ul>
    </div>
</div>
