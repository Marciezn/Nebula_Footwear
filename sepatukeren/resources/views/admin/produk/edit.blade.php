<x-layoutAdmin title="Edit Produk">

<div class="page-wrapper">
    <div class="card-form">
        <h2 class="form-title">Edit Produk</h2>

        <form action="{{ route('admin.produk.update', $produk->id) }}" method="POST" enctype="multipart/form-data">
            @csrf @method('PUT')

            <div class="form-grid">

                <div class="form-group">
                    <label>Nama Produk</label>
                    <input name="nama" value="{{ $produk->nama }}" required>
                </div>

                <div class="form-group">
                    <label>Kategori</label>
                    <select name="kategori_id" required>
                        @foreach($kategori as $item)
                        <option value="{{ $item->id }}" @selected($produk->kategori_id == $item->id)>
                            {{ $item->nama }}
                        </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label>Harga</label>
                    <input type="number" name="harga" value="{{ $produk->harga }}" required>
                </div>

                <div class="form-group">
                    <label>Stok</label>
                    <input type="number" name="stok" value="{{ $produk->stok }}" required>
                </div>

                <div class="form-group" style="grid-column: 1 / span 2;">
                    <label>Deskripsi</label>
                    <textarea name="deskripsi">{{ $produk->deskripsi }}</textarea>
                </div>

                <div class="form-group" style="grid-column: 1 / span 2;">
                    <label>Gambar Produk</label>
                    <input type="file" name="gambar" accept="image/*" onchange="previewImg(event)">

                    @if($produk->gambar)
                        <img id="preview" src="{{ asset('storage/produk/'.$produk->gambar) }}" style="width:100px;margin-top:10px;border-radius:10px;">
                    @else
                        <img id="preview" style="width:100px;display:none;margin-top:10px;border-radius:10px;">
                    @endif
                    
                </div>

            </div>

            <div class="form-actions">
                <a href="{{ route('admin.produk.index') }}" class="btn-cancel">Batal</a>
                <button class="btn-save">Update</button>
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
