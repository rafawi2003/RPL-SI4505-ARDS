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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('kamar')->nullable();
            $table->string('status')->nullable();
            $table->string('nim')->nullable();
            $table->string('gender')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('usertype')->default('penghuni');
            $table->string('jurusan')->nullable(); // tambahkan kolom jurusan
            $table->string('nama_ibu')->nullable(); // tambahkan kolom nama_ibu
            $table->string('nomor_telepon')->nullable(); // tambahkan kolom nomor_telepon
            $table->string('telefon_darurat')->nullable(); // tambahkan kolom telefon_darurat
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
