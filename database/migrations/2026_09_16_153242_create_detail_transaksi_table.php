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
        Schema::create('detail_transaksi', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('transaksi_id');
            $table->unsignedBigInteger('produk_toko_id');

            $table->integer('jumlah');
            $table->decimal('harga_jual', 15, 2);
            $table->decimal('harga_modal', 15, 2);
            $table->timestamps();

            $table->foreign('transaksi_id')
            ->references('id')
            ->on('transaksi');

            $table->foreign('produk_toko_id')
            ->references('id')
            ->on('produk_toko');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_transaksi');
    }
};
