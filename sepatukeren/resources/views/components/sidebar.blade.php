<!-- SIDEBAR -->
    <aside class="sidebar">
        <div class="sidebar-header">
            <img src="logo13.png" class="logo">
            <h2>Nebula<span>Admin</span></h2>
        </div>

        <nav class="menu">
            <a class="active"><i class="fas fa-home"></i> Dashboard</a>
            <a><i class="fas fa-box"></i> Produk</a>
            <a><i class="fas fa-tags"></i> Promo</a>
            <a><i class="fas fa-shopping-cart"></i> Orders</a>
            <a><i class="fas fa-users"></i> Customers</a>
            <a><i class="fas fa-cog"></i> Pengaturan</a>
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