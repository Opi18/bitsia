<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use\App\Models\Data_transaksi;
use\App\Models\Data_user;
use\App\Models\Daftar_akun;
use Alert;

class DataPemasukanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data_pemasukan=Data_transaksi::where('jenis_transaksi', 'Data Pemasukan')->where('transaksi_dibatalkan', 0)->get();
        $user=Data_user::all();
        $daftar_akun=Daftar_akun::all()->sortBy('kode_akun');
        return view('admins.pages.data_pemasukan', compact('data_pemasukan','user','daftar_akun'));
    }

    public function filter(Request $request)
    {
        $user=Data_user::all();
        $daftar_akun=Daftar_akun::all();
        $tgl_awal=$request->tgl_awal;
        $tgl_akhir=$request->tgl_akhir;
        $data_pemasukan = Data_transaksi::where('jenis_transaksi', 'Data Pemasukan')->whereBetween('tgl_transaksi',[$tgl_awal,$tgl_akhir])->get();
        return view('admins.pages.data_pemasukan', compact('data_pemasukan','user','daftar_akun'));
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
        $data_pemasukan= new Data_transaksi;
        $data_pemasukan->data_users_id=session()->get('dataLoginAdmins')['id'];
        if ($request->daftar_akun == 2) {
            if (!$request->dp) {
                $dataBank= new Data_transaksi;
                $dataBank->data_users_id=session()->get('dataLoginAdmins')['id'];
                $dataBank->daftar_akuns_id=4;
                $dataBank->jenis_transaksi='Data Pemasukan';
                $dataBank->keterangan_transaksi=$request->keterangan_transaksi;
                $potongPPN = 10/11*$request->nominal_transaksi;
            $dataBank->nominal_transaksi=$potongPPN; //nominal bank
            $dataBank->tgl_transaksi=$request->tgl_transaksi;
            $dataBank->save();

            $dataPPN= new Data_transaksi;
            $dataPPN->data_users_id=session()->get('dataLoginAdmins')['id'];
            $dataPPN->daftar_akuns_id=14;
            $dataPPN->jenis_transaksi='Data Pemasukan';
            $dataPPN->keterangan_transaksi=$request->keterangan_transaksi;
            $PPN = $request->nominal_transaksi-$potongPPN;
            $dataPPN->nominal_transaksi=$PPN; //nominal PPN
            $dataPPN->tgl_transaksi=$request->tgl_transaksi;
            $dataPPN->save();
        }
    }
    $data_pemasukan->daftar_akuns_id=$request->daftar_akun;
    $data_pemasukan->jenis_transaksi='Data Pemasukan';
    $data_pemasukan->keterangan_transaksi=$request->keterangan_transaksi;
    $data_pemasukan->nominal_transaksi=$request->nominal_transaksi;
    $data_pemasukan->tgl_transaksi=$request->tgl_transaksi;
    $data_pemasukan->save();
    alert('Data Berhasil Di Tambah', ' ', 'success');
    return redirect('/data_pemasukan');
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
        $data_pemasukan=Data_transaksi::where('id',$id)->first(); 
        $data_pemasukan->keterangan_transaksi=$request->keterangan_transaksi;
        $data_pemasukan->nominal_transaksi=$request->nominal_transaksi;
        $data_pemasukan->tgl_transaksi=$request->tgl_transaksi;
        $data_pemasukan->save();
        alert('Data Berhasil Di Ubah', ' ', 'success');
        return redirect('/data_pemasukan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data_pemasukan=Data_transaksi::where('id',$id)->first();
        $data_pemasukan->transaksi_dibatalkan = 1;
        $data_pemasukan->save();
        return redirect('/cari_riwayat_pembatalan');

    }
}
