<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

use Inertia\Inertia;
use Inertia\Response;

use App\Models\User;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): Response
    {
        $user = User::find(Auth::id());

        return Inertia::render('Profile/Edit', [
            'mustVerifyEmail' => $request->user() instanceof MustVerifyEmail,
            'status' => session('status'),
            'user' => $user,
            'profileImageUrl' => asset('storage/images/' . $user->profile_image),
        ]);
    }

    public function update(ProfileUpdateRequest $request)
    {
        $request->user()->fill($request->validated());
    
        // profile picture
        if ($request->hasFile('profile_image')) {
            $file = $request->file('profile_image');
            $fileName = $file->getClientOriginalName();
            $fileExt = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
    
            $newFileName = uniqid('profile-', true) . '.' . $fileExt;
            $file->storeAs('/public/images', $newFileName);
            $request->user()->profile_image = $newFileName;
        }
    
        // user information
        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }
    
        $request->user()->save();
        
        return redirect('/profile?/profile')->with('message', 'Successfully updated');
    }
    
    

    public function destroy(Request $request): RedirectResponse
    {
        $request->validate([
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
