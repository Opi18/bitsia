<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jurnal_umum;

class JurnalUmumPemilikController extends Controller
{
	public function index()
	{
		$ju = Jurnal_umum::all()->groupBy('periode_ju');
		return view('pemilik.pages.detail_jurnal_umum_pemilik', compact('ju'));
	}

	public function detail($periode)
	{
		$transaksi = Jurnal_umum::where('periode_ju', $periode)->get()->sortBy('tgl_ju');
		$jtransaksi = Jurnal_umum::where('periode_ju', $periode)->get()->count();
		return view('pemilik.pages.jurnal_umum_pemilik',compact('periode', 'transaksi', 'jtransaksi'));
	}
}
