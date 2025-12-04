<x-layoutAdmin title="Edit Kategori">

<div class="page-wrapper">
    <div class="card-form">
        <h2 class="form-title">Edit Kategori</h2>

        <form action="{{ route('admin.kategori.update', $kategori->id) }}" method="POST" enctype="multipart/form-data">
            @csrf @method('PUT')

            <div class="form-grid">

                <div class="form-group">
                    <label>Nama</label>
                    <input name="nama" value="{{ $kategori->nama }}" required>
                </div>

                <div class="form-group">
                    <label>Ganti Icon</label>
                    <input type="file" name="icon_file" accept="image/*">
                </div>

                @if($kategori->icon_file)
                <div class="form-group">
                    <label>Icon Sekarang</label> <br>
                    <img src="{{ asset('storage/kategori/'.$kategori->icon_file) }}" width="50" height="50" style="border-radius:6px;">
                </div>
                @endif

                <div class="form-group">
                    <label>Status</label>
                    <select name="status">
                        <option value="aktif" @selected($kategori->status=='aktif')>Aktif</option>
                        <option value="nonaktif" @selected($kategori->status=='nonaktif')>Nonaktif</option>
                    </select>
                </div>

                <div class="form-group" style="grid-column:1 / span 2;">
                    <label>Deskripsi</label>
                    <textarea name="deskripsi">{{ $kategori->deskripsi }}</textarea>
                </div>

            </div>

            <div class="form-actions">
                <a href="{{ route('admin.kategori.index') }}" class="btn-cancel">Batal</a>
                <button class="btn-save">Update</button>
            </div>
        </form>
    </div>
</div>

</x-layoutAdmin>
