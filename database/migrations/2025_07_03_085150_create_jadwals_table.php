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
    Schema::create('jadwals', function (Blueprint $table) {
        $table->id();
        $table->foreignId('dosen_id')->constrained('dosens')->onDelete('cascade');
        $table->foreignId('prodi_id')->constrained('prodis')->onDelete('cascade');
        $table->foreignId('matakuliah_id')->constrained('matakuliahs')->onDelete('cascade');
        $table->string('hari');
        $table->string('jam_kuliah');
        $table->string('ruang');
        $table->timestamps();
    });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jadwals');
    }
};
