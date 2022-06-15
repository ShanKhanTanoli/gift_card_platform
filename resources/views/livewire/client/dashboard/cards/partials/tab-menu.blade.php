<div class="col-lg-3">
    <div class="card position-sticky">
        <ul class="nav flex-column bg-white border-radius-lg p-3">
            <li wire:ignore.self
                class="nav-item @if (Request::path() == 'Client/Settings/Profile') active bg-gradient-primary @else @endif">
                <a wire:ignore.self
                    class="nav-link text-dark d-flex @if (Request::path() == 'Client/Settings/Profile') active text-white @else @endif"
                    href="{{ route('ClientEditProfile') }}">
                    <i class="fas fa-universal-access me-2"></i>
                    <span class="text-sm">Accessability</span>
                </a>
            </li>
            <li wire:ignore.self
                class="nav-item @if (Request::path() == 'Client/Settings/Password') active bg-gradient-primary @else @endif">
                <a wire:ignore.self
                    class="nav-link text-dark d-flex @if (Request::path() == 'Client/Settings/Password') active text-white @else @endif"
                    href="{{ route('ClientEditPassword') }}">
                    <i class="fas fa-key me-2"></i>
                    <span class="text-sm">Pin Code</span>
                </a>
            </li>
            <li wire:ignore.self
                class="nav-item @if (Request::path() == 'Client/Settings/Password') active bg-gradient-primary @else @endif">
                <a wire:ignore.self
                    class="nav-link text-dark d-flex @if (Request::path() == 'Client/Settings/Password') active text-white @else @endif"
                    href="#">
                    <i class="fas fa-money-bill me-2"></i>
                    <span class="text-sm">Recharge</span>
                </a>
            </li>
        </ul>
    </div>
</div>
