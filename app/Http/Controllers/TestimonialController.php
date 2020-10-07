<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Testimonial;

class TestimonialController extends Controller
{
    public function index()
    {
        $testimonials = Testimonial::paginate(10);
        return view('testimonial.index',compact('testimonials'));
    }
    public function create()
    {
        return view('testimonial.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'content' => 'required|min:40|max:500',
            'name' => 'required',
            'profession' => 'required',
            'video_id'=> 'required|integer'
        ]);

        Testimonial::create([
            'content'=> $request->content,
            'name'=> $request->name,
            'profession'=> $request->profession,
            'video_id'=> $request->video_id
        ]);

        return redirect()->back()->with('message','Testimonial created succesfully');
    }
}
