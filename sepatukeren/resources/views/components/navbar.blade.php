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

          @if(auth()->user()->role === 'admin')
            <a href="{{ route('admin.dashboard') }}">Dashboard</a>
          @else
            <a href="{{ route('user.dashboard') }}">Dashboard</a>
          @endif

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
        <img src="{{ asset('logo.png') }}" alt="Logo">
        <h1>NEBULA<span>FOOTWEAR</span></h1>
      </div>

      <nav class="nav-links">

  <a href="{{ url('/') }}">Home</a>
  <a href="{{ route('user.produk.index') }}">Produk</a>

  <div class="dropdown" id="kategoriDropdown">
    <button class="dropdown-toggle">
        Kategori ⮟
    </button>

    <div class="dropdown-menu">
        @foreach($kategoriNavbar as $k)
            <a href="{{ route('user.produk.byKategori', $k->id) }}">
                {{ $k->nama }}
            </a>
        @endforeach
    </div>
</div>



  <a href="#">Promo</a>
  <a href="#">Kontak</a>

</nav>


      <div class="contact">
        <p>📞 Call Us Now: <span>(123) 456 888</span></p>
        <p>Email: <a href="mailto:contact@revoshop.com">contact@revoshop.com</a></p>
      </div>
    </div>
  </div>


  <!-- Search Bar -->
  <div class="search-bar">
    <div class="container">

      <select>
        <option>All Departments</option>
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

<script>
document.addEventListener("DOMContentLoaded", () => {
    const dropdown = document.getElementById("kategoriDropdown");
    const toggle = dropdown.querySelector(".dropdown-toggle");

    toggle.addEventListener("click", (e) => {
        e.stopPropagation();
        dropdown.classList.toggle("open");
    });

    // Close if click outside
    document.addEventListener("click", () => {
        dropdown.classList.remove("open");
    });
});
</script>

