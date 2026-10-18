<!DOCTYPE html>
<html lang="en" data-bs-theme="light">
<head>
    <!-- Meta Tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="referrer" content="strict-origin-when-cross-origin">
    <meta http-equiv="X-Content-Type-Options" content="nosniff">
    <meta name="description" content="Modern Bootstrap 5 Admin Template - Clean, responsive dashboard">
    <meta name="keywords" content="bootstrap, admin, dashboard, template, modern, responsive">
    <meta name="author" content="Bootstrap Admin Template">
    
    <!-- Open Graph Meta Tags -->
    <meta property="og:title" content="Modern Bootstrap Admin Template">
    <meta property="og:description" content="Clean and modern admin dashboard template built with Bootstrap 5">
    <meta property="og:type" content="website">
    
    <!-- Favicon -->
    <link rel="icon" type="image/svg+xml" href="/assets/icons/favicon.svg">
    <link rel="icon" type="image/png" href="/assets/icons/favicon.png">
    
    <!-- Preconnect to external domains -->
    
    <!-- Fonts -->
    
    <!-- Title -->
    <title>@yield('title', 'Admin') - MANA ERP</title>
    
    <!-- Theme Color -->
    <meta name="theme-color" content="#2563eb">
    
    <!-- PWA Manifest -->
    <link rel="manifest" href="/assets/manifest-D0qHSrzp.json">
  <script type="module" crossorigin src="/assets/main-BqKkk_Lj.js"></script>
  <script type="module" crossorigin src="/assets/rolldown-runtime-hePW80VL.js"></script>
  <script type="module" crossorigin src="/assets/vendor-ui-Be8JR3ju.js"></script>
  <script type="module" crossorigin src="/assets/vendor-bootstrap-Dj44xPS1.js"></script>
  <script type="module" crossorigin src="/assets/vendor-charts-_UPf9h_O.js"></script>
  <script type="module" crossorigin src="/assets/main-1Eks1J0_.js"></script>
  <link rel="stylesheet" crossorigin href="/assets/main-Kuf3cpUe.css">
</head>

