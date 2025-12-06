<x-layoutUser>

<div class="checkout-wrapper">

    <h2 class="checkout-title">Checkout</h2>

    <form action="{{ route('user.checkout.place') }}" method="POST">
        @csrf

        <div class="checkout-card">

    <div class="checkout-header">
        <span>📌</span>
        <h3>Informasi Penerima</h3>
    </div>

    <div class="form-row">
        <div class="form-field">
            <label>Nama Penerima</label>
            <input type="text" name="nama" placeholder="Masukkan nama lengkap..." required>
        </div>

        <div class="form-field">
            <label>Nomor Telepon</label>
            <input type="text" name="telepon" placeholder="08xxxxxxxxxx" required>
        </div>
    </div>

    <div class="form-field full">
        <label>Alamat Lengkap</label>
        <textarea name="alamat" rows="3" placeholder="Contoh: Jalan Melati No. 21, RT 04 RW 02, Medan, Sumatera Utara" required></textarea>
    </div>

</div>



        <!-- CARD PEMBAYARAN -->
        <div class="checkout-card">
    <h3 class="section-title">💳 Metode Pembayaran</h3>

    <div class="input-box">
        <select name="metode_pembayaran" required>
            <option value="COD">Bayar di Tempat (COD)</option>
            <option value="Transfer Bank">Transfer Bank</option>
            <option value="QRIS">QRIS</option>
        </select>
    </div>
</div>



        <!-- TOTAL BOX -->
        <div class="checkout-summary">
            <p>Total Pembayaran</p>
            <h3>Rp {{ number_format($total,0,',','.') }}</h3>
        </div>

        <!-- BUTTON -->
        <button type="submit" class="btn-submit">Buat Pesanan</button>
    </form>

</div>

</x-layoutUser>
