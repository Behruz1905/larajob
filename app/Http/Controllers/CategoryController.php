<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Job;
use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index($id)
    {
        $jobs = Job::where('category_id', $id)->paginate(20);
        $categoryName = Category::where('id',$id)->first();
        return view('jobs.jobs-category', compact('jobs','categoryName'));
    }
}
