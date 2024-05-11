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
        Schema::table('users', function (Blueprint $table) {
            $table->index('nim'); // Menambahkan indeks untuk kolom 'nim'
            $table->foreign('gender')->references('gender')->on('rooms')->onDelete('set null');
        });

        Schema::table('rooms', function (Blueprint $table) {
            $table->index('gender');
            // Menambahkan kunci asing ke tabel users
            $table->foreign('penghuni')->references('nim')->on('users')->onDelete('set null');
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('rooms', function (Blueprint $table) {
            // Menghapus kunci asing
            $table->dropForeign(['penghuni']);
         
        });

        Schema::table('users', function (Blueprint $table) {
            $table->dropIndex(['nim']); // Menghapus indeks untuk kolom 'nim'
        });
    }
};
