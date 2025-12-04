<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class KategoriController extends Controller
{
    /* =========================
     | ADMIN AREA
     ========================= */

    public function index(Request $request)
    {
        $kategori = Kategori::when($request->search, function ($query) use ($request) {
            $query->where('nama', 'like', "%{$request->search}%");
        })->latest()->paginate(10);

        return view('admin.kategori.index', compact('kategori'));
    }

    public function create()
    {
        return view('admin.kategori.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|max:255',
            'icon_file' => 'nullable|image|mimes:png,jpg,jpeg,svg|max:2048'
        ]);

        $filename = null;

        if ($request->hasFile('icon_file')) {
            $filename = time() . '-' . $request->icon_file->getClientOriginalName();
            $request->icon_file->storeAs('kategori', $filename, 'public');
        }

        Kategori::create([
            'nama' => $request->nama,
            'icon_file' => $filename,
            'status' => $request->status,
        ]);

        return redirect()->route('admin.kategori.index')->with('success', 'Kategori berhasil ditambahkan.');
    }

    public function edit(Kategori $kategori)
    {
        return view('admin.kategori.edit', compact('kategori'));
    }

    public function update(Request $request, Kategori $kategori)
    {
        $request->validate([
            'nama' => 'required|max:255',
            'icon_file' => 'nullable|image|mimes:png,jpg,jpeg,svg|max:2048'
        ]);

        $filename = $kategori->icon_file;

        if ($request->hasFile('icon_file')) {
            if ($filename && file_exists(public_path('storage/kategori/' . $filename))) {
                unlink(public_path('storage/kategori/' . $filename));
            }

            $filename = time() . '-' . $request->file('icon_file')->getClientOriginalName();
            $request->file('icon_file')->storeAs('kategori', $filename, 'public');
        }

        $kategori->update([
            'nama' => $request->nama,
            'icon_file' => $filename,
            'status' => $request->status,
        ]);

        return redirect()->route('admin.kategori.index')->with('success', 'Kategori berhasil diperbarui.');
    }

    public function destroy(Kategori $kategori)
    {
        if ($kategori->icon_file && file_exists(public_path('storage/kategori/' . $kategori->icon_file))) {
            unlink(public_path('storage/kategori/' . $kategori->icon_file));
        }

        $kategori->delete();

        return redirect()->route('admin.kategori.index')->with('success', 'Kategori berhasil dihapus.');
    }


    /* =========================
     | USER AREA
     ========================= */

    public function dashboardKategori()
    {
        $kategori = Kategori::where('status', 'aktif')->get();
        return view('user.dashboard', compact('kategori'));
    }

    public function userKategori()
    {
        $kategori = Kategori::where('status', 'aktif')->get();
        return view('user.kategori.index', compact('kategori'));
    }

    public function kategoriDetail($id)
    {
        $kategori = Kategori::findOrFail($id);
        $products = Produk::where('kategori_id', $id)->get();

        return view('user.kategori.detail', compact('kategori', 'produks'));
    }
}
