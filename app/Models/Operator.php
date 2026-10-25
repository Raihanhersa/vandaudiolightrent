<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Operator extends Model
{
    protected $table = 'operator';
    protected $primaryKey = 'operator_id';
    protected $fillable = [
        'nama_operator', 'email', 'no_telepon',
        'spesialisasi', 'tanggal_bergabung', 'status',
    ];
}
