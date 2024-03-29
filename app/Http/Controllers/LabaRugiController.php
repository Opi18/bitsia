<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Laporan_keuangan;
use App\Models\Neraca_saldo;

class LabaRugiController extends Controller
{
	public function index()
	{
		$lr = Laporan_keuangan::all()->groupBy('periode_lk');
		return view('admins.pages.laba_rugi', compact('lr'));
	}

	public function detail($periode)
	{	
		// GetPendapatanKotor
		$GetPendapatanKotorKredit=Neraca_saldo::where('periode_ns', $periode)->where('daftar_akuns_id', 2)->get()->first()->kredit_ns;
		$GetPendapatanKotorDebet=Neraca_saldo::where('periode_ns', $periode)->where('daftar_akuns_id', 2)->get()->first()->debet_ns;
		if ($GetPendapatanKotorKredit==null) {
			$GetPendapatanKotor=$GetPendapatanKotorDebet;
		}elseif ($GetPendapatanKotorDebet==null) {
			$GetPendapatanKotor=$GetPendapatanKotorKredit;
		}

		// GetPPN
		$GetPPNKredit=Neraca_saldo::where('periode_ns', $periode)->where('daftar_akuns_id', 14)->get()->first()->kredit_ns;
		$GetPPNDebet=Neraca_saldo::where('periode_ns', $periode)->where('daftar_akuns_id', 14)->get()->first()->debet_ns;
		if ($GetPPNKredit==null) {
			$GetPPN=$GetPPNDebet;
		}elseif ($GetPPNDebet==null) {
			$GetPPN=$GetPPNKredit;
		}

		// GetPendapatanBersih
		$GetPendapatanBersih = $GetPendapatanKotor-$GetPPN;

		// GetBebanListrikAir
		// cektersediabeban
		$CekTersediaBebanListrikAir=Neraca_saldo::where('periode_ns',$periode)->where('daftar_akuns_id', 6)->get()->first();
		if ($CekTersediaBebanListrikAir) {
			$GetBebanListrikAirKredit=Neraca_saldo::where('periode_ns',$periode)->where('daftar_akuns_id', 6)->get()->first()->kredit_ns;
			$GetBebanListrikAirDebet=Neraca_saldo::where('periode_ns',$periode)->where('daftar_akuns_id', 6)->get()->first()->debet_ns;
			if ($GetBebanListrikAirKredit==null) {
				$GetBebanListrikAir=$GetBebanListrikAirDebet;
			}elseif ($GetBebanListrikAirDebet==null) {
				$GetBebanListrikAir=$GetBebanListrikAirKredit;
			}
		}else{
			$GetBebanListrikAir=0;
		}

		// GetBebanTelepon
		// cektersediabeban
		$CekTersediaBebanTelepon=Neraca_saldo::where('periode_ns',$periode)->where('daftar_akuns_id', 7)->get()->first();
		if ($CekTersediaBebanTelepon) {
			$GetBebanTeleponKredit=Neraca_saldo::where('periode_ns',$periode)->where('daftar_akuns_id', 7)->get()->first()->kredit_ns;
			$GetBebanTeleponDebet=Neraca_saldo::where('periode_ns',$periode)->where('daftar_akuns_id', 7)->get()->first()->debet_ns;
			if ($GetBebanTeleponKredit==null) {
				$GetBebanTelepon=$GetBebanTeleponDebet;
			}elseif ($GetBebanTeleponDebet==null) {
				$GetBebanTelepon=$GetBebanTeleponKredit;
			}
		}else{
			$GetBebanTelepon=0;
		}

		// GetBebanGaji
		// cektersediabeban
		$CekTersediaBebanGaji=Neraca_saldo::where('periode_ns',$periode)->where('daftar_akuns_id', 10)->get()->first();
		if ($CekTersediaBebanGaji) {
			$GetBebanGajiKredit=Neraca_saldo::where('periode_ns',$periode)->where('daftar_akuns_id', 10)->get()->first()->kredit_ns;
			$GetBebanGajiDebet=Neraca_saldo::where('periode_ns',$periode)->where('daftar_akuns_id', 10)->get()->first()->debet_ns;
			if ($GetBebanGajiKredit==null) {
				$GetBebanGaji=$GetBebanGajiDebet;
			}elseif ($GetBebanGajiDebet==null) {
				$GetBebanGaji=$GetBebanGajiKredit;
			}
		}else{
			$GetBebanGaji=0;
		}

		// GetPPH21
		// cektersediabeban
		$CekTersediaPPH21=Neraca_saldo::where('periode_ns',$periode)->where('daftar_akuns_id', 15)->get()->first();
		if ($CekTersediaPPH21) {
			$GetPPH21Kredit=Neraca_saldo::where('periode_ns',$periode)->where('daftar_akuns_id', 15)->get()->first()->kredit_ns;
			$GetPPH21Debet=Neraca_saldo::where('periode_ns',$periode)->where('daftar_akuns_id', 15)->get()->first()->debet_ns;
			if ($GetPPH21Kredit==null) {
				$GetPPH21=$GetPPH21Debet;
			}elseif ($GetPPH21Debet==null) {
				$GetPPH21=$GetPPH21Kredit;
			}
		}else{
			$GetPPH21=0;
		}

		$GetTotalBeban = $GetBebanListrikAir+$GetBebanTelepon+$GetBebanGaji+$GetPPH21;
		$GetLabaKotor = $GetPendapatanBersih-$GetTotalBeban;
		if ($GetLabaKotor < 0) {
			$GetPPH25 = 0;
		}elseif ($GetLabaKotor <= 50000000) {
			$GetPPH25 = $GetLabaKotor*0.05;
		}elseif ($GetLabaKotor <= 250000000) {
			$GetPPH25 = $GetLabaKotor*0.15;
		}elseif ($GetLabaKotor <= 500000000) {
			$GetPPH25 = $GetLabaKotor*0.25;
		}elseif ($GetLabaKotor > 500000000) {
			$GetPPH25 = $GetLabaKotor*0.3;
		}
		$GetLabaBersih=$GetLabaKotor-$GetPPH25;

		return view('admins.pages.detail_laba_rugi',compact('periode', 'GetPendapatanKotor', 'GetPPN', 'GetPendapatanBersih', 'GetBebanListrikAir', 'GetBebanGaji', 'GetBebanTelepon', 'GetPPH21', 'GetTotalBeban', 'GetLabaKotor', 'GetPPH25', 'GetLabaBersih'));
	}
}
