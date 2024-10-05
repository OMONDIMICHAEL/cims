<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Symfony\Contracts\Service\Attribute\Required;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'RetailPhone' => ['required','string','max:15'],
            'email' => ['required','string', 'lowercase', 'email', 'max:255', 'unique:users'],
            'role' => ['required','string',],
            'password' => ['required','string','min:8', 'confirmed', Rules\Password::defaults()],
            'RetailLogo' => ['required','image','mimes:jpg,png,jpeg,gif,max:2048'],
        ]);
        // handle logo upload
        if ($request->hasFile('RetailLogo')) {
            $file = $request->file('RetailLogo');
            $FileName = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('RetailLogoDir'), $FileName);
        }
        // create the user

        $user = User::create([
            'name' => $request->name,
            'RetailPhone' => $request->RetailPhone,
            'email' => $request->email,
            'role' => $request->role,
            'password' => Hash::make($request->password),
            'RetailLogo' => $FileName // store path of the uploaded image
            //'RetailLogo' => $path ?? null, // store path of the uploaded image
        ]);

        event(new Registered($user));

        // Auth::login($user);
        Auth::login($user);
        

        return redirect($this->redirectPath());
    }
    /**
     * Determine the redirection path based on user role.
     *
     * @return string
     */
    protected function redirectPath()
    {
        $user = Auth::user(); // Get the authenticated user

        // Check the role of the user and set the redirect path accordingly
        if ($user->role == 'customer') {
            return '/customer/dashboard'; // Path for customer dashboard
        } elseif ($user->role == 'supplier') {
            return '/supplier/dashboard'; // Path for supplier dashboard
        } elseif ($user->role == 'wholesaler') {
            return '/wholesaler/dashboard'; // Path for wholesaler dashboard
        }

        // Default fallback
        return '/home';
    }
}
