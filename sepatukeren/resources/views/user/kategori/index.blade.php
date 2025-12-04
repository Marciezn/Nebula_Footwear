<x-layoutUser>

<section class="category-list-page">

    <h2 class="section-title">Pilih Kategori</h2>

    <div class="category-grid">

        @forelse($kategori as $item)
        <a href="{{ route('user.kategori.detail', $item->id) }}" class="category-box">

            <div class="category-image">
                @if($item->icon_file)
                    <img src="{{ asset('storage/kategori/'.$item->icon_file) }}" alt="{{ $item->nama }}">
                @else
                    <span class="emoji">📦</span>
                @endif
            </div>

            <h4>{{ $item->nama }}</h4>

        </a>
        @empty

        <p class="empty">Belum ada kategori tersedia.</p>

        @endforelse

    </div>

</section>

</x-layoutUser>
