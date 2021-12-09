<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Data_user;
use Alert;

class LoginController extends Controller
{
	public function index(Request $request)
	{
		$Data_user = Data_user::where('username', $request->username)->first();
		if ($Data_user == true) {
			if ($Data_user && Hash::check($request->password, $Data_user->password)) {
				if ($Data_user->status == "Accounting") {
					session()->put('dataLoginAdmins', $Data_user);
					alert('Login Berhasil', '', 'success');
					return redirect('/dashboard');
				}elseif ($Data_user->status == "Pemilik") {
					session()->put('dataLoginPemilik', $Data_user);
					return redirect('/dashboard_pemilik');
				}
			}else{
				alert('Login Gagal', 'Username/Password Salah', 'error');
				return redirect('/');
			}
		}else{
			alert('Login Gagal', 'Username/Password Salah', 'error');
			return redirect('/');
		}

	}


	public function logout()
	{
		session()->forget('dataLoginAdmins');
		session()->forget('dataLoginPemilik');
		alert('Logout Berhasil', '', 'success');
		return redirect('/');
	}
}
