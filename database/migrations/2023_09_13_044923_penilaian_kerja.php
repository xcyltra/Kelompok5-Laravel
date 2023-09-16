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
        Schema::create('penilaian_kerjas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pegawai_id');
            $table->date('tgl_review');
            $table->unsignedBigInteger('evaluator');
            $table->unsignedBigInteger('kategori_id');
            $table->unsignedBigInteger('nilai_id');
            $table->text('komentar');
            $table->timestamps();

            $table->foreign('pegawai_id')->references('id')->on('pegawais');
            $table->foreign('evaluator')->references('id')->on('users');
            $table->foreign('kategori_id')->references('id')->on('kategoris');
            $table->foreign('nilai_id')->references('id')->on('skala_nilais');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penilaian_kerjas');
    }
};
