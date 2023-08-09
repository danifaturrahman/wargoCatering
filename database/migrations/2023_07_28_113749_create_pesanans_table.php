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
        Schema::create('pesanans', function (Blueprint $table) {
            $table->id();
            $table->string('nomor_pesanan');
            $table->foreignId('user_id');
            $table->string('alamat_pengiriman');
            $table->string('keterangan_pengiriman');
            $table->string('harga_pengiriman');
            $table->enum('status_pengiriman', ['Belum Dikirim', 'Dalam Pengiriman', 'Sudah Dikirim']);
            $table->decimal('total_harga', 10, 2);
            $table->enum('status_pesanan', ['Belum Dibayar', 'Menunggu Pelunasan', 'Lunas']);
            $table->date('tanggal_pesanan_dibuat');
            $table->date('tanggal_pesanan_dikirim');
            $table->time('jam_pesanan_dikirim');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pesanans');
    }
};
