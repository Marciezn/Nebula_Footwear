<x-layoutUser>

<style>
    .kategori-detail {
        width: 90%;
        margin: 30px auto;
    }

    .kategori-title {
        font-size: 26px;
        font-weight: bold;
        margin-bottom: 20px;
        color: #003366;
    }

    .produk-list {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(220px, 1fr));
        gap: 20px;
    }

    .produk-card {
        border: 1px solid #e6e6e6;
        border-radius: 12px;
        padding: 15px;
        text-align: center;
        background: #fff;
        transition: 0.3s;
    }

    .produk-card:hover {
        transform: translateY(-5px);
        box-shadow: rgba(0, 0, 0, 0.15) 0px 4px 15px;
    }

    .produk-card img {
        max-width: 150px;
        height: 150px;
        object-fit: contain;
        margin-bottom: 10px;
    }

    .produk-card h4 {
        font-size: 18px;
        font-weight: bold;
        margin-bottom: 5px;
        text-transform: uppercase;
    }

    .produk-card .price {
        font-size: 18px;
        font-weight: bold;
        color: #007BFF;
        margin-bottom: 10px;
    }

    .btn-detail {
        display: block;
        background: #0057d8;
        color: #fff;
        padding: 8px 16px;
        border-radius: 8px;
        text-decoration: none;
        transition: .3s;
    }

    .btn-detail:hover {
        background: #003ea4;
    }
</style>

<section class="kategori-detail">

    <h2 class="kategori-title">{{ $kategori->nama }}</h2>

    <div class="produk-list">

        @forelse($produk as $item)
            <div class="produk-card">
                <img src="{{ asset('storage/produk/' . $item->gambar) }}" alt="">

                <h4>{{ $item->nama }}</h4>
                <div class="price">Rp {{ number_format($item->harga, 0, ',', '.') }}</div>

                <a href="{{ route('user.produk.detail', $item->id) }}" class="btn-detail">
                    Lihat Detail
                </a>
            </div>
        @empty
        
            <p style="grid-column:1 / -1; text-align:center; color:#999;">
                Tidak ada produk di kategori ini.
            </p>

        @endforelse

    </div>

</section>

</x-layoutUser>
