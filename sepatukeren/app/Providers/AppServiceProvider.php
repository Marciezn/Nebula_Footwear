<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Kategori;
use App\Models\Cart;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void {}

    public function boot(): void
    {
        View::composer('*', function ($view) {
            // ambil kategori aktif
            $kategoriNavbar = Kategori::where('status', 'aktif')->get();

            // hitung jumlah item di cart
            $cartCount = Auth::check()
                ? Cart::where('user_id', Auth::id())->sum('qty')
                : 0;

            $view->with([
                'kategoriNavbar' => $kategoriNavbar,
                'cartCount' => $cartCount
            ]);
        });
    }
}
