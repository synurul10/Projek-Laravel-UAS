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
    Schema::create('matakuliahs', function (Blueprint $table) {
        $table->id();
        $table->string('kode_matakuliah')->unique();
        $table->string('nama_matakuliah');
        $table->integer('sks');
        $table->string('kelas');

        // Foreign key ke dosen
        $table->foreignId('dosen_id')->constrained('dosens')->onDelete('cascade');

        // Foreign key ke prodi
        $table->foreignId('prodi_id')->constrained('prodis')->onDelete('cascade');

        $table->timestamps();
    });
}
};
