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
        Schema::create('portofolio', function (Blueprint $table) {
        $table->increments('portofolio_id');
        $table->string('judul_acara', 150);
        $table->string('lokasi', 100);
        $table->date('tanggal_acara');
        $table->text('deskripsi')->nullable();

        $table->unsignedInteger('jenis_acara_id');
        $table->unsignedInteger('layanan_id');

        $table->foreign('jenis_acara_id')
            ->references('jenis_acara_id')->on('jenis_acara')
            ->restrictOnDelete();
        $table->foreign('layanan_id')
            ->references('layanan_id')->on('layanan')
            ->restrictOnDelete();

        $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('portofolio');
    }
};
