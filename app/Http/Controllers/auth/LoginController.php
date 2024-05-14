<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //
    public function index(){
        return view('auth.login');
    }

    public function login(Request $request){
        $credentials = $request->only('email', 'password');
        if(Auth::attempt($credentials)){
            if(Auth::user()->type === 'admin'){
                return redirect()->route('dashboard');
            }
            return redirect('/');
        }
        return redirect()->back()->with('error', 'Sai tài khoản hoặc mật khẩu');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect(url('/login'));
    }
}
