<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Neraca_saldo;

class NeracaSaldoController extends Controller
{
	public function index()
	{
		$ns = Neraca_saldo::all()->groupBy('periode_ns');
		return view('admins.pages.neraca_saldo', compact('ns'));
	}

	public function detail($periode)
	{
		$transaksi = Neraca_saldo::where('periode_ns', $periode)->get()->sortBy('daftar_akuns_id');
		$nstransaksi = Neraca_saldo::where('periode_ns', $periode)->get()->count();
		return view('admins.pages.detail_neraca_saldo',compact('periode', 'transaksi', 'nstransaksi'));
	}
}
