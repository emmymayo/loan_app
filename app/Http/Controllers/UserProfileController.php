<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Validation\Rules\Password;

class UserProfileController extends Controller
{
    public function profile(Request $request)
    {
        return view('profile', [
            'user' => auth()->user()
        ]);
    }

    public function update(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'password' => ['required', 'confirmed', Password::min(8)]
        ]);

        $user = User::find(auth()->id());
        $user->update($data);

        return back()->with('success', "Profile Updated");
    }
}
