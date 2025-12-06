<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Produk;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $cart = Cart::where('user_id', auth()->id())->with('produk')->get();
        $total = $cart->sum(fn($item) => $item->produk->harga * $item->qty);

        return view('user.cart.index', compact('cart', 'total'));
    }

    public function add($id)
    {
        $cart = Cart::where('user_id', auth()->id())
                    ->where('produk_id', $id)
                    ->first();

        if ($cart) {
            $cart->increment('qty');
        } else {
            Cart::create([
                'user_id' => auth()->id(),
                'produk_id' => $id,
                'qty' => 1,
            ]);
        }

        return back()->with('success', 'Produk berhasil ditambahkan ke keranjang 🛒');
    }

    public function updateQty(Request $request, $id)
    {
        $cart = Cart::findOrFail($id);
        $cart->update(['qty' => $request->qty]);

        return back();
    }

    public function destroy($id)
    {
        Cart::findOrFail($id)->delete();

        return back()->with('success', 'Item dihapus dari keranjang.');
    }

    public function checkout()
{
    $cart = Cart::where('user_id', auth()->id())->with('produk')->get();
    $total = $cart->sum(fn($item) => $item->produk->harga * $item->qty);

    if ($cart->isEmpty()) {
        return redirect()->route('user.cart')->with('error', 'Keranjang masih kosong!');
    }

    return view('user.checkout.index', compact('cart', 'total'));
}

public function placeOrder(Request $request)
{
    $request->validate([
        'nama' => 'required',
        'telepon' => 'required',
        'alamat' => 'required',
    ]);

    $cart = Cart::where('user_id', auth()->id())->with('produk')->get();
    $total = $cart->sum(fn($item) => $item->produk->harga * $item->qty);

    // Save order
    $order = Order::create([
        'user_id' => auth()->id(),
        'nama' => $request->nama,
        'telepon' => $request->telepon,
        'alamat' => $request->alamat,
        'metode_pembayaran' => $request->metode_pembayaran,
        'total' => $total,
    ]);

    // Save order items
    foreach ($cart as $item) {
        OrderItem::create([
            'order_id' => $order->id,
            'produk_id' => $item->produk_id,
            'qty' => $item->qty,
            'subtotal' => $item->produk->harga * $item->qty
        ]);
    }

    // clear cart
    Cart::where('user_id', auth()->id())->delete();

    return redirect()->route('user.order.success', $order->id);
}

}
