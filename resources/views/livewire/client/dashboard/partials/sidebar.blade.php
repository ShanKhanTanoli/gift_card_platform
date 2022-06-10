<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 fixed-start  bg-gradient-dark" id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
            aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0" href="{{ route('ClientDashboard') }}">
            <span class="ms-1 font-weight-bold text-white">
                {{ Setting::Logo() }}
            </span>
        </a>
    </div>
    <hr class="horizontal light mt-0 mb-2">
    <div class="collapse navbar-collapse  w-auto h-100" id="sidenav-collapse-main">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link text-white @if (Request::path() == 'Client/Dashboard') ? active bg-gradient-primary : '' @endif"
                    href="{{ route('ClientDashboard') }}">
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
                    Cards
                </h6>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white @if (Request::path() == 'Client/Cards') active bg-gradient-primary @else '' @endif"
                    href="{{ route('ClientCards') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fas fa-credit-card"></i>
                    </div>
                    <span class="nav-link-text ms-1">
                        Cards
                    </span>
                </a>
            </li>
            <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">
                    Tickets
                </h6>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white @if (Request::path() == 'Client/Tickets') active bg-gradient-primary @else '' @endif"
                    href="{{ route('ClientTickets') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fas fa-ticket-alt"></i>
                    </div>
                    <span class="nav-link-text ms-1">
                        Tickets
                    </span>
                </a>
            </li>
            <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">
                    Vouchers
                </h6>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white @if (Request::path() == 'Client/Vouchers') active bg-gradient-primary @else '' @endif"
                    href="{{ route('ClientVouchers') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fas fa-credit-card"></i>
                    </div>
                    <span class="nav-link-text ms-1">
                        Vouchers
                    </span>
                </a>
            </li>
            <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">
                    Payments
                </h6>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white @if (Request::path() == 'Client/Payments') active bg-gradient-primary @else '' @endif"
                    href="{{ route('ClientPayments') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fas fa-money-bill"></i>
                    </div>
                    <span class="nav-link-text ms-1">
                        Payments
                    </span>
                </a>
            </li>
            <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Configure</h6>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white @if (Request::path() == 'Client/Settings/Profile' or Request::path() == 'Client/Settings/Password') active bg-gradient-primary @else '' @endif"
                    href="{{ route('ClientEditProfile') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fas fa-cog"></i>
                    </div>
                    <span class="nav-link-text ms-1">Settings</span>
                </a>
            </li>
            <hr>
            <!--Begin::Logout-->
            @livewire('auth.logout')
            <!--Begin::Logout-->
        </ul>
    </div>
</aside>
