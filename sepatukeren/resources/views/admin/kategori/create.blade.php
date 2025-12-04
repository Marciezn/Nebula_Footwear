<x-layoutAdmin title="Tambah Kategori">

<div class="page-wrapper">
    <div class="card-form">
        <h2 class="form-title">Tambah Kategori</h2>

        <form action="{{ route('admin.kategori.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-grid">

                <div class="form-group">
                    <label>Nama</label>
                    <input name="nama" required>
                </div>

                <div class="form-group">
                    <label>Upload Icon</label>
                    <input type="file" name="icon_file" accept="image/*" onchange="previewIcon(event)">
                    <img id="previewIcon" class="preview-icon">
                </div>


                <div class="form-group">
                    <label>Status</label>
                    <select name="status">
                        <option value="aktif">Aktif</option>
                        <option value="nonaktif">Nonaktif</option>
                    </select>
                </div>

                <div class="form-group" style="grid-column:1 / span 2;">
                    <label>Deskripsi</label>
                    <textarea name="deskripsi"></textarea>
                </div>

            </div>

            <div class="form-actions">
                <a href="{{ route('admin.kategori.index') }}" class="btn-cancel">Batal</a>
                <button class="btn-save">Simpan</button>
            </div>
        </form>
    </div>
</div>

</x-layoutAdmin>
