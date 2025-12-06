<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');

            $table->string('nama');
            $table->string('telepon');
            $table->text('alamat');
            $table->string('metode_pembayaran')->default('COD');
            $table->integer('total');

            $table->enum('status', ['pending','dibayar','dikirim','selesai'])
                ->default('pending');

            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down(): void {
        Schema::dropIfExists('orders');
    }
};

