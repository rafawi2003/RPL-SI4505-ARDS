<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTokenListriksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('token_listriks', function (Blueprint $table) {
            $table->id();
            $table->string('jenis_transaksi', 255);
            $table->integer('nominal_transaksi');
            $table->string('status_transaksi', 255);
            $table->string('NIM', 255);
            $table->string('nama_pengguna')->nullable();
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
        Schema::dropIfExists('token_listriks');
    }
}
