<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use\App\Models\Data_transaksi;
use\App\Models\Data_user;
use\App\Models\Daftar_akun;

class DataHutangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data_hutang=Data_transaksi::where('jenis_transaksi', 'Data Hutang')->where('transaksi_dibatalkan', 0)->get();
        $user=Data_user::all();
        $daftar_akun=Daftar_akun::all()->sortBy('kode_akun');;
        return view('admins.pages.data_hutang', compact('data_hutang','user','daftar_akun'));
    }

    public function filter(Request $request)
    {
        $user=Data_user::all();
        $daftar_akun=Daftar_akun::all();
        $tgl_awal=$request->tgl_awal;
        $tgl_akhir=$request->tgl_akhir;
        $data_hutang = Data_transaksi::where('jenis_transaksi', 'Data hutang')->whereBetween('tgl_transaksi',[$tgl_awal,$tgl_akhir])->get();
        return view('admins.pages.data_hutang', compact('data_hutang','user','daftar_akun'));
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
        $data_hutang= new Data_transaksi;
        $data_hutang->data_users_id=session()->get('dataLoginAdmins')['id'];
        $data_hutang->daftar_akuns_id=$request->daftar_akun;
        $data_hutang->jenis_transaksi='Data Hutang';
        $data_hutang->keterangan_transaksi=$request->keterangan_transaksi;
        $data_hutang->nominal_transaksi=$request->nominal_transaksi;
        $data_hutang->tgl_transaksi=$request->tgl_transaksi;
        $data_hutang->save();
        return redirect('/data_hutang');
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
        $data_hutang=Data_transaksi::where('id',$id)->first(); 
        $data_hutang->keterangan_transaksi=$request->keterangan_transaksi;
        $data_hutang->nominal_transaksi=$request->nominal_transaksi;
        $data_hutang->tgl_transaksi=$request->tgl_transaksi;
        $data_hutang->save();
        return redirect('/data_hutang');
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
