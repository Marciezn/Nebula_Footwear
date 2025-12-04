<!-- SIDEBAR -->
<aside class="sidebar">
    <div class="sidebar-header">
        <img src="{{ asset('websepatu/logo13.png') }}" alt="Illustration">
        <h2>Nebula<span>Admin</span></h2>
    </div>

    <nav class="menu">

        {{-- Dashboard --}}
        <a href="{{ route('admin.dashboard') }}" 
           class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
            <i class="fas fa-home"></i> Dashboard
        </a>

        {{-- Customers --}}
        <a href="{{ route('admin.customers.index') }}" 
           class="{{ request()->routeIs('admin.customers.*') ? 'active' : '' }}">
            <i class="fas fa-users"></i> Customers
        </a>

        {{-- Kategori --}}
        <a href="{{ route('admin.kategori.index') }}" 
           class="{{ request()->routeIs('admin.kategori.*') ? 'active' : '' }}">
            <i class="fas fa-layer-group"></i> Kategori
        </a>

        {{-- Produk --}}
        <a href="{{ route('admin.produk.index') }}" 
           class="{{ request()->routeIs('admin.produk.*') ? 'active' : '' }}">
            <i class="fas fa-box"></i> Produk
        </a>
        {{-- Promo --}}
        <a href="#">
            <i class="fas fa-tags"></i> Promo
        </a>

        {{-- Orders --}}
        <a href="#">
            <i class="fas fa-shopping-cart"></i> Orders
        </a>

        {{-- Pengaturan --}}
        <a href="#">
            <i class="fas fa-cog"></i> Pengaturan
        </a>

    </nav>

    <div class="logout-box">
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button id="logoutBtn" type="submit">
                <i class="fas fa-sign-out-alt"></i> Logout
            </button>
        </form>
    </div>
</aside>
