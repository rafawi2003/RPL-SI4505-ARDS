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
        Schema::table('users', function (Blueprint $table) {
            $table->index('nim', 'nim_index');
        });
        Schema::table('rooms', function (Blueprint $table) {
            $table->index('gender', 'gender_index');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropIndex('nim_index');
        });
        Schema::table('rooms', function (Blueprint $table) {
            $table->dropIndex('gender_index');
        });
    }
};
