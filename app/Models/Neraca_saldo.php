<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Neraca_saldo extends Model
{
    use HasFactory;
    public function Daftar_akun()
    {
        return $this->belongsTo('App\Models\Daftar_akun', 'daftar_akuns_id');
    }
}
