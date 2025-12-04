<x-layoutUser>

<div class="container mt-4">

    <h2 class="title">🛍️ Semua Produk</h2>

    <!-- Filter kategori -->
    <div class="kategori-filter">
        <a href="{{ route('user.produk.index') }}" class="filter-btn {{ !$kategoriSelected ? 'active' : '' }}">
            Semua
        </a>

        @foreach($kategoriList as $k)
            <a href="{{ route('user.produk.byKategori', $k->id) }}"
               class="filter-btn {{ isset($kategoriSelected) && $kategoriSelected->id == $k->id ? 'active' : '' }}">
               {{ strtoupper($k->nama) }}
            </a>
        @endforeach
    </div>

    <!-- Produk -->
    <div class="product-grid">
        @forelse($produk as $p)
            <div class="product-card" onclick="location.href='{{ route('user.produk.detail', $p->id) }}'">
                <img src="{{ $p->gambar ? asset('storage/produk/'.$p->gambar) : 'https://via.placeholder.com/200' }}" class="product-img">
                <h3 class="product-title">{{ strtoupper($p->nama) }}</h3>
                <p class="price">Rp {{ number_format($p->harga,0,',','.') }}</p>
            </div>
        @empty
            <p class="text-muted">Belum ada produk tersedia.</p>
        @endforelse
    </div>

    <div class="mt-4">
        {{ $produk->links() }}
    </div>

</div>

</x-layoutUser>
