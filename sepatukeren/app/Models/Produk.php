<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    protected $table = 'produk';

    protected $fillable = [
        'nama',
        'kategori_id',
        'harga',
        'stok',
        'deskripsi',
        'gambar',
        'status'
    ];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }
}
