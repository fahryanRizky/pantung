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
        Schema::create('batch', function (Blueprint $table) {
            $table->id();

            $table->string('nomor_batch', 255);
            $table->integer('jumlah');
            $table->decimal('harga_modal', 15, 2);
            $table->date('tanggal_masuk');

            $table->unsignedBigInteger('stock_id');
            $table->timestamps();

            $table->foreign('stock_id')
            ->references('id')
            ->on('stock')
            ->restrictOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('batch');
    }
};
