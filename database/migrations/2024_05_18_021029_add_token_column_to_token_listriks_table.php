<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTokenColumnToTokenListriksTable extends Migration
{
    public function up()
    {
        Schema::table('token_listriks', function (Blueprint $table) {
            $table->string('token', 20)->nullable()->after('bukti_pembayaran');
        });
    }

    public function down()
    {
        Schema::table('token_listriks', function (Blueprint $table) {
            $table->dropColumn('token');
        });
    }
}
