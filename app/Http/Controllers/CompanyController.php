<?php

namespace App\Http\Controllers;

use App\Company;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function index($id, Company $company)
    {
        return view('company.index',compact('company'));
    }
//    public function getAll(){
//        $all = Company::all();
//        dd($all);
//    }
}
