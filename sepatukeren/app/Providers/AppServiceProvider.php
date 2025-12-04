<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Kategori;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void {}

    public function boot(): void
    {
        // Share kategori ke navbar user
        View::composer('components.navbar', function ($view) {
            $view->with('kategoriNavbar', Kategori::where('status', 'aktif')->get());
        });
    }
}
