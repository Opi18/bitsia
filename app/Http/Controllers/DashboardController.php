<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Laporan_keuangan;

class DashboardController extends Controller
{
	public function index()
	{
		$dataLabaRugi = Laporan_keuangan::where('jenis_laporan', 'Laba Rugi')->where('tahun_lk', date('Y'))->get();
		// getDataBulan
		$bulanLabaRugi=array();
		foreach ($dataLabaRugi as $value) {
			$bulanLabaRugi[]=date("M", strtotime($value->periode_lk));
		}
		$bulanLabaRugiEncode=json_encode($bulanLabaRugi);

		// GetDataNominal
		$nominalLabaRugi=array();
		foreach ($dataLabaRugi as $value) {
			$nominalLabaRugi[]=$value->nominal_lk;
		}
		$nominalLabaRugiEncode=json_encode($nominalLabaRugi);



		$dataPerubahanModal = Laporan_keuangan::where('jenis_laporan', 'Perubahan Modal')->where('tahun_lk', date('Y'))->get();
		// getDataBulan
		$bulanPerubahanModal=array();
		foreach ($dataPerubahanModal as $value) {
			$bulanPerubahanModal[]=date("M", strtotime($value->periode_lk));
		}
		$bulanPerubahanModalEncode=json_encode($bulanPerubahanModal);

		// GetDataNominal
		$nominalPerubahanModal=array();
		foreach ($dataPerubahanModal as $value) {
			$nominalPerubahanModal[]=$value->nominal_lk;
		}
		$nominalPerubahanModalEncode=json_encode($nominalPerubahanModal);


		$dataNeraca = Laporan_keuangan::where('jenis_laporan', 'Neraca')->where('tahun_lk', date('Y'))->get();
		// getDataBulan
		$bulanNeraca=array();
		foreach ($dataNeraca as $value) {
			$bulanNeraca[]=date("M", strtotime($value->periode_lk));
		}
		$bulanNeracaEncode=json_encode($bulanNeraca);

		// GetDataNominal
		$nominalNeraca=array();
		foreach ($dataNeraca as $value) {
			$nominalNeraca[]=$value->nominal_lk;
		}
		$nominalNeracaEncode=json_encode($nominalNeraca);
		return view('admins.pages.dashboard', compact('bulanLabaRugiEncode', 'nominalLabaRugiEncode', 'bulanPerubahanModalEncode', 'nominalPerubahanModalEncode', 'bulanNeracaEncode', 'nominalNeracaEncode'));
	}
}
