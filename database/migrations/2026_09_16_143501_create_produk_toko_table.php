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
        Schema::create('produk_toko', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('toko_id');
            $table->unsignedBigInteger('produk_id');

            $table->decimal('harga_jual', 15, 2);
            $table->decimal('harga_modal_digital', 15, 2)->nullable();

            $table->enum('status',['Aktif','Nonaktif'])->default('Aktif');
            $table->timestamps();

            $table->foreign('toko_id')
            ->references('id')
            ->on('toko');

            $table->foreign('produk_id')
            ->references('id')
            ->on('master_produk');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produk_toko');
    }
};
