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
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        // $request->user()->fill($request->validated());
        $request->validate([
            'name' => ['required','string','max:255'],
            'RetailPhone' => ['required','string'],
            'email' => ['required'],
            'RetailLogo' => ['image','max:2048'], // Adjust max size as needed
        ]);
        $user = Auth::user();
        // Ensure that $user is an instance of User model
        if (!$user instanceof User) {
            return redirect()->back()->with('error', 'Invalid user instance');
        }
        $user->name = $request->input('name');
        $user->RetailPhone = $request->input('RetailPhone');
        $user->email = $request->input('email');
    
        if ($request->hasFile('RetailLogo')) {
            $file = $request->file('RetailLogo');
            $FileName = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('RetailLogoDir'), $FileName);
            if ($user->RetailLogo) {
                Storage::disk('public')->delete($user->RetailLogo);
            }
            $user->RetailLogo = $FileName;
        }
        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }
        $user->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
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
