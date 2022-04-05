<aside
    class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark"
    id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
            aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0" href="{{ route('BusinessDashboard') }}">
            <i class="fas fa-tachometer-alt text-white"></i>
            <span class="ms-1 font-weight-bold text-white">
                {{ Setting::Logo() }}
            </span>
        </a>
    </div>
    <hr class="horizontal light mt-0 mb-2">
    <div class="collapse navbar-collapse  w-auto h-100" id="sidenav-collapse-main">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link text-white @if (Request::path() == 'Business/Dashboard') ? active bg-gradient-primary : '' @endif"
                    href="{{ route('BusinessDashboard') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fas fa-tachometer-alt"></i>
                    </div>
                    <span class="nav-link-text ms-1">
                        Dashboard
                    </span>
                </a>
            </li>
            <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">
                    Clients
                </h6>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white @if (Request::path() == 'Business/Clients') ? active bg-gradient-primary : '' @endif"
                    href="{{ route('BusinessClients') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fas fa-users"></i>
                    </div>
                    <span class="nav-link-text ms-1">
                        Clients
                    </span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white @if (Request::path() == 'Business/AddClient') ? active bg-gradient-primary : '' @endif"
                    href="{{ route('BusinessAddClient') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fas fa-plus"></i>
                    </div>
                    <span class="nav-link-text ms-1">
                        Add
                    </span>
                </a>
            </li>
            <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Account pages</h6>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white @if (Request::path() == 'Business/EditProfile') ? active bg-gradient-primary : '' @endif"
                    href="{{ route('BusinessEditProfile') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fas fa-user-cog"></i>
                    </div>
                    <span class="nav-link-text ms-1">Profile</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white @if (Request::path() == 'Business/EditPassword') ? active bg-gradient-primary : '' @endif"
                    href="{{ route('BusinessEditPassword') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fas fa-shield-alt"></i>
                    </div>
                    <span class="nav-link-text ms-1">Password</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white @if (Request::path() == 'Business/Settings') ? active bg-gradient-primary : '' @endif"
                    href="{{ route('BusinessSettings') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fas fa-cogs"></i>
                    </div>
                    <span class="nav-link-text ms-1">Settings</span>
                </a>
            </li>
        </ul>
    </div>
</aside>
