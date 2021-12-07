<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Daftar_akun extends Model
{
	use HasFactory;
	public function Data_transaksi()
	{
		return $this->hasMany('App\Models\Data_transaksi');
	}

	public function Buku_besar()
	{
		return $this->hasMany('App\Models\Buku_besar');
	}

	public function Neraca_saldo()
	{
		return $this->hasMany('App\Models\Neraca_saldo');
	}

	public function Jurnal_umum()
	{
		return $this->hasMany('App\Models\Jurnal_umum');
	}
}
