<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Token;
use App\Models\Event;
use Illuminate\Support\Facades\Auth;

class SesiController extends Controller
{
    public function index()
    {
        return view('login');
    }
    public function token()
    {
        return view('logintoken');
    }
    public function loginToken(Request $request)
    {
        $request->validate([
            'token' => 'required',
        ], [
            'token.required' => 'Nomor Token Wajib Diisi',
        ]);
    
        $token = $request->token;
    
        // Periksa apakah nomor token ada di tabel Token
        $isValidToken = Token::where('token', $token)->whereNull('used_at')->first();
        if ($isValidToken) {
            // Tandai token sebagai sudah digunakan
            $isValidToken->update(['used_at' => now()]);
    
            // Ambil id_event dari token
            $idEvent = $isValidToken->id_event;
    
            // Redirect ke halaman user dengan menyertakan id_event
            return redirect("/user?id_event=$idEvent");
        } else {
            return redirect('/login-token')->withErrors('Nomor Token tidak valid atau sudah digunakan')->withInput();
        }
    }
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ], [
            'email.required' => 'Email Wajib Diisi',
            'password.required' => 'Password Wajib Diisi',
        ]);

        $infologin = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if (Auth::attempt($infologin)) {
            if (Auth::user()->role == 'admin') {
                return redirect('index/admin');
            } elseif (Auth::user()->role == 'user') {
                return redirect('index/user');
            } elseif (Auth::user()->role == 'superadm') { // Corrected elseif condition
                return redirect('index/superadm');
            }
        } else {
            return redirect()->back()->with('error', 'Username dan Password yang dimasukkan tidak sesuai')->withInput();
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/landing'); // atau halaman lain setelah logout
    }

    public function showCurrentDate()
    {
        $currentDate = Carbon::now()->format('M d, Y');
        return view('your.view', ['currentDate' => $currentDate]);
    }
}
