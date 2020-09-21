<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Job;

class JobController extends Controller
{
    public function  index()
    {
        $jobs = Job::all();
        return view('welcome', compact('jobs'));
    }

    public  function show($id, Job $job)
    {
        return view('jobs.show', compact('job'));
    }
}