<body data-page="admin-crud" class="admin-layout">
    <a href="#main-content" class="skip-link">Skip to main content</a>
    <!-- Loading Screen -->
    <div id="loading-screen" class="loading-screen">
        <div class="loading-spinner">
            <div class="spinner-border text-primary" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
        </div>
    </div>

    <!-- Admin App Container -->
    <div class="admin-app">
        <!-- Main Wrapper -->
        <div class="admin-wrapper" id="admin-wrapper">

        <!-- Header -->
        <header class="admin-header">
            <nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom">
                <div class="container-fluid">
                    <!-- Logo/Brand - Now first on the left -->
                    <a class="navbar-brand d-flex align-items-center" href="{{ route('dashboard') }}">
                        <img src="/assets/images/logo.svg" alt="Logo" height="32" class="d-inline-block align-text-top me-2">
                        <span class="h4 mb-0 fw-bold text-primary-emphasis">MANA ERP </span>
                    </a>

                    <!-- Sidebar Toggle -->
                    <button class="hamburger-menu" type="button" data-sidebar-toggle aria-label="Toggle sidebar">
                        <i class="bi bi-list"></i>
                    </button>

                    <!-- Search Bar with Alpine.js -->
                    <div class="search-container flex-grow-1 mx-4" x-data="searchComponent">
                        <div class="position-relative">
                            <input type="search" 
                                   class="form-control" 
                                   placeholder="Search... (Ctrl+K)"
                                   x-model="query"
                                   @input="search()"
                                   data-search-input
                                   aria-label="Search">
                            <i class="bi bi-search position-absolute top-50 end-0 translate-middle-y me-3"></i>
                            
                            <!-- Search Results Dropdown -->
                            <div x-show="results.length > 0" 
                                 x-transition:enter="transition ease-out duration-100"
                                 x-transition:enter-start="opacity-0 scale-95"
                                 x-transition:enter-end="opacity-100 scale-100"
                                 class="position-absolute top-100 start-0 w-100 bg-white border rounded-2 shadow-lg mt-1 z-3">
                                <template x-for="result in results" :key="result.title">
                                    <a :href="result.url" class="d-block px-3 py-2 text-decoration-none text-dark border-bottom">
                                        <div class="d-flex align-items-center">
                                            <i class="bi bi-file-text me-2 text-muted"></i>
                                            <span x-text="result.title"></span>
                                            <small class="ms-auto text-muted" x-text="result.type"></small>
                                        </div>
                                    </a>
                                </template>
                            </div>
                        </div>
                    </div>

                    <!-- Right Side Icons -->
                    <div class="navbar-nav flex-row">
                        <!-- Theme Toggle with Alpine.js -->
                        <div x-data="themeSwitch">
                            <button class="btn btn-outline-secondary me-2" 
                                    type="button" 
                                    @click="toggle()"
                                    data-bs-toggle="tooltip"
                                    data-bs-placement="bottom"
                                    title="Toggle theme">
                                <i class="bi bi-sun-fill" x-show="currentTheme === 'light'"></i>
                                <i class="bi bi-moon-fill" x-show="currentTheme === 'dark'"></i>
                            </button>
                        </div>

                        <!-- Fullscreen Toggle (hidden on phones) -->
                        <button class="btn btn-outline-secondary me-2 d-none d-lg-inline-block"
                                type="button"
                                data-fullscreen-toggle
                                data-bs-toggle="tooltip"
                                data-bs-placement="bottom"
                                title="Toggle fullscreen">
                            <i class="bi bi-arrows-fullscreen icon-hover"></i>
                        </button>

                        <!-- Notifications -->
                        <div class="dropdown me-2">
                            <button class="btn btn-outline-secondary position-relative" 
                                    type="button" 
                                    data-bs-toggle="dropdown" 
                                    aria-expanded="false">
                                <i class="bi bi-bell"></i>
                                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                    3
                                </span>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li><h6 class="dropdown-header">Notifications</h6></li>
                                <li><a class="dropdown-item" href="#">New user registered</a></li>
                                <li><a class="dropdown-item" href="#">Server status update</a></li>
                                <li><a class="dropdown-item" href="#">New message received</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item text-center" href="#">View all notifications</a></li>
                            </ul>
                        </div>

                        <!-- User Menu -->
                        <div class="dropdown">
                            <button class="btn btn-outline-secondary d-flex align-items-center" 
                                    type="button" 
                                    data-bs-toggle="dropdown" 
                                    aria-expanded="false">
                                <img src="/assets/images/avatar-placeholder.svg" 
                                     alt="User Avatar" 
                                     width="24" 
                                     height="24" 
                                     class="rounded-circle me-2">
                                <span class="d-none d-md-inline">John Doe</span>
                                <i class="bi bi-chevron-down ms-1"></i>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li><a class="dropdown-item" href="#"><i class="bi bi-person me-2"></i>Profile</a></li>
                                <li><a class="dropdown-item" href="#"><i class="bi bi-gear me-2"></i>Settings</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="#"><i class="bi bi-box-arrow-right me-2"></i>Logout</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </nav>
        </header>


        <!-- Sidebar -->
        <aside class="admin-sidebar" id="admin-sidebar">
            <div class="sidebar-content">
                <nav class="sidebar-nav">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}">
                                <i class="bi bi-speedometer2"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('product.*') ? 'active' : '' }}" href="{{ route('product.index') }}">
                                <i class="bi bi-box"></i>
                                <span>Data Product</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('order.*') ? 'active' : '' }}" href="{{ route('order.index') }}">
                                <i class="bi bi-bag-check"></i>
                                <span>Data Order</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('analyst.*') ? 'active' : '' }}" href="{{ route('analyst.index') }}">
                                <i class="bi bi-graph-up"></i>
                                <span>Data Analyst</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>

        <!-- Sidebar Backdrop (mobile overlay) -->
        <div class="sidebar-backdrop" aria-hidden="true"></div>
        <!-- Main Content -->
        <main id="main-content" class="admin-main">
            <div class="container-fluid p-4 p-lg-4">
                @yield('content')
            </div>
        </main>

        <!-- Footer -->
        <footer class="admin-footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <p class="mb-0 text-muted">© 2026 Modern Bootstrap Admin Template</p>
                    </div>
                    <div class="col-md-6 text-md-end">
                        <p class="mb-0 text-muted">Built with Bootstrap 5 by <a href="https://colorlib.com/" target="_blank" rel="noopener noreferrer">Colorlib</a> &bull; Distributed by <a href="https://themewagon.com/" target="_blank" rel="noopener noreferrer">ThemeWagon</a></p>
                    </div>
                </div>
            </div>
        </footer>
        </div> <!-- /.admin-wrapper -->
    </div>

    <!-- Toast Container -->
    <div aria-live="polite" aria-atomic="true" class="position-fixed top-0 end-0 p-3" style="z-index: 11">
        <div id="toast-container"></div>
    </div>


</body>
</html>
