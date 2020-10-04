<?php

namespace App\Http\Controllers;

use App\Mail\SendJob;
use Illuminate\Http\Request;
use Mail;

class EmailController extends Controller
{

        public function send(Request $request)
        {
            $homeUrl = url('/'); //localhost:8000
            $jobId = $request->get('job_id');
            $jobSlug = $request->get('job_slug');
            $jobUrl = $homeUrl.'/jobs/'.$jobId.'/'.$jobSlug;

            $data = array(
                'your_name' =>$request->get('your_name'),
                'your_email' =>$request->get('your_email'),
                'friend_name' =>$request->get('friend_name'),
                'friend_email' =>$request->get('friend_email'),
                'jobUrl' => $jobUrl
            );

            $emailTo = $request->get('friend_email');
            try{
                Mail::to($emailTo)->send(new SendJob($data));
                return redirect()->back()->with('message', 'Job sent to '.$emailTo);
            } catch(\Exception $e){
                return redirect()->back()->with('err_message', 'Sorry, Something went wrong.Please try later');
            }


        }
}
