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
        Schema::table('detail_transaksi_batch', function (Blueprint $table) {
            $table->foreign('detail_transaksi_id')
            ->references('id')
            ->on('detail_transaksi');
        });

        Schema::table('detail_transaksi_batch', function (Blueprint $table) {
            $table->foreign('batch_id')
            ->references('id')
            ->on('batch');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('detail_transaksi', function (Blueprint $table) {
            //
        });
    }
};
