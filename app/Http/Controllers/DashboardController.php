<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Post;

class DashboardController extends Controller
{

    public function index()
    {
        $posts = Post::latest()->paginate(20);
        return view('admin.index', compact('posts'));
    }

    public function create()
    {
        return view('admin.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|min:3',
            'content' => 'required',
            'image' => 'required|mimes:jpeg,jpg,png'
        ]);
        if($request->hasFile('image')){
            $file = $request->file('image');
            $path = $file->store('uploads','public');
            Post::create([
                'title'=>$title=$request->get('title'),
                'slug' => Str::slug($title),
                'content' => $request->get('content'),
                'image'=>$path,
                'status' => $request->get('status')
            ]);
            return redirect('/dashboard')->with('message','Post created successfully');
        }
    }

    public function edit($id)
    {
        $post = Post::find($id);
        return view('admin.edit',compact('post'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'title' => 'required|min:3',
            'content' => 'required',
        ]);

        $post = Post::findOrFail($id);

        if(!$request->hasFile('image')){
            $post->update($request->all());
        }else{
            $file = $request->file('image');
            $path = $file->store('uploads', 'public');
            Post::where('id',$id)->update([
                'title'=>$title=$request->get('title'),
                'content' => $request->get('content'),
                'image'=>$path,
                'status' => $request->get('status')
            ]);
        }
        return redirect()->back()->with('message','Post updated  successfully');

    }



    public function destroy(Request $request)
    {
        $id = $request->get('id');
        $post = Post::find($id);
        $post->delete();
        return redirect()->back()->with('message','Post deleted successfully');
   }

   public function trash()
   {
       $posts = Post::onlyTrashed()->paginate(20);
       return view('admin.trash',compact('posts'));
   }

   public function restore($id)
   {
       Post::onlyTrashed()->where('id',$id)->restore();
       return redirect()->back()->with('message','Post restored successfully');
   }

   public function toggle($id)
   {
        $post = Post::find($id);
        $post->status = !$post->status;
        $post->save();
       return redirect()->back()->with('message','Status updated successfully');
   }

   public function show($id)
   {
       $post = Post::find($id);
       return view('admin.read',compact('post'));
   }

   public function getAllJobs()
   {
       $jobs = Job::latest()->paginate(20);
       return view('admin.job',compact('jobs'));
   }

   public function toggleStatusJob($id)
   {
        $job = Job::find($id);
        $job->status = !$job->status;
        $job->save();
        return redirect()->back()->with('message','Status updated successfully');
   }


}
