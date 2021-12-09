<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buku_besar;
class BukuBesarPemilikController extends Controller
{
	public function index()
	{
		$bb = Buku_besar::all()->groupBy('periode_bb');
		return view('pemilik.pages.buku_besar_pemilik', compact('bb'));
	}

	public function detail($periode)
	{
		$akun = Buku_besar::where('periode_bb', $periode);
		$dataPerAkun = Buku_besar::where('periode_bb', $periode)->get()->groupBy('daftar_akuns_id');
		$transaksi = Buku_besar::where('periode_bb', $periode)->get()->sortBy('tgl_bb');
		$bbtransaksi = Buku_besar::where('periode_bb', $periode)->get()->count();
	}
	return view('pemilik.pages.detail_buku_besar_pemilik',compact('periode', 'transaksi', 'bbtransaksi', 'akun', 'dataPerAkun'));
}
