<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected $table = 'kategori';

    protected $fillable = [
        'nama',
        'icon_file',
        'deskripsi',
        'status'
    ];

    /**
     * Relasi ke produk
     * (1 kategori punya banyak produk)
     */
    public function produk()
    {
        return $this->hasMany(Produk::class, 'kategori_id');
    }
}
