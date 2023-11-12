<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Designation;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        $designation = Cache::rememberForever('designation', function() { 
            return Designation::all();
        });
        return view('profile.edit', [
            'user' => $request->user(),
            'designation'=> $designation
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        
        
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }
        
       
        $request->user()->save();

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

        return Redirect::to('/');
    }

    public function uploadpix(User $user)
    {
        return view('profile.uploadpicture', [
            'user' => $user,
        ]);
    }
    public function upload(User $user)
    {
        $uuser = request()->validate([
        'profilePix'=> ['image', 'required'],
        ]);
        
        $uuser['profilePix'] = request()->file('profilePix')->store('staffs');
        $user->update($uuser);

        return redirect()->route('dashboard')->with('status', 'Your picture has been updated sucessfully!');
    }
}
