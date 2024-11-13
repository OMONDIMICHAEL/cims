<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

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

        // Regenerate the session to protect against session fixation attacks
        $request->session()->regenerate();

        // Check the authenticated user's role and redirect accordingly
        $user = $request->user(); // Get the authenticated user

        if ($user->role === 'customer') {
            return redirect()->intended('/customer/dashboard'); // Redirect to customer dashboard
        } elseif ($user->role === 'supplier') {
            return redirect()->intended('/supplier/dashboard'); // Redirect to supplier dashboard
        } elseif ($user->role === 'wholesaler') {
            return redirect()->intended('/wholesaler/dashboard'); // Redirect to wholesaler dashboard
        }

        return redirect()->intended(route('dashboard', absolute: false));
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('login');
    }
}
