<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('carts', function (Blueprint $table) {
            $table->id();

            // relasi user & produk
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('produk_id');

            // quantity/w jumlah barang
            $table->integer('qty')->default(1);

            $table->timestamps();

            // foreign key
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('produk_id')->references('id')->on('produk')->onDelete('cascade'); 
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('carts');
    }
};
