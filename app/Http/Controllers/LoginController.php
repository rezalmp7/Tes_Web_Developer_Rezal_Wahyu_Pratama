<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function index() {
        return view('login');
    }

    public function register() {
        return view('register');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if(Auth::attempt($request->only('email', 'password'))) {
            $user = User::where('email', $request->email)->first();

            if($user->level == 'admin') {
                return redirect(url('/dashboard'));
            } else {
                return redirect(url('/'));
            }
        }
        return redirect(url('/login'));
    }

    public function registerStore(Request $request) {
        $request->validate([
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'alamat' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);

        $data = array(
            'nama' => $request->nama,
            'jenis_kelamin' => $request->jenis_kelamin,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'alamat' => $request->alamat,
            'email' => $request->email,
            'level' => 'customer',
            'password' => Hash::make($request->password)
        );

        User::create($data);

        return redirect('/login');
    }
    
    public function logout() {
        Auth::logout();    
        return redirect(url('/login'));
    }
}
