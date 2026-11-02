<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Portofolio extends Model
{
    protected $table = 'portofolio';
    protected $primaryKey = 'portofolio_id';
    protected $fillable = [
        'judul_acara', 'lokasi', 'tanggal_acara', 'deskripsi',
        'jenis_acara_id', 'layanan_id',
    ];

    public function jenisAcara()
    {
        return $this->belongsTo(JenisAcara::class, 'jenis_acara_id', 'jenis_acara_id');
    }

    public function layanan()
    {
        return $this->belongsTo(Layanan::class, 'layanan_id', 'layanan_id');
    }
}
