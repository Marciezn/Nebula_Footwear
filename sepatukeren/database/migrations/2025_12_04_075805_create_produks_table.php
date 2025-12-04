<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('produk', function (Blueprint $table) {
            $table->id();

            // Relasi kategori
            $table->unsignedBigInteger('kategori_id');

            // Data produk
            $table->string('nama');
            $table->string('gambar')->nullable();
            $table->integer('harga');
            $table->integer('stok')->default(0);
            $table->text('deskripsi')->nullable();

            // status aktif / nonaktif
            $table->enum('status', ['aktif', 'nonaktif'])->default('aktif');

            $table->timestamps();

            // Foreign key rule
            $table->foreign('kategori_id')
                ->references('id')->on('kategori')
                ->onDelete('cascade'); // kalau kategori dihapus → produk ikut delete
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produk');
    }
};
