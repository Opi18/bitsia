<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Laporan_keuangan;
use App\Models\Neraca_saldo;

class PerubahanModalController extends Controller
{
	public function index()
	{
		$pm = Laporan_keuangan::all()->groupBy('periode_lk');
		return view('admins.pages.perubahan_modal', compact('pm'));
	}

	public function detail($periode)
	{
		// GetModalAwal
		$GetModalAwalThisPeriodeKredit = Neraca_saldo::where('periode_ns', $periode)->where('daftar_akuns_id', 3)->get()->first()->kredit_ns;
		$GetModalAwalThisPeriodeDebet = Neraca_saldo::where('periode_ns', $periode)->where('daftar_akuns_id', 3)->get()->first()->debet_ns;
		if ($GetModalAwalThisPeriodeKredit) {
			$GetModalAwalThisPeriode=$GetModalAwalThisPeriodeKredit;
		}elseif ($GetModalAwalThisPeriodeDebet) {
			$GetModalAwalThisPeriode=$GetModalAwalThisPeriodeDebet;
		}

		// GetPrive
		$GetPriveThisPeriodeKredit = Neraca_saldo::where('periode_ns', $periode)->where('daftar_akuns_id', 9)->get()->first()->kredit_ns;
		$GetPriveThisPeriodeDebet = Neraca_saldo::where('periode_ns', $periode)->where('daftar_akuns_id', 9)->get()->first()->debet_ns;
		if ($GetPriveThisPeriodeKredit) {
			$GetPriveThisPeriode=$GetPriveThisPeriodeKredit;
		}elseif ($GetPriveThisPeriodeDebet) {
			$GetPriveThisPeriode=$GetPriveThisPeriodeDebet;
		}

		// GetLabaRugi
		$GetLRThisPeriode = Laporan_keuangan::where('jenis_laporan', 'Laba Rugi')->where('periode_lk',$periode)->get()->first()->nominal_lk;
		
		$GetMA_LR = $GetModalAwalThisPeriode+$GetLRThisPeriode;
		$GetModalAkhir = $GetMA_LR-$GetPriveThisPeriode;

		$transaksi = Laporan_keuangan::where('periode_lk', $periode)->get()->sortBy('tgl_lk');
		$lktransaksi = Laporan_keuangan::where('periode_lk', $periode)->get()->count();
		return view('admins.pages.detail_perubahan_modal',compact('periode', 'transaksi', 'lktransaksi','GetModalAwalThisPeriode', 'GetPriveThisPeriode', 'GetLRThisPeriode', 'GetMA_LR', 'GetModalAkhir'));
	}
}
