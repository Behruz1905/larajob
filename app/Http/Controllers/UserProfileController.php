<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserProfileController extends Controller
{
    public function index()
    {
        return view('profile.index');
    }
}