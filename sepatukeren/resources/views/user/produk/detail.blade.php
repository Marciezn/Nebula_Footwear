<x-layoutUser>

<section class="product-detail">

    <div class="detail-container">

        <!-- LEFT: IMAGE -->
        <div class="image-area">

            @if($produk->gambar)
                <img src="{{ asset('storage/produk/'.$produk->gambar) }}" alt="{{ $produk->nama }}" class="main-image">
            @else
                <img src="https://via.placeholder.com/350?text=No+Image" class="main-image">
            @endif

            <div class="thumb-row">
                <img src="{{ asset('storage/produk/'.$produk->gambar) }}" class="thumb active">
                <img src="{{ asset('storage/produk/'.$produk->gambar) }}" class="thumb">
                <img src="{{ asset('storage/produk/'.$produk->gambar) }}" class="thumb">
            </div>

        </div>


        <!-- RIGHT: INFO -->
        <div class="info-area">

            <h2 class="name">{{ $produk->nama }}</h2>

            <p class="kategori">
                Kategori: <strong>{{ $produk->kategori->nama }}</strong>
            </p>

            <p class="price">
                Rp {{ number_format($produk->harga,0,',','.') }}
            </p>

            <p class="stok {{ $produk->stok > 0 ? 'stok-ada' : 'stok-habis' }}">
                {{ $produk->stok > 0 ? "Stok Tersedia ($produk->stok)" : "Habis" }}
            </p>

            <div class="desc-box">
                {{ $produk->deskripsi ?? 'Tidak ada deskripsi tersedia.' }}
            </div>

            <div class="actions">
                <form action="{{ route('user.cart.add', $produk->id) }}" method="POST">
                    @csrf
                    <button class="add-cart-btn">🛒 Tambah Keranjang</button>
                </form>
                <button class="btn-buy">⚡ Beli Sekarang</button>
                <button class="btn-wishlist">❤️ Wishlist</button>
            </div>

        </div>

    </div>

</section>

</x-layoutUser>
