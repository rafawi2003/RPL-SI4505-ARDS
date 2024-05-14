<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRefillGalonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('refill_galons', function (Blueprint $table) {
            $table->id();
            $table->string('nim'); // Kolom untuk menyimpan NIM pengguna
            $table->string('nomor_kamar'); // Kolom untuk menyimpan nomor kamar pengguna
            $table->integer('jumlah_galon'); // Kolom untuk menyimpan jumlah galon yang diisi
            $table->decimal('total_harga', 10, 2); // Kolom untuk menyimpan total harga
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
        Schema::dropIfExists('refill_galons');
    }
}
