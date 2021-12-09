<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use\App\Models\Data_transaksi;
use\App\Models\Data_user;
use\App\Models\Daftar_akun;
use Alert;

class DataPengeluaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data_pengeluaran=Data_transaksi::where('jenis_transaksi', 'Data Pengeluaran')->where('transaksi_dibatalkan', 0)->get();
        $user=Data_user::all();
        $daftar_akun=Daftar_akun::all()->sortBy('kode_akun');;
        return view('admins.pages.data_pengeluaran', compact('data_pengeluaran','user','daftar_akun'));
    }
    
    public function filter(Request $request)
    {
        $user=Data_user::all();
        $daftar_akun=Daftar_akun::all();
        $tgl_awal=$request->tgl_awal;
        $tgl_akhir=$request->tgl_akhir;
        $data_pengeluaran = Data_transaksi::where('jenis_transaksi', 'Data pengeluaran')->whereBetween('tgl_transaksi',[$tgl_awal,$tgl_akhir])->get();
        return view('admins.pages.data_pengeluaran', compact('data_pengeluaran','user','daftar_akun'));
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
        $data_pengeluaran= new Data_transaksi;
        $data_pengeluaran->data_users_id=session()->get('dataLoginAdmins')['id'];
        $data_pengeluaran->daftar_akuns_id=$request->daftar_akun;
        $data_pengeluaran->jenis_transaksi='Data Pengeluaran';
        $data_pengeluaran->keterangan_transaksi=$request->keterangan_transaksi;
        $data_pengeluaran->tgl_transaksi=$request->tgl_transaksi;

        // jika beban gaji
        if ($request->daftar_akun == 10) {
            // akun beban gaji
            $PPH = $request->nominal_transaksi*0.05;
            $gajiPotongPPH = $request->nominal_transaksi - $PPH;
            $data_pengeluaran->nominal_transaksi=$gajiPotongPPH;
            $data_pengeluaran->save();

            // akun pph
            $pph= new Data_transaksi;
            $pph->data_users_id=session()->get('dataLoginAdmins')['id'];
            $pph->daftar_akuns_id=15;
            $pph->jenis_transaksi='Data Pengeluaran';
            $pph->keterangan_transaksi=$request->keterangan_transaksi;
            $pph->tgl_transaksi=$request->tgl_transaksi;
            $pph->nominal_transaksi=$PPH;
            $pph->save();

            // akun bank
            $bank= new Data_transaksi;
            $bank->data_users_id=session()->get('dataLoginAdmins')['id'];
            $bank->daftar_akuns_id=4;
            $bank->jenis_transaksi='Data Pengeluaran';
            $bank->keterangan_transaksi=$request->keterangan_transaksi;
            $bank->tgl_transaksi=$request->tgl_transaksi;
            $bank->nominal_transaksi=$request->nominal_transaksi;
            $bank->save();
        }else{
            if ($request->pembayaran != null) {
                if ($request->pembayaran == 111) {
                    // akun kas
                    $kas= new Data_transaksi;
                    $kas->data_users_id=session()->get('dataLoginAdmins')['id'];
                    $kas->daftar_akuns_id=1;
                    $kas->jenis_transaksi='Data Pengeluaran';
                    $kas->keterangan_transaksi=$request->keterangan_transaksi;
                    $kas->tgl_transaksi=$request->tgl_transaksi;
                    $kas->nominal_transaksi=$request->nominal_transaksi;
                    $kas->save();
                }elseif ($request->pembayaran == 112) {
                    // akun bank
                    $bank= new Data_transaksi;
                    $bank->data_users_id=session()->get('dataLoginAdmins')['id'];
                    $bank->daftar_akuns_id=4;
                    $bank->jenis_transaksi='Data Pengeluaran';
                    $bank->keterangan_transaksi=$request->keterangan_transaksi;
                    $bank->tgl_transaksi=$request->tgl_transaksi;
                    $bank->nominal_transaksi=$request->nominal_transaksi;
                    $bank->save();
                }
            }
            $data_pengeluaran->nominal_transaksi=$request->nominal_transaksi;
            $data_pengeluaran->save();
        }
        alert('Data Berhasil Di Tambah', ' ', 'success');
        return redirect('/data_pengeluaran');
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
        $data_pengeluaran=Data_transaksi::where('id',$id)->first(); 
        $data_pengeluaran->keterangan_transaksi=$request->keterangan_transaksi;
        $data_pengeluaran->nominal_transaksi=$request->nominal_transaksi;
        $data_pengeluaran->tgl_transaksi=$request->tgl_transaksi;
        $data_pengeluaran->save();
        alert('Data Berhasil Di Ubah', ' ', 'success');
        return redirect('/data_pengeluaran');
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
