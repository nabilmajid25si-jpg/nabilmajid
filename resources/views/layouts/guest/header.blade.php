  <header id="header" class="header d-flex align-items-center fixed-top">
    <div class="header-container container-fluid container-xl position-relative d-flex align-items-center justify-content-between">

      <a href="{{ route('home') }}" class="logo d-flex align-items-center me-auto me-xl-0">
        <h1 class="sitename">Mana ERP</h1>
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'active' : '' }}">Home</a></li>
          <li><a href="{{ route('home') }}#about">About</a></li>
          <li><a href="{{ route('home') }}#features">Features</a></li>
          <li><a href="{{ route('home') }}#services">Services</a></li>
          <li><a href="{{ route('home') }}#pricing">Pricing</a></li>
          <li><a href="{{ route('home') }}#contact">Contact</a></li>
          <li><a href="{{ route('login') }}" class="{{ request()->routeIs('login') ? 'active' : '' }}">Login</a></li>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>

      <a class="btn-getstarted" href="{{ route('register') }}">Register</a>

    </div>
  </header>
