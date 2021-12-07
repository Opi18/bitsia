<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use\App\Models\Data_transaksi;
use\App\Models\Data_user;
use\App\Models\Daftar_akun;

class RiwayatPembatalanController extends Controller
{
    public function formFilter()
    {
        return view('admins.pages.cari_riwayat_pembatalan');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data_pemasukan=Data_transaksi::where('jenis_transaksi', 'Data Pemasukan')->where('transaksi_dibatalkan', 1)->get();
        $data_pengeluaran=Data_transaksi::where('jenis_transaksi', 'Data Pengeluaran')->where('transaksi_dibatalkan', 1)->get();
        $data_hutang=Data_transaksi::where('jenis_transaksi', 'Data Hutang')->where('transaksi_dibatalkan', 1)->get();
        $data_piutang=Data_transaksi::where('jenis_transaksi', 'Data Piutang')->where('transaksi_dibatalkan', 1)->get();
        return view('admins.pages.riwayat_pembatalan', compact('data_pemasukan','data_pengeluaran','data_hutang','data_piutang'));
    }

    public function filter(Request $request)
    {

        $tgl_awal=$request->tgl_awal;
        $tgl_akhir=$request->tgl_akhir;        
        $data_pemasukan=Data_transaksi::where('jenis_transaksi', 'Data Pemasukan')->where('transaksi_dibatalkan', 1)->whereBetween('tgl_transaksi',[$tgl_awal,$tgl_akhir])->get();
        $data_pengeluaran=Data_transaksi::where('jenis_transaksi', 'Data Pengeluaran')->where('transaksi_dibatalkan', 1)->whereBetween('tgl_transaksi',[$tgl_awal,$tgl_akhir])->get();
        $data_hutang=Data_transaksi::where('jenis_transaksi', 'Data Hutang')->where('transaksi_dibatalkan', 1)->whereBetween('tgl_transaksi',[$tgl_awal,$tgl_akhir])->get();
        $data_piutang=Data_transaksi::where('jenis_transaksi', 'Data Piutang')->where('transaksi_dibatalkan', 1)->whereBetween('tgl_transaksi',[$tgl_awal,$tgl_akhir])->get();
        return view('admins.pages.riwayat_pembatalan', compact('data_pemasukan','data_pengeluaran','data_hutang','data_piutang','tgl_awal','tgl_akhir'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
