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
        Schema::create('layanan', function (Blueprint $table) {
             $table->increments('layanan_id');
                $table->string('nama_layanan', 100);
                $table->enum('kategori', ['Sound System', 'Videotron', 'Lighting', 'Paket Lengkap']);
                $table->text('deskripsi')->nullable();
                $table->decimal('harga_per_hari', 12, 2);
                $table->unsignedInteger('stok')->default(1);
                $table->enum('status', ['tersedia', 'tidak tersedia'])->default('tersedia');
                $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('layanan');
    }
};
