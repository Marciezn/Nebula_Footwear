<x-layoutUser>
<div style="text-align:center;padding:40px;">
    <h2>🎉 Pesanan Berhasil Dibuat!</h2>
    <p>Kode Pesanan: <strong>#{{ $id }}</strong></p>
    <a href="{{ route('user.produk.index') }}" class="btn-checkout">Belanja Lagi</a>
</div>
</x-layoutUser>
