<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JenisAcara extends Model
{
    protected $table = 'jenis_acara';
    protected $primaryKey = 'jenis_acara_id';
    protected $fillable = ['nama_jenis', 'keterangan'];

    public function portofolio()
    {
        return $this->hasMany(Portofolio::class, 'jenis_acara_id', 'jenis_acara_id');
    }
}
