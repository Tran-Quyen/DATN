<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item {{ Request::is('dashboard') ? 'active':'' }}">
            <a class="nav-link" href="{{ route('dashboard') }}">
                <i class="mdi mdi-home menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        <li class="nav-item {{ Request::is('admin/orders') ? 'active':'' }}">
            <a class="nav-link" href="{{ url('admin/orders') }}">
                <i class="mdi mdi-brightness-percent menu-icon"></i>
                <span class="menu-title">Orders</span>
            </a>
        </li>
        <li class="nav-item {{ Request::is('admin/category*') ? 'active':'' }}">
            <a class="nav-link" data-bs-toggle="collapse" href="#category" aria-expanded="{{ Request::is('admin/category*') ? 'true':'false' }}"
                aria-controls="category" role="button">
                <i class="mdi mdi-view-list menu-icon"></i>
                <span class="menu-title">Category</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse {{ Request::is('admin/category*') ? 'show':'' }}" id="category">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('admin/category/create') ? 'show':'' }}" href="{{ route('create-category') }}">Add Category</a>
                    </li>
                    <li class="nav-item">
                         <a class="nav-link {{ Request::is('admin/category') ||Request::is('admin/category/*/edit')  ? 'show':'' }}" href="{{ route('category') }}">View Category</a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="nav-item {{ Request::is('admin/products*') ? 'active':'' }}">
            <a class="nav-link" data-bs-toggle="collapse" href="#products" aria-expanded="{{ Request::is('admin/products*') ? 'true':'false' }}"
                aria-controls="products" role="button">
                <i class="mdi mdi-plus-circle menu-icon"></i>
                <span class="menu-title">Products</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse {{ Request::is('admin/products*') ? 'show':'' }}" id="products">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{ url('admin/products/create') }}">Add Product</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ url('admin/products') }}">View Products</a>
                    </li>
                </ul>
            </div>
        </li>

        <li class="nav-item {{ Request::is('brand') ? 'active':'' }}">
            <a class="nav-link" href="{{ route('brand') }}">
                <i class="mdi mdi-reorder-horizontal menu-icon"></i>
                <span class="menu-title">Brands</span>
            </a>
        </li>
        <li class="nav-item {{ Request::is('admin/users*') ? 'active':'' }}">
            <a class="nav-link" data-bs-toggle="collapse" href="#auth" aria-expanded="{{ Request::is('admin/users*') ? 'true':'false' }}" aria-controls="auth" role="button">
                <i class="mdi mdi-account-supervisor menu-icon"></i>
                <span class="menu-title">User Pages</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse {{ Request::is('admin/users*') ? 'show':'' }}" id="auth">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{ url('admin/users/create') }}"> Add Users </a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ url('admin/users') }}"> View Users </a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item {{ Request::is('sliders') ? 'active':'' }}">
            <a class="nav-link" href="{{ route('sliders') }}">
                <i class="mdi mdi-page-next-outline menu-icon"></i>
                <span class="menu-title">Home Slider</span>
            </a>
        </li>
        <li class="nav-item {{ Request::is('admin/settings') ? 'active':'' }}">
            <a class="nav-link" href="{{ url('admin/settings') }}">
                <i class="mdi mdi-cogs menu-icon"></i>
                <span class="menu-title">Site Setting</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ url('admin/statistic') }}">
                <i class="mdi mdi-chart-areaspline menu-icon"></i>
                <span class="menu-title">Statistics</span>
            </a>
        </li>
    </ul>
</nav>
