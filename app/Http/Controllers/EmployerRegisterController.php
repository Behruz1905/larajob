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
    public function employerRegister()
    {
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

        return redirect()->to('login');
    }
}
