<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Data_user;
use Alert;

class DataUserController extends Controller
{
    public function index()
    {
        $user=Data_user::all();
        return view('admins.pages.data_user', compact('user'));
    }

    public function store(Request $request)
    {

        if ($request->status == "Accounting") {
            $random="accounting".rand();
        }elseif ($request->status == "Pemilik") {
            $random="pemilik".rand();
        }
        $user= new Data_user;
        $user->nama=$request->nama;
        $user->username=$random;
        $user->password=Hash::make($random);
        $user->status=$request->status;
        $user->save();
        alert('Data Berhasil Di Tambah', ' ', 'success');
        return redirect('/data_user');
    }

    public function update(Request $request, $id)
    {
        $user=Data_user::where('id',$id)->first(); 
        $user->nama=$request->nama;
        $user->status=$request->status;
        $user->save();
        alert('Data Berhasil Di Ubah', ' ', 'success');
        return redirect('/data_user');
    }
}

