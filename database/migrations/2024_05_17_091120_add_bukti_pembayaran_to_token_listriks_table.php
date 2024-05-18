<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddBuktiPembayaranToTokenListriksTable extends Migration
{
    public function up()
    {
        Schema::table('token_listriks', function (Blueprint $table) {
            $table->string('bukti_pembayaran')->nullable();
        });
    }

    public function down()
    {
        Schema::table('token_listriks', function (Blueprint $table) {
            $table->dropColumn('bukti_pembayaran');
        });
    }
}



