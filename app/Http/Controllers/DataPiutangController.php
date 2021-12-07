<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use\App\Models\Data_transaksi;
use\App\Models\Data_user;
use\App\Models\Daftar_akun;

class DataPiutangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data_piutang=Data_transaksi::where('jenis_transaksi', 'Data Piutang')->where('transaksi_dibatalkan', 0)->get();
        $user=Data_user::all();
        $daftar_akun=Daftar_akun::all()->sortBy('kode_akun');;
        return view('admins.pages.data_piutang', compact('data_piutang','user','daftar_akun'));
    }

    public function filter(Request $request)
    {
        $user=Data_user::all();
        $daftar_akun=Daftar_akun::all();
        $tgl_awal=$request->tgl_awal;
        $tgl_akhir=$request->tgl_akhir;
        $data_piutang = Data_transaksi::where('jenis_transaksi', 'Data piutang')->whereBetween('tgl_transaksi',[$tgl_awal,$tgl_akhir])->get();
        return view('admins.pages.data_piutang', compact('data_piutang','user','daftar_akun'));
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
        $data_piutang= new Data_transaksi;
        $data_piutang->data_users_id=session()->get('dataLoginAdmins')['id'];
        // $kode_akun = Daftar_akun::where('id', $request->daftar_akun)->get()->first()->kode_akun;

        
        $trxThisDate = Data_transaksi::where('tgl_transaksi', $request->tgl_transaksi)->where('daftar_akuns_id', 2)->get();
        if ($trxThisDate) {
            // return $trxThisDate->first()->nominal_transaksi;
            $dataBank= new Data_transaksi;
            $dataBank->data_users_id=session()->get('dataLoginAdmins')['id'];
            $dataBank->daftar_akuns_id=4;
            $dataBank->jenis_transaksi='Data Pemasukan';
            $dataBank->keterangan_transaksi=$trxThisDate->first()->keterangan_transaksi;
            $potongPPN = 10/11*$trxThisDate->first()->nominal_transaksi;
            $dataBank->nominal_transaksi=$potongPPN; //nominal bank
            $dataBank->tgl_transaksi=$trxThisDate->first()->tgl_transaksi;
            $dataBank->save();

            $dataPPN= new Data_transaksi;
            $dataPPN->data_users_id=session()->get('dataLoginAdmins')['id'];
            $dataPPN->daftar_akuns_id=14;
            $dataPPN->jenis_transaksi='Data Pemasukan';
            $dataPPN->keterangan_transaksi=$trxThisDate->first()->keterangan_transaksi;
            $PPN = $trxThisDate->first()->nominal_transaksi-$potongPPN;
            $dataPPN->nominal_transaksi=$PPN; //nominal PPN
            $dataPPN->tgl_transaksi=$trxThisDate->first()->tgl_transaksi;
            $dataPPN->save();
            $trxThisDate->first()->nominal_transaksi=$request->nominal_transaksi+$potongPPN+$PPN;
            $trxThisDate->first()->save();
        }

        $data_piutang->daftar_akuns_id=$request->daftar_akun;
        $data_piutang->jenis_transaksi='Data Piutang';
        $data_piutang->keterangan_transaksi=$request->keterangan_transaksi;
        $data_piutang->nominal_transaksi=$request->nominal_transaksi;
        $data_piutang->tgl_transaksi=$request->tgl_transaksi;
        $data_piutang->save();
        return redirect('/data_piutang');
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
        $data_piutang=Data_transaksi::where('id',$id)->first(); 
        $data_piutang->keterangan_transaksi=$request->keterangan_transaksi;
        $data_piutang->nominal_transaksi=$request->nominal_transaksi;
        $data_piutang->tgl_transaksi=$request->tgl_transaksi;
        $data_piutang->save();
        return redirect('/data_piutang');
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
