<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rekening extends Model
{
    protected $table = 'rekening';
    protected $primaryKey = 'rekening_id';
    protected $fillable = ['nama_bank', 'nomor_rekening', 'atas_nama', 'status'];
}
