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

    @include('layouts.admin.css')
    @include('layouts.admin.js')
</head>

<body data-page="@yield('page', 'admin-crud')" class="admin-layout">
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

        @include('layouts.admin.header')

        @include('layouts.admin.sidebar')

        <!-- Sidebar Backdrop (mobile overlay) -->
        <div class="sidebar-backdrop" aria-hidden="true"></div>
        <!-- Main Content -->
        <main id="main-content" class="admin-main">
            <div class="container-fluid p-4 p-lg-4">
                @include('layouts.admin.alerts')
                @yield('content')
            </div>
        </main>

        @include('layouts.admin.footer')
        </div> <!-- /.admin-wrapper -->
    </div>

    <!-- Toast Container -->
    <div aria-live="polite" aria-atomic="true" class="position-fixed top-0 end-0 p-3" style="z-index: 11">
        <div id="toast-container"></div>
    </div>


</body>
</html>
