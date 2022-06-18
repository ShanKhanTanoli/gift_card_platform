  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center header-transparent">
      <div class="container d-flex align-items-center justify-content-between">
          <div class="logo">
              <h1>
                  <a class="navbar-brand font-weight-bolder ms-lg-0 ms-3"
                      href="{{ route('StorePage', $store->store_name) }}">
                      @if ($store = Business::Store($business))
                          {{ $store->store_name }}
                      @else
                          {{ Setting::Logo() }}
                      @endif
                  </a>
              </h1>
          </div>
          <nav id="navbar" class="navbar">
              <ul>
                  @if (Request::path() == 'Store/' . $store->store_name)
                      <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
                      <li><a class="nav-link scrollto" href="#about">About</a></li>
                      @if ($store->display_cards)
                          <li><a class="nav-link scrollto" href="#cards">Cards</a></li>
                      @endif
                      @if ($store->display_cards)
                          <li><a class="nav-link scrollto" href="#tickets">Tickets</a></li>
                      @endif
                      @if ($store->display_cards)
                          <li><a class="nav-link scrollto" href="#vouchers">Vouchers</a></li>
                      @endif
                  @endif
                  @if (Auth::user())
                      <li>
                          <a class="nav-link scrollto" href="{{ route('login') }}">
                              Dashboard
                          </a>
                      </li>
                  @else
                      <li>
                          <a class="nav-link scrollto" href="{{ route('login') }}">
                              Login
                          </a>
                      </li>
                  @endif
              </ul>
              <i class="bi bi-list mobile-nav-toggle"></i>
          </nav>
          <!-- .navbar -->
      </div>
  </header>
  <!-- End Header -->
