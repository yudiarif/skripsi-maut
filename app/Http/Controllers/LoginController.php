<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('login.index');
    }

    public function authenticate(Request $request)
    {
        $data = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);
        //dd($data);
      
        if (Auth::attempt($data)) {
            $request->session()->regenerate();
            
            return redirect()->intended('dashboard');
        } else {
            alert()->error('Login Gagal','Cek kembali username dan password anda');
            return back();
        }
     
    }

    public function logout(Request $request)
    {
         
    Auth::logout();
 
    $request->session()->invalidate();
 
    $request->session()->regenerateToken();
 
    return redirect('login');
    }
}
