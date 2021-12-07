<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Data_transaksi extends Model
{
	use HasFactory;
	public function Data_user()
	{
		return $this->belongsTo('App\Models\Data_user', 'data_users_id');
	}
	public function Daftar_akun()
	{
		return $this->belongsTo('App\Models\Daftar_akun', 'daftar_akuns_id');
	}
}
