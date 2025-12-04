<x-layoutAdmin title="Kategori">

<div class="page-wrapper">

    <div class="card-form">
        <h2 class="form-title">Kategori</h2>

        <form method="GET" action="{{ route('admin.kategori.index') }}" class="search-bar">
            <input type="text" name="search" placeholder="Cari kategori..." value="{{ request()->search }}">
            <button class="btn-edit">Cari</button>
            <a href="{{ route('admin.kategori.create') }}" class="btn-add">+ Tambah</a>
        </form>

        @if(session('success'))
        <div class="alert-success">{{ session('success') }}</div>
        @endif

        <table class="customers-table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Icon</th>
                    <th>Nama</th>
                    <th>Status</th>
                    <th width="150">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($kategori as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>

                    <td>
                        @if($item->icon_file)
                            <img src="{{ asset('storage/kategori/'.$item->icon_file) }}" width="30" height="30" style="object-fit:cover;border-radius:5px;">
                        @else
                            <span style="opacity:0.5;">No Icon</span>
                        @endif
                    </td>

                    <td>{{ $item->nama }}</td>
                    <td><span class="badge {{ $item->status }}">{{ ucfirst($item->status) }}</span></td>

                    <td>
                        <a href="{{ route('admin.kategori.edit', $item->id) }}" class="btn-edit">Edit</a>

                        <form action="{{ route('admin.kategori.destroy', $item->id) }}" method="POST" style="display:inline-block;">
                            @csrf @method('DELETE')
                            <button class="btn-delete" onclick="return confirm('Hapus kategori?')">Hapus</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr><td colspan="5" style="text-align:center;">Tidak ada data</td></tr>
                @endforelse
            </tbody>
        </table>

        <br>
        {{ $kategori->links() }}
    </div>

</div>

</x-layoutAdmin>
