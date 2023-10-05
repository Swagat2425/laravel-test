<nav class="navbar navbar-expand-md navbar-dark bg-dark mb-4">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Admin Panel</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav me-auto mb-2 mb-md-0">
                <li class="nav-item">
                    <a class="nav-link {{ (Route::currentRouteName() == 'admin.dashboard' || Route::currentRouteName() == 'admin_dashboard') ? 'active' : '' }}" aria-current="page" href="{{ route('admin.dashboard') }}">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ (Route::currentRouteName() == 'admin.blogs') ? 'active' : '' }}" href="{{ route('admin.blogs') }}">Blogs</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ (Route::currentRouteName() == 'admin.customers') ? 'active' : '' }}" href="{{ route('admin.customers') }}">Customers</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.logout') }}">Logout</a>
                </li>
            </ul>
        </div>
    </div>
</nav>