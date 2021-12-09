<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Laporan_keuangan;
use App\Models\Neraca_saldo;

class NeracaPemilikController extends Controller
{
	public function index()
	{
		$lk = Laporan_keuangan::all()->groupBy('periode_lk');
		return view('pemilik.pages.neraca_pemilik', compact('lk'));
	}

	public function detail($periode)
	{
		// GetKas
		// cek
		$kas = Neraca_saldo::where('periode_ns', $periode)->where('daftar_akuns_id', 1)->get()->first();
		if ($kas != null) {
			$GetKasThisPeriodeKredit = Neraca_saldo::where('periode_ns', $periode)->where('daftar_akuns_id', 1)->get()->first()->kredit_ns;
			$GetKasThisPeriodeDebet = Neraca_saldo::where('periode_ns', $periode)->where('daftar_akuns_id', 1)->get()->first()->debet_ns;
			if ($GetKasThisPeriodeKredit) {
				$GetKasThisPeriode=$GetKasThisPeriodeKredit;
			}elseif ($GetKasThisPeriodeDebet) {
				$GetKasThisPeriode=$GetKasThisPeriodeDebet;
			}
		}else{
			$GetKasThisPeriode=0;
		}

		// GetBank
		// cek
		$bank = Neraca_saldo::where('periode_ns', $periode)->where('daftar_akuns_id', 4)->get()->first();
		if ($bank != null) {
			$GetBankThisPeriodeKredit = Neraca_saldo::where('periode_ns', $periode)->where('daftar_akuns_id', 4)->get()->first()->kredit_ns;
			$GetBankThisPeriodeDebet = Neraca_saldo::where('periode_ns', $periode)->where('daftar_akuns_id', 4)->get()->first()->debet_ns;
			if ($GetBankThisPeriodeKredit) {
				$GetBankThisPeriode=$GetBankThisPeriodeKredit;
			}elseif ($GetBankThisPeriodeDebet) {
				$GetBankThisPeriode=$GetBankThisPeriodeDebet;
			}
		}else{
			$GetBankThisPeriode=0;
		}

		// GetPiutang
		// cek
		$piutang = Neraca_saldo::where('periode_ns', $periode)->where('daftar_akuns_id', 5)->get()->first();
		if ($piutang != null) {
			$GetPiutangThisPeriodeKredit = Neraca_saldo::where('periode_ns', $periode)->where('daftar_akuns_id', 5)->get()->first()->kredit_ns;
			$GetPiutangThisPeriodeDebet = Neraca_saldo::where('periode_ns', $periode)->where('daftar_akuns_id', 5)->get()->first()->debet_ns;
			if ($GetPiutangThisPeriodeKredit) {
				$GetPiutangThisPeriode=$GetPiutangThisPeriodeKredit;
			}elseif ($GetPiutangThisPeriodeDebet) {
				$GetPiutangThisPeriode=$GetPiutangThisPeriodeDebet;
			}
		}else{
			$GetPiutangThisPeriode=0;
		}

		// GetPeralatan
		// cek
		$peralatan = Neraca_saldo::where('periode_ns', $periode)->where('daftar_akuns_id', 8)->get()->first();
		if ($peralatan != null) {
			$GetPeralatanThisPeriodeKredit = Neraca_saldo::where('periode_ns', $periode)->where('daftar_akuns_id', 8)->get()->first()->kredit_ns;
			$GetPeralatanThisPeriodeDebet = Neraca_saldo::where('periode_ns', $periode)->where('daftar_akuns_id', 8)->get()->first()->debet_ns;
			if ($GetPeralatanThisPeriodeKredit) {
				$GetPeralatanThisPeriode=$GetPeralatanThisPeriodeKredit;
			}elseif ($GetPeralatanThisPeriodeDebet) {
				$GetPeralatanThisPeriode=$GetPeralatanThisPeriodeDebet;
			}
		}else{
			$GetPeralatanThisPeriode=0;
		}

		// GetPerlengkapan
		// cek
		$perlengkapan = Neraca_saldo::where('periode_ns', $periode)->where('daftar_akuns_id', 12)->get()->first();
		if ($perlengkapan != null) {
			$GetPerlengkapanThisPeriodeKredit = Neraca_saldo::where('periode_ns', $periode)->where('daftar_akuns_id', 12)->get()->first()->kredit_ns;
			$GetPerlengkapanThisPeriodeDebet = Neraca_saldo::where('periode_ns', $periode)->where('daftar_akuns_id', 12)->get()->first()->debet_ns;
			if ($GetPerlengkapanThisPeriodeKredit) {
				$GetPerlengkapanThisPeriode=$GetPerlengkapanThisPeriodeKredit;
			}elseif ($GetPerlengkapanThisPeriodeDebet) {
				$GetPerlengkapanThisPeriode=$GetPerlengkapanThisPeriodeDebet;
			}
		}else{
			$GetPerlengkapanThisPeriode=0;
		}

		// GetUtangUsaha
		// cek
		$perlengkapan = Neraca_saldo::where('periode_ns', $periode)->where('daftar_akuns_id', 11)->get()->first();
		if ($perlengkapan != null) {
			$GetUtangUsahaThisPeriodeKredit = Neraca_saldo::where('periode_ns', $periode)->where('daftar_akuns_id', 11)->get()->first()->kredit_ns;
			$GetUtangUsahaThisPeriodeDebet = Neraca_saldo::where('periode_ns', $periode)->where('daftar_akuns_id', 11)->get()->first()->debet_ns;
			if ($GetUtangUsahaThisPeriodeKredit) {
				$GetUtangUsahaThisPeriode=$GetUtangUsahaThisPeriodeKredit;
			}elseif ($GetUtangUsahaThisPeriodeDebet) {
				$GetUtangUsahaThisPeriode=$GetUtangUsahaThisPeriodeDebet;
			}
		}else{
			$GetUtangUsahaThisPeriode=0;
		}

		// GetPerubahanModal
		$GetModalAkhirThisPeriode = Laporan_keuangan::where('jenis_laporan', 'Perubahan Modal')->where('periode_lk',$periode)->get()->first()->nominal_lk;

		$GetActiva = $GetKasThisPeriode+$GetBankThisPeriode+$GetPiutangThisPeriode+$GetPeralatanThisPeriode+$GetPerlengkapanThisPeriode;

		$GetPasiva = $GetUtangUsahaThisPeriode+$GetModalAkhirThisPeriode;

		return view('pemilik.pages.detail_neraca_pemilik',compact('periode', 'GetKasThisPeriode', 'GetBankThisPeriode', 'GetPiutangThisPeriode', 'GetPeralatanThisPeriode', 'GetPerlengkapanThisPeriode', 'GetUtangUsahaThisPeriode', 'GetModalAkhirThisPeriode', 'GetActiva', 'GetPasiva'));
	}
}

}
