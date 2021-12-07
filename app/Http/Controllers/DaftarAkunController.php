<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Daftar_akun;
use\App\Models\Data_user;

class DaftarAkunController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $daftar_akun=Daftar_akun::all()->sortBy('kode_akun');
        // $user=Data_user::all();
        return view('admins.pages.data_daftar_akun', compact('daftar_akun'));
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
        $daftar_akun= new Daftar_akun;
        $daftar_akun->data_users_id=session()->get('dataLoginAdmins')['id'];
        $daftar_akun->kode_akun=$request->kode_akun;
        $daftar_akun->nama_akun=$request->nama_akun;
        $daftar_akun->tipe_akun=$request->tipe_akun;
        $daftar_akun->save();
        return redirect('/data_daftar_akun');
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
        $daftar_akun=Daftar_akun::where('id',$id)->first(); 
        $daftar_akun->kode_akun=$request->kode_akun;
        $daftar_akun->nama_akun=$request->nama_akun;
        $daftar_akun->tipe_akun=$request->tipe_akun;
        $daftar_akun->save();
        return redirect('/data_daftar_akun');
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
