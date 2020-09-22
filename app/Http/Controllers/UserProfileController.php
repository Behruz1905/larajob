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
            $this->validate($request, [
                'address' => 'required',
                'bio' => 'required|min:20',
                'experience'=> 'required|min:20'
            ]);
            $user_id = auth()->user()->id;
            Profile::where('user_id',$user_id)->update([
                'address'=>request('address'),
                'phone_number'=> request('phone_number'),
                'experience' => request('experience'),
                'bio' => request('bio')

            ]);
            return redirect()->back()->with('message', 'Profile Successfully updated!');
    }

    public function coverletter(Request $request)
    {
            $user_id = auth()->user()->id;
            $cover = $request->file('cover_letter')->store('public/files');

            Profile::where('user_id',$user_id)->update([
                    'cover_letter'=> $cover
            ]);

            return redirect()->back()->with('message', 'Cover letter Successfully updated!');
    }

    public function resume(Request $request)
    {
            $user_id = auth()->user()->id;
            $resume = $request->file('resume')->store('public/files');

            Profile::where('user_id',$user_id)->update([
                'resume'=> $resume
            ]);

            return redirect()->back()->with('message', 'Resume Successfully updated!');
    }

    public function avatar(Request $request)
    {
        $user_id = auth()->user()->id;
        if($request->hasFile('avatar')){
            $file = $request->file('avatar');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('uploads/avatar/', $filename);
            Profile::where('user_id',$user_id)->update([
                'avatar'=> $filename
            ]);
            return redirect()->back()->with('message', 'Profile picture updated Successfully updated!');
        }




    }
}
