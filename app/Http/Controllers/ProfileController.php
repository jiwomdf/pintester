<?php

namespace App\Http\Controllers;

use App\User;
use Auth;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    //
    public function profile()
    {
        $profile = User::findOrFail(Auth::user()->id);

        return view('profile', compact('profile'));
    }

    public function categories()
    {
        $profile = User::findOrFail(Auth::user()->id);

        return view('profile', compact('profile'));
    }

    public function doUpdateProfile(Request $request)
    {
        $profile = User::find(Auth::user()->id);
        $profile->id = Auth::user()->id;
        $profile->name = $request->name;
        $profile->email = $request->email;
        $profile->password = $request->password;
        $profile->gender = $request->gender;
        $profile->save();
        return back();
    }
}
