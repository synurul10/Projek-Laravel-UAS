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
        Schema::create('dosens', function (Blueprint $table) {
            $table->id();
            $table->string('nidn')->unique();
            $table->string('nama_dosen');
            $table->string('email');
            $table->string('telepon');
            $table->string('alamat');
            $table->unsignedBigInteger('prodi_id');
            $table->string('jabatan_akademik');
            $table->string('pendidikan_terakhir');
            $table->timestamps();

            // relasi ke tabel prodis
            $table->foreign('prodi_id')->references('id')->on('prodis')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dosens');
    }
};
