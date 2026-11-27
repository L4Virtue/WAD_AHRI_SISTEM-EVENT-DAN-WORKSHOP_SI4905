<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLogin()
    {
 Erlinda
        if (Auth::check()) {
            return redirect()->route('speaker.index');
        }
        
=======
 main
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
 Erlinda
            'username' => ['required', 'string'],
            'password' => ['required', 'string']
            'username' => 'required|string',
            'password' => 'required|string',
main
        ]);

        if (Auth::attempt($credentials, $request->boolean('remember'))) {
            $request->session()->regenerate();

 Erlinda
            return redirect()->intended(route('speaker.index'))
                ->with('success', 'Selamat datang, ' . Auth::user()->username . '!');
        }

        return back()->withErrors([
            'username' => 'Username atau password salah.',
        ])->onlyInput('username');

            return redirect()
                ->route('tiket.daftar')
                ->with('success', 'Selamat datang, ' . Auth::user()->username . '!');
        }

        return back()
            ->withErrors(['username' => 'Username atau password salah.'])
            ->onlyInput('username');
 main
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

 Erlinda
        return redirect('/login')->with('success', 'Anda berhasil logout.');
    }
}

        return redirect()
            ->route('tiket.daftar')
            ->with('success', 'Anda berhasil logout.');
    }
}
 main
