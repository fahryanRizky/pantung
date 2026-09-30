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
        Schema::create('detail_transaksi_batch', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('detail_transaksi_id');
            $table->unsignedBigInteger('batch_id');

            $table->integer('jumlah');
            $table->decimal('harga_modal', 15, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_transaksi_batch');
    }
};
