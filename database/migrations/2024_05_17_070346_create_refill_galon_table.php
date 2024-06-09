<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('refill_galon', function (Blueprint $table) {
            $table->id();
            $table->string('nim');
            $table->string('nomor_kamar');
            $table->integer('jumlah_galon');
            $table->integer('total_harga');
            $table->string('bukti_pembayaran')->nullable();
            $table->string('metode_pembayaran');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('refill_galon');
    }
};
