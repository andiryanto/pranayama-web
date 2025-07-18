<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Fortify\Http\Controllers\AuthenticatedSessionController as BaseController;


class CustomAuthenticatedSessionController extends Controller
{
    //
    public function store(Request $request)
    {
        $this->validateLogin($request);

        // Attempt login
        if (!Auth::attempt($request->only('email', 'password'), $request->boolean('remember'))) {
            return back()->withErrors([
                'email' => __('auth.failed'),
            ]);
        }

        $request->session()->regenerate();

        $user = Auth::user();

        // ⛔️ Batasi hanya admin dan staff
        if (!$user->hasRole('admin') && !$user->hasRole('staff')) {
            Auth::logout();
            return redirect()->route('login')->withErrors([
                'email' => 'Akun Anda tidak memiliki akses.',
            ]);
        }

        return redirect()->intended(config('fortify.home'));
    }
}
