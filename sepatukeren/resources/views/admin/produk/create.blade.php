<x-layoutAdmin title="Tambah Produk">

<div class="page-wrapper">
    <div class="card-form">
        <h2 class="form-title">Tambah Produk</h2>

        <form action="{{ route('admin.produk.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-grid">

                <div class="form-group">
                    <label>Nama Produk</label>
                    <input name="nama" required>
                </div>

                <div class="form-group">
                    <label>Kategori</label>
                    <select name="kategori_id" required>
                        <option value="">-- Pilih Kategori --</option>
                        @foreach($kategori as $item)
                        <option value="{{ $item->id }}">{{ $item->nama }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label>Harga</label>
                    <input type="number" name="harga" required>
                </div>

                <div class="form-group">
                    <label>Stok</label>
                    <input type="number" name="stok" required>
                </div>

                <div class="form-group" style="grid-column: 1 / span 2;">
                    <label>Deskripsi</label>
                    <textarea name="deskripsi"></textarea>
                </div>

                <div class="form-group" style="grid-column: 1 / span 2;">
                    <label>Gambar Produk</label>
                    <input type="file" name="gambar" accept="image/*" onchange="previewImg(event)">
                    <img id="preview" style="width:100px;margin-top:10px;display:none;border-radius:10px;">
                </div>

            </div>

            <div class="form-actions">
                <a href="{{ route('admin.produk.index') }}" class="btn-cancel">Batal</a>
                <button class="btn-save">Simpan</button>
            </div>

        </form>
    </div>
</div>

<script>
function previewImg(event){
    let img = document.getElementById('preview');
    img.src = URL.createObjectURL(event.target.files[0]);
    img.style.display = 'block';
}
</script>

</x-layoutAdmin>
