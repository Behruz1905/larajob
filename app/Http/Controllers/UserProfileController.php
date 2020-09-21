<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Profile;
use Illuminate\Http\Request;

class UserProfileController extends Controller
{
    public function index()
    {
        return view('profile.index');
    }

    public function store(Request $request)
    {
        $user_id = auth()->user()->id;
        Profile::where('user_id',$user_id)->update([
            'address'=>request('address'),
            'experience' => request('experience'),
            'bio' => request('bio')

        ]);
        return redirect()->back()->with('message', 'Profile Successfully updated!');
    }
}
