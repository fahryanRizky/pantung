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
        Schema::create('transaksi', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('toko_id');

            $table->dateTime('tanggal_waktu');
            $table->enum('metode_pembayaran',['Tunai', 'Qris']);
            $table->decimal('uang_diterima', 15, 2)->nullable();
            $table->string('bukti_qris', 255)->nullable();
            $table->enum('status',['Selesai','Dibatalkan']);
            $table->string('nomor_transaksi', 30)->unique();
            $table->timestamps();

            $table->foreign('user_id')
            ->references('id')
            ->on('users');

            $table->foreign('toko_id')
            ->references('id')
            ->on('toko');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksi');
    }
};
