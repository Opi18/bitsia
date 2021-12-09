<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Data_transaksi;
use App\Models\Jurnal_umum;
use App\Models\Buku_besar;
use App\Models\Neraca_saldo;
use App\Models\Laporan_keuangan;

class DataTransaksiPemilikController extends Controller
{
	public function index()
	{
		$data_pemasukan=Data_transaksi::where('jenis_transaksi', 'Data Pemasukan')->where('transaksi_dibatalkan', 0)->get();
		$data_pengeluaran=Data_transaksi::where('jenis_transaksi', 'Data Pengeluaran')->where('transaksi_dibatalkan', 0)->get();
		$data_hutang=Data_transaksi::where('jenis_transaksi', 'Data Hutang')->where('transaksi_dibatalkan', 0)->get();
		$data_piutang=Data_transaksi::where('jenis_transaksi', 'Data Piutang')->where('transaksi_dibatalkan', 0)->get();
		return view('pemilik.pages.data_transaksi_pemilik', compact('data_pemasukan','data_pengeluaran','data_hutang','data_piutang'));
	}

	public function generate(Request $request)
	{
		$tgl_awal=$request->tgl_awal;
		$tgl_akhir=$request->tgl_akhir;
		$laporanke=$request->laporan; 
		$data_transaksi = Data_transaksi::where('transaksi_dibatalkan', 0)->whereBetween('tgl_transaksi',[$tgl_awal,$tgl_akhir])->get();
		$jumtransaksi = Data_transaksi::where('transaksi_dibatalkan', 0)->whereBetween('tgl_transaksi',[$tgl_awal,$tgl_akhir])->get()->count();
		// return $data_transaksi;
		
		$ju = Jurnal_umum::where('periode_ju', $tgl_akhir);
		$dataBB = Buku_besar::where('periode_bb', $tgl_akhir);
		$dataNS = Neraca_saldo::where('periode_ns', $tgl_akhir);
		$dataLaporanKeuangan = Laporan_keuangan::where('periode_lk', $tgl_akhir);
		if ($ju != null) {
			$dataLaporanKeuangan->delete();
			$dataNS->delete();
			$dataBB->delete();
			$ju->delete();
			for ($i=0; $i < $jumtransaksi; $i++) { 
				$ju = new Jurnal_umum;
				$ju->daftar_akuns_id=$data_transaksi[$i]['daftar_akuns_id'];
				$ju->data_transaksis_id = $data_transaksi[$i]['id'];
				$ju->tgl_ju = $data_transaksi[$i]['tgl_transaksi'];
				if (($data_transaksi[$i]['daftar_akuns_id'] == 1 AND $data_transaksi[$i]['jenis_transaksi'] == 'Data Pemasukan') OR ($data_transaksi[$i]['daftar_akuns_id'] == 4 AND $data_transaksi[$i]['jenis_transaksi'] == 'Data Pemasukan') OR ($data_transaksi[$i]['daftar_akuns_id'] == 5 AND $data_transaksi[$i]['jenis_transaksi'] == 'Data Piutang') OR ($data_transaksi[$i]['daftar_akuns_id'] == 14 AND $data_transaksi[$i]['jenis_transaksi'] == 'Data Pemasukan') OR ($data_transaksi[$i]['daftar_akuns_id'] == 6 AND $data_transaksi[$i]['jenis_transaksi'] == 'Data Pengeluaran') OR ($data_transaksi[$i]['daftar_akuns_id'] == 7 AND $data_transaksi[$i]['jenis_transaksi'] == 'Data Pengeluaran') OR ($data_transaksi[$i]['daftar_akuns_id'] == 8 AND $data_transaksi[$i]['jenis_transaksi'] == 'Data Pemasukan') OR ($data_transaksi[$i]['daftar_akuns_id'] == 9 AND $data_transaksi[$i]['jenis_transaksi'] == 'Data Pengeluaran') OR ($data_transaksi[$i]['daftar_akuns_id'] == 10 AND $data_transaksi[$i]['jenis_transaksi'] == 'Data Pengeluaran') OR ($data_transaksi[$i]['daftar_akuns_id'] == 15 AND $data_transaksi[$i]['jenis_transaksi'] == 'Data Pengeluaran')) {

					$ju->debet_ju = $data_transaksi[$i]['nominal_transaksi'];

				}else{

					$ju->kredit_ju = $data_transaksi[$i]['nominal_transaksi'];

				}
				$ju->keterangan_ju = $data_transaksi[$i]['keterangan_transaksi'];
				$ju->periode_ju = $tgl_akhir;
				$ju->save();
			}
		}else{
			for ($i=0; $i < $jumtransaksi; $i++) { 
				$ju = new Jurnal_umum;
				$ju->daftar_akuns_id=$data_transaksi[$i]['daftar_akuns_id'];
				$ju->data_transaksis_id = $data_transaksi[$i]['id'];
				$ju->tgl_ju = $data_transaksi[$i]['tgl_transaksi'];
				if (($data_transaksi[$i]['daftar_akuns_id'] == 1 AND $data_transaksi[$i]['jenis_transaksi'] == 'Data Pemasukan') OR ($data_transaksi[$i]['daftar_akuns_id'] == 4 AND $data_transaksi[$i]['jenis_transaksi'] == 'Data Pemasukan') OR ($data_transaksi[$i]['daftar_akuns_id'] == 5 AND $data_transaksi[$i]['jenis_transaksi'] == 'Data Pemasukan') OR ($data_transaksi[$i]['daftar_akuns_id'] == 14 AND $data_transaksi[$i]['jenis_transaksi'] == 'Data Pemasukan') OR ($data_transaksi[$i]['daftar_akuns_id'] == 6 AND $data_transaksi[$i]['jenis_transaksi'] == 'Data Pengeluaran') OR ($data_transaksi[$i]['daftar_akuns_id'] == 7 AND $data_transaksi[$i]['jenis_transaksi'] == 'Data Pengeluaran') OR ($data_transaksi[$i]['daftar_akuns_id'] == 8 AND $data_transaksi[$i]['jenis_transaksi'] == 'Data Pemasukan') OR ($data_transaksi[$i]['daftar_akuns_id'] == 9 AND $data_transaksi[$i]['jenis_transaksi'] == 'Data Pengeluaran') OR ($data_transaksi[$i]['daftar_akuns_id'] == 10 AND $data_transaksi[$i]['jenis_transaksi'] == 'Data Pengeluaran') OR ($data_transaksi[$i]['daftar_akuns_id'] == 15 AND $data_transaksi[$i]['jenis_transaksi'] == 'Data Pengeluaran')) {

					$ju->debet_ju = $data_transaksi[$i]['nominal_transaksi'];

				}else{

					$ju->kredit_ju = $data_transaksi[$i]['nominal_transaksi'];

				}
				$ju->keterangan_ju = $data_transaksi[$i]['keterangan_transaksi'];
				$ju->periode_ju = $tgl_akhir;
				$ju->save();
			}
		}

		// add buku besar
		$jumlahtrxJU = $ju->get()->count();
		$ju1=$ju->get();
		for ($bb=0; $bb < $jumlahtrxJU; $bb++) { 
			$buku_besar = new Buku_besar;
			$buku_besar->jurnal_umums_id = $ju1[$bb]['id'];
			$buku_besar->daftar_akuns_id = $ju1[$bb]['daftar_akuns_id'];
			$buku_besar->tgl_bb = $ju1[$bb]['tgl_ju'];
			$buku_besar->keterangan_bb = $ju1[$bb]['keterangan_ju'];
			if ($ju1[$bb]['debet_ju'] != null) {
				$buku_besar->debet_bb = $ju1[$bb]['debet_ju'];
			}else{
				$buku_besar->kredit_bb = $ju1[$bb]['kredit_ju'];
			}
			$buku_besar->saldo_debet_bb = null;
			$buku_besar->saldo_kredit_bb = null;
			$buku_besar->periode_bb = $ju1[$bb]['periode_ju']; 
			$buku_besar->save();
		}

		// add neraca saldo
		$dataPerAkunTotalDK = Buku_besar::where('periode_bb', $tgl_akhir)->groupBy('daftar_akuns_id')->selectRaw('sum(kredit_bb) as total_kredit, daftar_akuns_id')->selectRaw('sum(debet_bb) as total_debet, daftar_akuns_id')->get();

		$DataTotalDK=array();
		foreach ($dataPerAkunTotalDK as $dpatdk) {
			$DataTotalDK[]=$dpatdk;
		}

		for ($ns=0; $ns < count($DataTotalDK); $ns++) { 
			$neracaSaldo = new Neraca_saldo;
			$neracaSaldo->daftar_akuns_id = $DataTotalDK[$ns]['daftar_akuns_id'];
			if ($DataTotalDK[$ns]['total_debet']>$DataTotalDK[$ns]['total_kredit']) {
				$neracaSaldo->debet_ns = $DataTotalDK[$ns]['total_debet']-$DataTotalDK[$ns]['total_kredit'];
			}else{
				$neracaSaldo->kredit_ns = $DataTotalDK[$ns]['total_kredit']-$DataTotalDK[$ns]['total_debet'];
			}
			$neracaSaldo->periode_ns = $tgl_akhir;
			$neracaSaldo->save();
		}


		// add laba rugi
		// GetPendapatanKotor
		$GetPendapatanKotorKredit=Neraca_saldo::where('periode_ns', $tgl_akhir)->where('daftar_akuns_id', 2)->get()->first()->kredit_ns;
		$GetPendapatanKotorDebet=Neraca_saldo::where('periode_ns', $tgl_akhir)->where('daftar_akuns_id', 2)->get()->first()->debet_ns;
		if ($GetPendapatanKotorKredit==null) {
			$GetPendapatanKotor=$GetPendapatanKotorDebet;
		}elseif ($GetPendapatanKotorDebet==null) {
			$GetPendapatanKotor=$GetPendapatanKotorKredit;
		}

		// GetPPN
		$GetPPNKredit=Neraca_saldo::where('periode_ns', $tgl_akhir)->where('daftar_akuns_id', 14)->get()->first()->kredit_ns;
		$GetPPNDebet=Neraca_saldo::where('periode_ns', $tgl_akhir)->where('daftar_akuns_id', 14)->get()->first()->debet_ns;
		if ($GetPPNKredit==null) {
			$GetPPN=$GetPPNDebet;
		}elseif ($GetPPNDebet==null) {
			$GetPPN=$GetPPNKredit;
		}

		// GetPendapatanBersih
		$GetPendapatanBersih = $GetPendapatanKotor-$GetPPN;

		// GetBebanListrikAir
		// cektersediabeban
		$CekTersediaBebanListrikAir=Neraca_saldo::where('periode_ns',$tgl_akhir)->where('daftar_akuns_id', 6)->get();
		if ($CekTersediaBebanListrikAir) {
			$GetBebanListrikAirKredit=Neraca_saldo::where('periode_ns',$tgl_akhir)->where('daftar_akuns_id', 6)->get()->first()->kredit_ns;
			$GetBebanListrikAirDebet=Neraca_saldo::where('periode_ns',$tgl_akhir)->where('daftar_akuns_id', 6)->get()->first()->debet_ns;
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
		$CekTersediaBebanTelepon=Neraca_saldo::where('periode_ns',$tgl_akhir)->where('daftar_akuns_id', 7)->get();
		if ($CekTersediaBebanTelepon) {
			$GetBebanTeleponKredit=Neraca_saldo::where('periode_ns',$tgl_akhir)->where('daftar_akuns_id', 7)->get()->first()->kredit_ns;
			$GetBebanTeleponDebet=Neraca_saldo::where('periode_ns',$tgl_akhir)->where('daftar_akuns_id', 7)->get()->first()->debet_ns;
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
		$CekTersediaBebanGaji=Neraca_saldo::where('periode_ns',$tgl_akhir)->where('daftar_akuns_id', 10)->get();
		if ($CekTersediaBebanGaji) {
			$GetBebanGajiKredit=Neraca_saldo::where('periode_ns',$tgl_akhir)->where('daftar_akuns_id', 10)->get()->first()->kredit_ns;
			$GetBebanGajiDebet=Neraca_saldo::where('periode_ns',$tgl_akhir)->where('daftar_akuns_id', 10)->get()->first()->debet_ns;
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
		$CekTersediaPPH21=Neraca_saldo::where('periode_ns',$tgl_akhir)->where('daftar_akuns_id', 15)->get();
		if ($CekTersediaPPH21) {
			$GetPPH21Kredit=Neraca_saldo::where('periode_ns',$tgl_akhir)->where('daftar_akuns_id', 15)->get()->first()->kredit_ns;
			$GetPPH21Debet=Neraca_saldo::where('periode_ns',$tgl_akhir)->where('daftar_akuns_id', 15)->get()->first()->debet_ns;
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
		if ($GetLabaKotor <= 50000000) {
			$GetPPH25 = $GetLabaKotor*0.05;
		}elseif ($GetLabaKotor <= 250000000) {
			$GetPPH25 = $GetLabaKotor*0.15;
		}elseif ($GetLabaKotor <= 500000000) {
			$GetPPH25 = $GetLabaKotor*0.25;
		}elseif ($GetLabaKotor > 500000000) {
			$GetPPH25 = $GetLabaKotor*0.3;
		}
		$GetLabaBersih=$GetLabaKotor-$GetPPH25;

		$LaporanLabaRugi = new Laporan_keuangan;
		$LaporanLabaRugi->jenis_laporan = "Laba Rugi";
		if ($GetLabaBersih < 0) {
			$LaporanLabaRugi->keterangan_lk = "Perusahan Rugi";
		}else{
			$LaporanLabaRugi->keterangan_lk = "Perusahan Laba";
		}
		$LaporanLabaRugi->nominal_lk = $GetLabaBersih;
		$LaporanLabaRugi->periode_lk = $tgl_akhir;
		$LaporanLabaRugi->save();

		// addPPh25ToBukuBesar
		$bbToPPh = new Buku_besar;
		$bbToPPh->daftar_akuns_id=16;
		$bbToPPh->tgl_bb=date('Y-m-d');
		$bbToPPh->keterangan_bb="Pajak PPh Pasal 25";
		$bbToPPh->debet_bb=$GetPPH25;
		$bbToPPh->periode_bb=$tgl_akhir;
		$bbToPPh->save();

		// addPPh25ToBukuBesar
		$bbToBank = new Buku_besar;
		$bbToBank->daftar_akuns_id=4;
		$bbToBank->tgl_bb=date('Y-m-d');
		$bbToBank->keterangan_bb="Pajak PPh Pasal 25";
		$bbToBank->kredit_bb=$GetPPH25;
		$bbToBank->periode_bb=$tgl_akhir;
		$bbToBank->save();


		// Readd neraca saldo
		$dataNS = Neraca_saldo::where('periode_ns', $tgl_akhir);
		$dataNS->delete();
		$dataPerAkunTotalDK = Buku_besar::where('periode_bb', $tgl_akhir)->groupBy('daftar_akuns_id')->selectRaw('sum(kredit_bb) as total_kredit, daftar_akuns_id')->selectRaw('sum(debet_bb) as total_debet, daftar_akuns_id')->get();

		$DataTotalDK=array();
		foreach ($dataPerAkunTotalDK as $dpatdk) {
			$DataTotalDK[]=$dpatdk;
		}

		for ($ns=0; $ns < count($DataTotalDK); $ns++) { 
			$neracaSaldo = new Neraca_saldo;
			$neracaSaldo->daftar_akuns_id = $DataTotalDK[$ns]['daftar_akuns_id'];
			if ($DataTotalDK[$ns]['total_debet']>$DataTotalDK[$ns]['total_kredit']) {
				$neracaSaldo->debet_ns = $DataTotalDK[$ns]['total_debet']-$DataTotalDK[$ns]['total_kredit'];
			}else{
				$neracaSaldo->kredit_ns = $DataTotalDK[$ns]['total_kredit']-$DataTotalDK[$ns]['total_debet'];
			}
			$neracaSaldo->periode_ns = $tgl_akhir;
			$neracaSaldo->save();
		}

		// addperubahan modal
		// GetModalAwal
		$GetModalAwalThisPeriodeKredit = Neraca_saldo::where('periode_ns', $tgl_akhir)->where('daftar_akuns_id', 3)->get()->first()->kredit_ns;
		$GetModalAwalThisPeriodeDebet = Neraca_saldo::where('periode_ns', $tgl_akhir)->where('daftar_akuns_id', 3)->get()->first()->debet_ns;
		if ($GetModalAwalThisPeriodeKredit) {
			$GetModalAwalThisPeriode=$GetModalAwalThisPeriodeKredit;
		}elseif ($GetModalAwalThisPeriodeDebet) {
			$GetModalAwalThisPeriode=$GetModalAwalThisPeriodeDebet;
		}

		// GetPrive
		$GetPriveThisPeriodeKredit = Neraca_saldo::where('periode_ns', $tgl_akhir)->where('daftar_akuns_id', 9)->get()->first()->kredit_ns;
		$GetPriveThisPeriodeDebet = Neraca_saldo::where('periode_ns', $tgl_akhir)->where('daftar_akuns_id', 9)->get()->first()->debet_ns;
		if ($GetPriveThisPeriodeKredit) {
			$GetPriveThisPeriode=$GetPriveThisPeriodeKredit;
		}elseif ($GetPriveThisPeriodeDebet) {
			$GetPriveThisPeriode=$GetPriveThisPeriodeDebet;
		}

		// GetLabaRugi
		$GetLRThisPeriode = Laporan_keuangan::where('jenis_laporan', 'Laba Rugi')->where('periode_lk',$tgl_akhir)->get()->first()->nominal_lk;
		
		$GetMA_LR = $GetModalAwalThisPeriode+$GetLRThisPeriode;
		$GetModalAkhir = $GetMA_LR-$GetPriveThisPeriode;

		// add modal next month
		$newMonth = $request->tgl_awal;
		$modal= new Data_transaksi;
		$modal->data_users_id=session()->get('dataLoginPemilik')['id'];
		$modal->daftar_akuns_id=3;
		$modal->jenis_transaksi='Data Pemasukan';
		$modal->keterangan_transaksi='Modal Awal';
		$modal->nominal_transaksi=$GetModalAkhir;
		$modal->tgl_transaksi=date("Y-m-d", strtotime('+1 month', strtotime ($newMonth)));
		$modal->save();

		$kas= new Data_transaksi;
		$kas->data_users_id=session()->get('dataLoginPemilik')['id'];
		$kas->daftar_akuns_id=1;
		$kas->jenis_transaksi='Data Pemasukan';
		$kas->keterangan_transaksi='Modal Awal';
		$kas->nominal_transaksi=$GetModalAkhir*0.06;
		$kas->tgl_transaksi=date("Y-m-d", strtotime('+1 month', strtotime ($newMonth)));
		$kas->save();

		$bank= new Data_transaksi;
		$bank->data_users_id=session()->get('dataLoginPemilik')['id'];
		$bank->daftar_akuns_id=4;
		$bank->jenis_transaksi='Data Pemasukan';
		$bank->keterangan_transaksi='Modal Awal';
		$bank->nominal_transaksi=$GetModalAkhir*0.94;
		$bank->tgl_transaksi=date("Y-m-d", strtotime('+1 month', strtotime ($newMonth)));
		$bank->save();
		//end add modal next month


		// add perubahan modal tabel
		$PB = new Laporan_keuangan;
		$PB->jenis_laporan="Perubahan Modal";
		$PB->keterangan_lk="Perubahan Modal Periode ".$tgl_akhir;
		$PB->nominal_lk=$GetModalAkhir;
		$PB->periode_lk=$tgl_akhir;
		$PB->save();


		return redirect('/jurnal_umum_pemilik/'.$tgl_akhir);
	}

	public function store(Request $request)
	{
		$data_transaksi= new Data_transaksi;
		$data_transaksi->tgl_transaksi=$request->tanggal;
		$data_transaksi->nominal_transaksi=$request->nominal;
		$data_transaksi->save();
		return redirect('/data_transaksi_pemilik');
	}
}
