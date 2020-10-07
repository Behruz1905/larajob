<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Http\Requests\JobPostRequest;
use App\Job;
use App\Category;
use App\Company;
use Illuminate\Support\Facades\Auth;
use App\Post;
use \stdClass;

class JobController extends Controller
{
    public function __construct()
    {
        $this->middleware(['employer','verified'], ['except' => ['index','show','apply','allJobs','searchJobs']]);
    }
    public function  index()
    {
        $jobs = Job::latest()->limit(10)->where('status',1)->get();
        $categories = Category::with('jobs')->get();
       // $companies = Company::latest()->limit(12)->get(); axirinci 12 isi getiri
        $posts = Post::where('status',1)->get();
        $testimonial  = Testimonial::orderBy('id','DESC')->first();
        $companies = Company::get()->random(12);
        return view('welcome', compact('jobs','companies','categories','posts','testimonial'));
    }

    public  function show($id, Job $job)
    {
        $jobRecommendations =  $this->jobRecommendations($job);


        return view('jobs.show', compact('job','jobRecommendations'));
    }



    public function jobRecommendations($job)
    {
        $data = [];
        $jobBasedOnCategories = Job::latest()
            ->where('category_id', $job->category_id)
            ->wheredate('last_date','>',date('Y-m-d'))
            ->where('id','!=',$job->id)
            ->where('status', 1)
            ->limit(6)
            ->get();
        array_push($data, $jobBasedOnCategories);
        $jobBasedOnCompany = Job::latest()
            ->where('company_id', $job->company_id)
            ->wheredate('last_date','>',date('Y-m-d'))
            ->where('id','!=',$job->id)
            ->where('status', 1)
            ->limit(6)
            ->get();
        array_push($data, $jobBasedOnCompany);
        $jobBasedOnPosition = Job::latest()
            ->where('position','LIKE','%'.$job->position.'%')
            ->wheredate('last_date','>',date('Y-m-d'))
            ->where('id','!=',$job->id)
            ->where('status', 1)
            ->limit(6)
            ->get();
        array_push($data, $jobBasedOnPosition);
        $collection = collect($data);
        $unique = $collection->unique("id");
        $jobRecommendations =  $unique->values()->first();
        return $jobRecommendations;
    }

    public function create()
    {
        return view('jobs.create');
    }

    public function store(JobPostRequest $request)
    {
        $user_id = auth()->user()->id;
        $company = Company::where('user_id',$user_id)->first();
        $company_id = $company->id;
        Job::create([
            'user_id' => $user_id,
            'company_id' =>$company_id,
            'title' => request('title'),
            'slug' => Str::slug(request('title')),
            'description' => request('description'),
            'roles' => request('roles'),
            'category_id' => request('category'),
            'position' => request('position'),
            'address' => request('address'),
            'type' => request('type'),
            'status' => request('status'),
            'last_date' => request('last_date'),
            'number_of_vacancy'=> request('number_of_vacancy'),
            'gender' => request('gender'),
            'experience' => request('experience'),
            'salary' => request('salary')
        ]);

        return redirect()->back()->with('message', 'Job posted successfully!');
    }

    public function update(Request $request,$id)
    {
        $job = Job::findOrFail($id);
        $job->update($request->all());
        return redirect()->back()->with('message', 'Job updated successfully!');
    }

    public function myJob()
    {
        $jobs = Job::where('user_id', auth()->user()->id)->get();
        return view('jobs.myjob',compact('jobs'));
    }

    public function edit($id)
    {
        $job = Job::findOrFail($id);
        return view('jobs.edit',compact('job'));
    }

    public function apply(Request $request,$id)
    {
        $jobId = Job::find($id);
        $jobId->users()->attach(Auth::user()->id);
        return redirect()->back()->with('message', 'Application sent successfully!');
    }

    public function applicant()
    {
        $applicants = Job::has('users')->where('user_id',auth()->user()->id)->get();
        return view('jobs.applicants', compact('applicants'));
    }

    public function allJobs(Request $request)
    {

        $search = $request->get('search');
        $address = $request->get('address');
        if($search && $address){
            $jobs = Job::where('position','LIKE','%'.$search.'%')
                ->orWhere('title','LIKE','%'.$search.'%')
                ->orWhere('type','LIKE','%'.$search.'%')
                ->orWhere('address','LIKE','%'.$search.'%')
                ->paginate(10);
            return view('jobs.alljobs',compact('jobs'));
        }


        $keyword = $request->get('title');
        $type = $request->get('type');
        $category = $request->get('category_id');
        $address = $request->get('address');

            if($keyword || $type || $category || $address){
          // dd($keyword ."-".$type."-".$category."-".$address);
            $jobs = Job::where('title','LIKE','%'.$keyword.'%')
                        ->orWhere('type',$type)
                        ->orWhere('category_id',$category)
                        ->orWhere('address',$address)
                        ->paginate(10);
        }else{
            $jobs = Job::latest()->paginate(10);
        }


        return view('jobs.alljobs',compact('jobs'));
    }


    public function searchJobs(Request $request)
    {
        $keyword = $request->get('keyword');   //request('keyword')
        $jobs = Job::where('title','like', '%'.$keyword.'%')
                    ->orWhere('position','like', '%'.$keyword.'%')->get();
        return response()->json($jobs);

    }


}
