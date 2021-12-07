<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Data_user extends Model
{
	use HasFactory;
	public function Data_transaksi()
	{
		return $this->hasMany('App\Models\Data_transaksi');
	}
}
