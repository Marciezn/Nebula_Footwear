<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    protected $fillable = ['order_id','produk_id','qty','subtotal'];

    public function produk() {
        return $this->belongsTo(Produk::class);
    }
}

