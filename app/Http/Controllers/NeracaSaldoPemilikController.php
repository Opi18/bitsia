<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Neraca_saldo;

class NeracaSaldoPemilikController extends Controller
{
	public function index()
	{
		$ns = Neraca_saldo::all()->groupBy('periode_ns');
		return view('pemilik.pages.neraca_saldo_pemilik', compact('ns'));
	}

	public function detail($periode)
	{
		$transaksi = Neraca_saldo::where('periode_ns', $periode)->get()->sortBy('daftar_akuns_id');
		$nstransaksi = Neraca_saldo::where('periode_ns', $periode)->get()->count();
		return view('pemilik.pages.detail_neraca_saldo_pemilik',compact('periode', 'transaksi', 'nstransaksi'));
	}
}
