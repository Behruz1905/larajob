<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Company;
class EmployerRegisterController extends Controller
{
    public function employerRegister(Request $request)
    {
        $this->validate($request, [
            'cname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed'
        ]);
        $user =  User::create([
            'name' => request('cname'),
            'email' => request('email'),
            'password' => Hash::make(request('password')),
            'user_type' => request('user_type')
        ]);

        Company::create([
            'user_id'=> $user->id,
            'cname'=> request('cname'),
            'slug'=> Str::slug(request('cname')),
        ]);



        return redirect()->to('login')->with('message','Please verify your email by clicking the link sent to your email
        address');
    }
}
