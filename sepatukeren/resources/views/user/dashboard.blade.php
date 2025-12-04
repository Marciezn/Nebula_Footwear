<x-layoutUser>

    <!-- Hero Section -->
  <section class="hero">
    <div class="hero-text">
      <h1>VAPOR STREET–<br><span>FAST</span></h1>
      <p>Dirancang untuk performa cepat dan nyaman dalam setiap langkah.</p>
      <button>Beli Sekarang</button>
    </div>
    <div class="hero-image">
      <img src="img/vapor-shoe.png" alt="Nike Vapor Street">
    </div>
  </section>

  <section class="category-section">
  <h2 class="text-center mt-4 mb-3 fw-bold">KATEGORI PRODUK</h2>

  <div class="category-wrapper">
    <button class="scroll-btn left">❮</button>

    <div class="category-slider" id="kategoriSlider">

      @forelse($kategori as $item)
      <a href="{{ route('user.kategori.detail', $item->id) }}" class="category-item">
        @if($item->icon_file)
          <img src="{{ asset('storage/kategori/'.$item->icon_file) }}">
        @else
          <div class="placeholder-icon">📦</div>
        @endif
        <p>{{ $item->nama }}</p>
      </a>
      @empty
        <p class="text-muted">Belum ada kategori tersedia.</p>
      @endforelse

    </div>

    <button class="scroll-btn right">❯</button>
  </div>
</section>



<section class="articles">
    <!-- Produk 1 -->
    <div class="product-card">
      <img src="img/shoe1.png" alt="Vans Classic Slip On">
      <h4>Vans Classic Slip On</h4>
      <p class="price">$80.00</p>
      <div class="button-group">
        <button class="btn-readmore">Read More</button>
        <div class="more-actions">
          <button>🛍️ Beli Sekarang</button>
          <button>🛒 Add to Cart</button>
          <button>🔍 Detail Produk</button>
          <button>📰 Blog</button>
        </div>
      </div>
    </div>

    <!-- Produk 2 -->
    <div class="product-card">
      <img src="img/shoe1.png" alt="Nike Air Force 1">
      <h4>Nike Air Force 1</h4>
      <p class="price">$120.00</p>
      <div class="button-group">
        <button class="btn-readmore">Read More</button>
        <div class="more-actions">
          <button>🛍️ Beli Sekarang</button>
          <button>🛒 Add to Cart</button>
          <button>🔍 Detail Produk</button>
          <button>📰 Blog</button>
        </div>
      </div>
    </div>

    <!-- Produk 3 -->
    <div class="product-card">
      <img src="img/shoe1.png" alt="Converse Chuck Taylor">
      <h4>Converse Chuck Taylor</h4>
      <p class="price">$70.00</p>
      <div class="button-group">
        <button class="btn-readmore">Read More</button>
        <div class="more-actions">
          <button>🛍️ Beli Sekarang</button>
          <button>🛒 Add to Cart</button>
          <button>🔍 Detail Produk</button>
          <button>📰 Blog</button>
        </div>
      </div>
    </div>

    <!-- Produk 4 -->
    <div class="product-card">
      <img src="img/shoe1.png" alt="Adidas Superstar">
      <h4>Adidas Superstar</h4>
      <p class="price">$95.00</p>
      <div class="button-group">
        <button class="btn-readmore">Read More</button>
        <div class="more-actions">
          <button>🛍️ Beli Sekarang</button>
          <button>🛒 Add to Cart</button>
          <button>🔍 Detail Produk</button>
          <button>📰 Blog</button>
        </div>
      </div>
    </div>
  </section>


  

  <!-- Banner & Trending -->
  <section class="banner">
    <div class="banner-content">
      <h1>NEVER STOP</h1>
      <p>Push The Limits Of The Impossible</p>
      <button>Buy Now</button>
    </div>
    <img src="img/banner-athlete.png" alt="Just Do It">
  </section>

  <section class="articles">
    <!-- Produk 1 -->
    <div class="product-card">
      <img src="img/shoe1.png" alt="Vans Classic Slip On">
      <h4>Vans Classic Slip On</h4>
      <p class="price">$80.00</p>
      <div class="button-group">
        <button class="btn-readmore">Read More</button>
        <div class="more-actions">
          <button>🛍️ Beli Sekarang</button>
          <button>🛒 Add to Cart</button>
          <button>🔍 Detail Produk</button>
          <button>📰 Blog</button>
        </div>
      </div>
    </div>

    <!-- Produk 2 -->
    <div class="product-card">
      <img src="img/shoe1.png" alt="Nike Air Force 1">
      <h4>Nike Air Force 1</h4>
      <p class="price">$120.00</p>
      <div class="button-group">
        <button class="btn-readmore">Read More</button>
        <div class="more-actions">
          <button>🛍️ Beli Sekarang</button>
          <button>🛒 Add to Cart</button>
          <button>🔍 Detail Produk</button>
          <button>📰 Blog</button>
        </div>
      </div>
    </div>

    <!-- Produk 3 -->
    <div class="product-card">
      <img src="img/shoe1.png" alt="Converse Chuck Taylor">
      <h4>Converse Chuck Taylor</h4>
      <p class="price">$70.00</p>
      <div class="button-group">
        <button class="btn-readmore">Read More</button>
        <div class="more-actions">
          <button>🛍️ Beli Sekarang</button>
          <button>🛒 Add to Cart</button>
          <button>🔍 Detail Produk</button>
          <button>📰 Blog</button>
        </div>
      </div>
    </div>

    <!-- Produk 4 -->
    <div class="product-card">
      <img src="img/shoe1.png" alt="Adidas Superstar">
      <h4>Adidas Superstar</h4>
      <p class="price">$95.00</p>
      <div class="button-group">
        <button class="btn-readmore">Read More</button>
        <div class="more-actions">
          <button>🛍️ Beli Sekarang</button>
          <button>🛒 Add to Cart</button>
          <button>🔍 Detail Produk</button>
          <button>📰 Blog</button>
        </div>
      </div>
    </div>
  </section>


</x-layoutUser>