<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('pembayaran_wifi', function (Blueprint $table) {
            $table->id();
            $table->string('jenis_transaksi')->default('Pembayaran Wifi');
            $table->decimal('nominal_transaksi', 10, 2)->default(150000); // Biaya per bulan
            $table->string('status_transaksi')->default('Menunggu Pembayaran');
            $table->string('nim');
            $table->string('kamar');
            $table->string('bukti_pembayaran')->nullable();
            $table->string('token')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('pembayaran_wifi');
    }
};
