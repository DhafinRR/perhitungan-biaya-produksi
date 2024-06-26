<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

use App\Models\Akses; //load model dari kelas model akses

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        // Tambahan untuk menambah variabel session kelompok
        $id_customer = Auth::id(); //dapatkan id dari session yang sudah tercreate
        $akses = Akses::getGrupUser($id_customer);
        foreach($akses as $p):
            $kelompok = $p->kelompok;
        endforeach;
        // membuat session dengan nama variabel kelompok
        session(['kelompok' => $kelompok]);
        // Akhir tambahan variabel session kelompok

        return redirect()->intended(RouteServiceProvider::HOME);
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
