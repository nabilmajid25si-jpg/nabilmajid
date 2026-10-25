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
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('user.*') ? 'active' : '' }}" href="{{ route('user.index') }}">
                        <i class="bi bi-people"></i>
                        <span>Data User</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>
