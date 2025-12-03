<!-- 🔹 NAVBAR REVO STYLE -->
<header>

  <!-- Top Info Bar -->
  <div class="top-bar">
    <div class="container">
      <p>
        Free 3-day delivery and free returns —
        @guest
            <a href="{{ route('register') }}">Register</a> or
            <a href="{{ route('login') }}">Login</a>
        @endguest
      </p>

      <div class="right-links">

        @auth
          <span>Welcome, {{ auth()->user()->name }} 👋</span>

          <!-- Role Based Dashboard Link -->
          @if(auth()->user()->role === 'admin')
            <a href="{{ route('admin.dashboard') }}">Dashboard</a>
          @else
            <a href="{{ route('user.dashboard') }}">Dashboard</a>
          @endif

          <!-- Logout Form -->
          <form action="{{ route('logout') }}" method="POST" style="display:inline;">
            @csrf
            <button type="submit" style="background:none;border:none;color:#fff;cursor:pointer;">
              Logout
            </button>
          </form>
        @endauth

        @guest
          <a href="{{ route('login') }}">Login</a>
        @endguest

        <a href="#">INDONESIA</a>
        <a href="#">IDR Rp</a>
      </div>
    </div>
  </div>

  <!-- Main Menu -->
  <div class="main-menu">
    <div class="container">

      <div class="logo">
        <img src="logo.png" alt="Logo">
        <h1>NEBULA<span>FOOTWEAR</span></h1>
      </div>

      <nav class="nav-links">
        <a href="/">Home</a>
        <a href="/produk">Produk</a>
        <a href="/kategori">Kategori</a>
        <a href="/promo">Promo</a>
        <a href="/kontak">Kontak</a>
      </nav>

      <div class="contact">
        <p>📞 Call Us Now: <span>(123) 456 888</span></p>
        <p>Email: <a href="#">contact@revoshop.com</a></p>
      </div>
    </div>
  </div>

  <!-- Search Bar -->
  <div class="search-bar">
    <div class="container">

      <select>
        <option>All Departments</option>
        <option>Electronics</option>
        <option>Fashion</option>
        <option>Home & Living</option>
      </select>

      <div class="search-box">
        <input type="text" placeholder="Search products here...">
        <button><i class="fas fa-search"></i></button>
      </div>

      <div class="icons">
        <i class="far fa-heart"></i>
        <i class="fas fa-shopping-cart"></i>
      </div>

    </div>
  </div>
</header>
