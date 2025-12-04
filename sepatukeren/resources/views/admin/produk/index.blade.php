<x-layoutAdmin title="Produk">

<div class="page-wrapper">

    <div class="card-form">
        <h2 class="form-title">Daftar Produk</h2>

        <form method="GET" action="{{ route('admin.produk.index') }}" class="search-bar">
            <input type="text" name="search" placeholder="Cari produk..." value="{{ request()->search }}">
            <button class="btn-edit">Cari</button>
            <a href="{{ route('admin.produk.create') }}" class="btn-add">+ Tambah Produk</a>
        </form>

        @if(session('success'))
        <div class="alert-success">{{ session('success') }}</div>
        @endif

        <table class="customers-table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Gambar</th>
                    <th>Nama</th>
                    <th>Kategori</th>
                    <th>Harga</th>
                    <th>Stok</th>
                    <th width="150">Aksi</th>
                </tr>
            </thead>

            <tbody>
                @forelse($produk as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>

                    <td>
                        @if($item->gambar)
                        <img src="{{ asset('storage/produk/'.$item->gambar) }}" width="45" height="45" style="object-fit:cover;border-radius:8px;">
                        @else
                        <span style="opacity:.6;">📦</span>
                        @endif
                    </td>

                    <td>{{ $item->nama }}</td>
                    <td>{{ $item->kategori->nama ?? '-' }}</td>
                    <td>Rp {{ number_format($item->harga,0,',','.') }}</td>
                    <td>{{ $item->stok }}</td>

                    <td>
                        <a href="{{ route('admin.produk.edit', $item->id) }}" class="btn-edit">Edit</a>

                        <form action="{{ route('admin.produk.destroy', $item->id) }}" method="POST" style="display:inline-block;">
                            @csrf @method('DELETE')
                            <button class="btn-delete" onclick="return confirm('Hapus produk ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr><td colspan="7" style="text-align:center;">Tidak ada produk tersedia.</td></tr>
                @endforelse
            </tbody>
        </table>

        <br>
        {{ $produk->links() }}

    </div>
</div>

</x-layoutAdmin>
