<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="dashboard-ecommerce.html">Admin</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="dashboard-ecommerce.html">SA</a>
        </div>
        <ul class="sidebar-menu">
            @if(auth()->user()->role === 'admin')
            <li class="{{ Request::is('dashboard/user') ? 'active' : ''}}"><a class="nav-link" href="{{route('dashboard.user')}}"><i class="fas fa-user"></i> <span>User</span></a></li>
            @endif
            <li class="{{ Request::is('dashboard/product') ? 'active' : ''}}"><a class="nav-link" href="{{ route(('dashboard.product'))}}"><i class="fas fa-user"></i> <span>Product - Stock</span></a></li>
            @if(auth()->user()->role === 'employee')
            <li class="{{ Request::is('dashboard/sales') ? 'active' : ''}}"><a class="nav-link" href="{{ route('dashboard.sales') }}"><i class="fas fa-money-bill" ></i> <span>Sales - Forms</span></a></li>
            @endif
            @if(auth()->user()->role === 'admin')
            <li class="{{ Request::is('dashboard/sales/history') ? 'active' : ''}}"><a class="nav-link" href="{{ route('dashboard.sales.history') }}"><i class="fas fa-money-bill" ></i> <span>Sales - History</span></a></li>
            @endif
        </ul>
    </aside>
</div>