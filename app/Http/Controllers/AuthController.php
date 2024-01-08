<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function loginIndex()
    {
        return view('pages.user.auth.login');
    }

    public function registerIndex()
    {
        return view('pages.user.auth.register');
    }


    public function loginProcess(Request $request)
    {
        $credensial = $request->only('username', 'password');

        $rememberMe = $request->has('remember_token');

        if (Auth::attempt($credensial, $rememberMe)) {
            if (Auth::user()->role == 'Admin') {
                return redirect('dashboard')->with('status', 'BERHASIL LOGIN!');
            } else {
                return redirect('/')->with('status', 'BERHASIL LOGIN');
            }
        } else {
            return redirect()->back()->with('failed', 'Username atau Password Salah!');
        }
    }


    public function registerProcess(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'telepon' => 'required',
            'username' => 'required',
            'password' => 'required'
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'telepon' => $request->telepon,
            'username' => $request->username,
            'password' => Hash::make($request->password),
        ];

        User::create($data);

        return redirect()->back()->with('status', 'AKUN BERHASIL DIBUAT! SILAHKAN LOGIN!');
    }




    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('login');
    }
}
