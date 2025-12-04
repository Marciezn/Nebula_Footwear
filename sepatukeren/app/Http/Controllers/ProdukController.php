<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Kategori;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    /* ---------- ADMIN AREA ---------- */

    public function index(Request $request)
    {
        $produk = Produk::with('kategori')
            ->when($request->search, fn($q) =>
                $q->where('nama', 'like', "%{$request->search}%")
            )
            ->latest()
            ->paginate(10);

        return view('admin.produk.index', compact('produk'));
    }

    public function create()
    {
        $kategori = Kategori::where('status', 'aktif')->get();
        return view('admin.produk.create', compact('kategori'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'kategori_id' => 'required',
            'harga' => 'required|numeric',
            'stok' => 'required|numeric',
            'gambar' => 'nullable|image|max:2048'
        ]);

        $filename = null;

        if ($request->hasFile('gambar')) {
            $filename = time() . '-' . $request->gambar->getClientOriginalName();
            $request->gambar->storeAs('produk', $filename, 'public');
        }

        Produk::create([
            'nama' => $request->nama,
            'kategori_id' => $request->kategori_id,
            'harga' => $request->harga,
            'stok' => $request->stok,
            'gambar' => $filename,
            'deskripsi' => $request->deskripsi,
            'status' => $request->status ?? 'aktif'
        ]);

        return redirect()->route('admin.produk.index')->with('success', 'Produk berhasil ditambahkan!');
    }

    public function edit(Produk $produk)
    {
        $kategori = Kategori::where('status', 'aktif')->get();
        return view('admin.produk.edit', compact('produk', 'kategori'));
    }

    public function update(Request $request, Produk $produk)
    {
        $request->validate([
            'nama' => 'required',
            'kategori_id' => 'required',
            'harga' => 'required|numeric',
            'stok' => 'required|numeric',
            'gambar' => 'nullable|image|max:2048'
        ]);

        $filename = $produk->gambar;

        if ($request->hasFile('gambar')) {

            if ($filename && file_exists(public_path('storage/produk/' . $filename))) {
                unlink(public_path('storage/produk/' . $filename));
            }

            $filename = time() . '-' . $request->gambar->getClientOriginalName();
            $request->gambar->storeAs('produk', $filename, 'public');
        }

        $produk->update([
            'nama' => $request->nama,
            'kategori_id' => $request->kategori_id,
            'harga' => $request->harga,
            'stok' => $request->stok,
            'gambar' => $filename,
            'deskripsi' => $request->deskripsi,
            'status' => $request->status
        ]);

        return redirect()->route('admin.produk.index')->with('success', 'Produk berhasil diperbarui.');
    }

    public function destroy(Produk $produk)
    {
        if ($produk->gambar && file_exists(public_path('storage/produk/' . $produk->gambar))) {
            unlink(public_path('storage/produk/' . $produk->gambar));
        }

        $produk->delete();

        return redirect()->route('admin.produk.index')->with('success', 'Produk berhasil dihapus.');
    }

    /* ---------- USER AREA ---------- */

    public function userProduk()
    {
        $kategoriList = Kategori::where('status', 'aktif')->get();
        $produk = Produk::where('status', 'aktif')->paginate(12);
        $kategoriSelected = null;

        return view('user.produk.index', compact('produk','kategoriList','kategoriSelected'));
    }

    public function filterByKategori($id)
    {
        $kategoriList = Kategori::where('status', 'aktif')->get();
        $kategoriSelected = Kategori::findOrFail($id);

        $produk = Produk::where('kategori_id', $id)
                        ->where('status', 'aktif')
                        ->paginate(12);

        return view('user.produk.index', compact('produk', 'kategoriList', 'kategoriSelected'));
    }

    public function userProdukDetail($id)
    {
        $produk = Produk::with('kategori')->findOrFail($id);

        return view('user.produk.detail', compact('produk'));
    }
}
