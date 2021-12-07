<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buku_besar;
class BukuBesarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bb = Buku_besar::all()->groupBy('periode_bb');
        return view('admins.pages.buku_besar', compact('bb'));
    }

    public function detail($periode)
    {
        $akun = Buku_besar::where('periode_bb', $periode);
        $dataPerAkun = Buku_besar::where('periode_bb', $periode)->get()->groupBy('daftar_akuns_id');
        $transaksi = Buku_besar::where('periode_bb', $periode)->get()->sortBy('tgl_bb');
        $bbtransaksi = Buku_besar::where('periode_bb', $periode)->get()->count();



        // $dataPerAkunTotalDK = Buku_besar::where('periode_bb', $periode)->groupBy('daftar_akuns_id')->selectRaw('sum(kredit_bb) as total_kredit, daftar_akuns_id')->selectRaw('sum(debet_bb) as total_debet, daftar_akuns_id')->get();

        // $DataTotalDK=array();
        // foreach ($dataPerAkunTotalDK as $dpatdk) {
        //     $DataTotalDK[]=$dpatdk;
        // }
        // return $DataTotalDK;

        // foreach ($DataTotalDK as $key => $value) {
        //     echo $value."</br>";
        // }


        return view('admins.pages.detail_buku_besar',compact('periode', 'transaksi', 'bbtransaksi', 'akun', 'dataPerAkun'));
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
