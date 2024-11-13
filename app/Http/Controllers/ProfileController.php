<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Symfony\Component\HttpKernel\Profiler\Profile;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Storage;


class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    // public function edit()
    {
        $user = Auth::user();
        
        // Role-specific customizations
        if ($user->role === 'supplier') {
            return view('profile.edit', [
                'user' => $request->user(),
            ]);
        } elseif ($user->role === 'wholesaler') {
            return view('profile.edit', [
                'user' => $request->user(),
            ]);
        } elseif ($user->role === 'customer') {
            return view('profile.edit', [
                'user' => $request->user(),
            ]);
        } else {
            // Default profile data if no specific role matched
        }
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $user = Auth::user();
        // $request->validate([
        //     'name' => ['required','string','max:255'],
        //     'RetailPhone' => ['required','string'],
        //     'email' => ['required'],
        //     'RetailLogo' => ['image','max:2048'], // Adjust max size as needed
        // ]);
        $rules = [
            'name' => ['required', 'string', 'max:255'],
            'RetailPhone' => ['required', 'string'],
            'email' => ['required', 'email', 'max:255', 'unique:users,email,' . $user->id],
            'RetailLogo' => ['image', 'max:2048'],
        ];
        // Additional role-specific validation rules
        if ($user->role === 'supplier') {
            $rules['supplier_specific_field'] = ['required', 'string'];
        } elseif ($user->role === 'wholesaler') {
            $rules['wholesaler_specific_field'] = ['required', 'string'];
        } elseif ($user->role === 'customer') {
            $rules['customer_specific_field'] = ['required', 'string'];
        }
        $validatedData = $request->validate($rules);
         // Update base profile information
        $user->name = $validatedData['name'];
        $user->RetailPhone = $validatedData['RetailPhone'];
        $user->email = $validatedData['email'];
         // Update RetailLogo if a new file is uploaded
        if ($request->hasFile('RetailLogo')) {
            $file = $request->file('RetailLogo');
            $FileName = time() . '.' . $file->getClientOriginalExtension();                  // test if the updates work
            $file->move(public_path('RetailLogoDir'), $FileName);

            // Delete old RetailLogo if it exists
            if ($user->RetailLogo) {
                Storage::disk('public')->delete($user->RetailLogo);
            }

            $user->RetailLogo = $FileName;
        }
        // Handle role-specific updates
        if ($user->role === 'supplier') {
            $user->supplier_specific_field = $validatedData['supplier_specific_field'];
        } elseif ($user->role === 'wholesaler') {
            $user->wholesaler_specific_field = $validatedData['wholesaler_specific_field'];
        } elseif ($user->role === 'customer') {
            $user->customer_specific_field = $validatedData['customer_specific_field'];
        }
        // Reset email verification if the email has changed
        // if ($user->isDirty('email')) {
        //     $user->email_verified_at = null;
        // }

        $user->save();

        return redirect()->route('profile.edit')->with('status', 'Profile updated successfully.');
        // Ensure that $user is an instance of User model
        // if (!$user instanceof User) {
        //     return redirect()->back()->with('error', 'Invalid user instance');
        // }
        // $user->name = $request->input('name');
        // $user->RetailPhone = $request->input('RetailPhone');
        // $user->email = $request->input('email');
    
        // if ($request->hasFile('RetailLogo')) {
        //     $file = $request->file('RetailLogo');
        //     $FileName = time() . '.' . $file->getClientOriginalExtension();
        //     $file->move(public_path('RetailLogoDir'), $FileName);
        //     if ($user->RetailLogo) {
        //         Storage::disk('public')->delete($user->RetailLogo);
        //     }
        //     $user->RetailLogo = $FileName;
        // }
        // if ($request->user()->isDirty('email')) {
        //     $request->user()->email_verified_at = null;
        // }
        // $user->save();

        // return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('login');
    }
}
