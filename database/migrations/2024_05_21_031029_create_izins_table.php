
<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('izins', function (Blueprint $table) {
            $table->id();
            $table->string('nim');
            $table->date('start');
            $table->date('end');
            $table->text('alasan');
            $table->string('status');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('izins');
    }
};
