<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Data_transaksi;

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

	public function store(Request $request)
	{
		$data_transaksi_pemilik= new Data_transaksi;
		$data_transaksi_pemilik->tgl_transaksi=$request->tanggal;
		$data_transaksi_pemilik->nominal_transaksi=$request->nominal;
		$data_transaksi_pemilik->save();
		return redirect('/data_transaksi_pemilik');
	}
}
