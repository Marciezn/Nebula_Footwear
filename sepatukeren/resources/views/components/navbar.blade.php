<header>

    <!-- TOP BAR -->
    <div class="top-bar">
        <div class="container">
            <p>
                Free 3-day delivery and free returns —
                @guest
                    <a href="{{ route('register') }}">Register</a> or <a href="{{ route('login') }}">Login</a>
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

                    <form action="{{ route('logout') }}" method="POST" class="logout-form">
                      @csrf
                      <button type="submit" class="logout-btn">
                          <i class="fas fa-sign-out-alt"></i>
                      </button>
                  </form>


                @else
                    <a href="{{ route('login') }}">Login</a>
                @endauth

                <a href="#">INDONESIA</a>
            </div>
        </div>
    </div>



    <!-- MAIN MENU -->
    <div class="main-menu">
        <div class="container">

            <div class="logo">
                <img src="{{ asset('websepatu/logo13.png') }}" alt="Logo">
                <h1>NEBULA<span>FOOTWEAR</span></h1>
            </div>

            <nav class="nav-links">
                <a href="{{ url('/') }}">Home</a>
                <a href="{{ route('user.produk.index') }}">Produk</a>

                <!-- Dropdown Category -->
                <div class="dropdown" id="kategoriDropdown">
                    <button class="dropdown-toggle">Kategori ⮟</button>

                    <div class="dropdown-menu">
                        @foreach($kategoriNavbar as $k)
                            <a href="{{ route('user.produk.byKategori', $k->id) }}">{{ $k->nama }}</a>
                        @endforeach
                    </div>
                </div>

                <a href="#">Promo</a>
                <a href="#">Kontak</a>
            </nav>

            <!-- CONTACT -->
            <div class="contact">
                <p>📞 <strong>(123) 456 888</strong></p>
                <p><a href="mailto:contact@revoshop.com">contact@revoshop.com</a></p>
            </div>

        </div>
    </div>


    <!-- SEARCH & CART -->
    <div class="search-bar">
        <div class="container search-flex">

            <select>
                <option>All Departments</option>
            </select>

            <div class="search-box">
                <input type="text" placeholder="Search products here...">
                <button><i class="fas fa-search"></i></button>
            </div>

            <!-- Cart -->
            <a href="{{ route('user.cart') }}" class="cart-btn">
                <i class="fas fa-shopping-cart"></i>
                @if($cartCount > 0)
                    <span class="count">{{ $cartCount }}</span>
                @endif
            </a>

        </div>
    </div>

</header>


<script>
document.addEventListener("click", function(e){
    const drop = document.getElementById("kategoriDropdown");

    if(drop.contains(e.target)) {
        drop.classList.toggle("open");
    } else {
        drop.classList.remove("open");
    }
});
</script>
