<x-layoutUser>
<section class="kategori-detail">
    <h2>{{ $kategori->nama }}</h2>

    <div class="produk-list">
        @forelse($products as $product)
        <div class="produk-card">
            <img src="{{ asset('storage/products/'.$product->gambar) }}" alt="">
            <h4>{{ $product->nama }}</h4>
            <p>{{ number_format($product->harga, 0, ',', '.') }} Rp</p>
        </div>
        @empty
            <p class="empty">Belum ada produk dalam kategori ini.</p>
        @endforelse
    </div>
</section>
</x-layoutUser>
