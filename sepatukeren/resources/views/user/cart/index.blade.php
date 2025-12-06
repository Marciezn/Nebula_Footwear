<x-layoutUser>

<div class="cart-container">

    <h2 class="title">🛒 Keranjang Belanja</h2>

    @if($cart->isEmpty())
        <div class="empty-cart">
            <img src="https://cdn-icons-png.flaticon.com/512/4555/4555971.png" alt="">
            <h3>Keranjang masih kosong</h3>
            <a href="{{ route('user.produk.index') }}" class="btn-shop">Belanja Sekarang</a>
        </div>
    @else

        <div class="cart-wrapper">

            @foreach($cart as $item)
            <div class="cart-item">

                <img src="{{ asset('storage/produk/'.$item->produk->gambar) }}" class="cart-img">

                <div class="cart-info">
                    <h3>{{ $item->produk->nama }}</h3>
                    <p class="price">Rp {{ number_format($item->produk->harga,0,',','.') }}</p>

                    <form action="{{ route('user.cart.update', $item->id) }}" method="POST" class="qty-form">
                        @csrf
                        <button type="submit" name="qty" value="{{ $item->qty - 1 }}" class="qty-btn" {{ $item->qty == 1 ? 'disabled' : '' }}>-</button>
                        <input type="text" value="{{ $item->qty }}" readonly>
                        <button type="submit" name="qty" value="{{ $item->qty + 1 }}" class="qty-btn">+</button>
                    </form>
                </div>

                <div class="cart-total">
                    Rp {{ number_format($item->qty * $item->produk->harga,0,',','.') }}
                </div>

                <form action="{{ route('user.cart.delete', $item->id) }}" method="POST">
                    @csrf
                    <button class="delete-btn">🗑️</button>
                </form>

            </div>
            @endforeach

        </div>

        <div class="checkout-box">
            <h3>Total: <span>Rp {{ number_format($total,0,',','.') }}</span></h3>
            <a href="{{ route('user.checkout') }}" class="btn-checkout">
                Checkout Sekarang
            </a>

        </div>
    @endif

</div>

</x-layoutUser>
