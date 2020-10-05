@extends('layouts.main')

@section('content')
    <div class="site-section bg-light">
        <div class="container">

            @if(Session::has('message'))
                                    <div class="alert alert-success">
                                        {{ Session::get('message') }}
                                    </div>
            @endif

            @if(Session::has('err_message'))
                                    <div class="alert alert-danger">
                                        {{ Session::get('err_message') }}
                                    </div>
            @endif

            @if(isset($errors) && count($errors)>0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
            @endif

            <div class="row">

                <div class="col-md-12 col-lg-8 mb-5">

                    <div class="p-5 bg-white">

                        <div class="mb-4 mb-md-5 mr-5">
                            <div class="job-post-item-header d-flex align-items-center">
                                <h2 class="mr-3 text-black h4">{{$job->position}}</h2>


                                <div class="badge-wrap">
                                    @if($job->type == 'fulltime')
                                            <span class="border border-info text-info py-2 px-4 rounded">{{$job->type}}</span>
                                    @elseif($job->type == 'parttime')
                                            <span class="border border-danger text-danger py-2 px-4 rounded">{{$job->type}}</span>
                                    @else
                                            <span class="border border-warning text-warning py-2 px-4 rounded">{{$job->type}}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="job-post-item-body d-block d-md-flex">
                                <div class="mr-3"><span class="fl-bigmug-line-portfolio23"></span> <a href="#">{{$job->company->cname}}</a></div>
                                <div><span class="fl-bigmug-line-big104"></span> <span>{{Str::limit($job->address,30)}}</span></div>
                            </div>
                        </div>



                        <div class="img-border mb-5">
                            <a href="https://vimeo.com/28959265" class="popup-vimeo image-play">
                  <span class="icon-wrap">
                    <span class="icon icon-play"></span>
                  </span>
                                <img src="{{asset('external/images/hero_2.jpg')}}" alt="Image" class="img-fluid rounded">
                            </a>
                        </div>



                        <div class="p-4 mb-8 bg-white">
                            <h3 class="h5 text-black mb-3">Description <a href="#" data-toggle="modal" data-target="#emailModal" ><i class="fa fa-envelope-square" style="font-size:34px;float:right;color:green"></i></a></h3>
                            <p>{{$job->description}}</p>
                        </div>
                        <div class="p-4 mb-8 bg-white">
                            <h3 class="h5 text-black mb-3">Roles and responsibilities</h3>
                            <p>{{$job->roles}}</p>
                        </div>
                        <div class="p-4 mb-8 bg-white">
                            <h3 class="h5 text-black mb-3">Number of vavancy</h3>
                            <p>{{$job->number_of_vacancy}}</p>
                        </div>

                        <div class="p-4 mb-8 bg-white">
                            <h3 class="h5 text-black mb-3">Experience</h3>
                            <p>{{$job->experience}} year</p>
                        </div>

                        <div class="p-4 mb-8 bg-white">
                            <h3 class="h5 text-black mb-3">Gender</h3>
                            <p>{{$job->gender}}</p>
                        </div>

                        <div class="p-4 mb-8 bg-white">
                            <h3 class="h5 text-black mb-3">Salary</h3>
                            <p>{{$job->salary}}</p>
                        </div>
                        <div class="p-4 mb-8 bg-white">
                            <p>
                            @if(Auth::check() && Auth::user()->user_type=='seeker')

                                @if(! $job->checkApplication())
                                    <apply-component :jobid={{$job->id}}></apply-component>
                                @endif
                                <br>
                                <favorite-component :jobid={{$job->id}}
                                    :favorited={{$job->checkSaved()?'true':'false'}}
                                ></favorite-component>
                            @endif
                            </p>
                        </div>
                        @foreach($jobRecommendations as $recommend)
                        <div class="card" style="width: 18rem;">
                            <div class="card-body">
                                <p class="badge badge-success">{{$recommend->type}}</p>
                                <h5 class="card-title">{{$recommend->position}}</h5>
                                <p class="card-text">{{Str::limit($recommend->description,90)}}</p>
                                <center><a href="{{route('jobs.show',[$recommend->id,$recommend->slug])}}" class="btn btn-success">Apply</a></center>
                            </div>
                        </div>
                        @endforeach



                            <!-- Modal -->
                            <div class="modal fade" id="emailModal" tabindex="-1" role="dialog" aria-labelledby="emailModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h5 class="modal-title" id="emailModalLabel">Send job to your friend</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    </div>
                                    <form action="{{ route('mail') }}" method="POST">@csrf
                                        <div class="modal-body">
                                            <input type="hidden" name="job_id" value="{{ $job->id }}">
                                            <input type="hidden" name="job_slug" value="{{ $job->slug }}">

                                            <div class="form-group">
                                                <label for="your_name">Your name *</label>
                                                <input type="text" name="your_name" class="form-control" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="your_email">Your email *</label>
                                                <input type="email" name="your_email" class="form-control" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="friend_name">Friend name *</label>
                                                <input type="text" name="friend_name" class="form-control" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="friend_email">Friend email *</label>
                                                <input type="email" name="friend_email" class="form-control" required>
                                            </div>
                                        </div>

                                    <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Mail this job</button>
                                    </div>
                                    </form>
                                </div>
                                </div>
                            </div>




                    </div>
                </div>

                <div class="col-lg-4">


                    <div class="p-4 mb-3 bg-white">
                        <h3 class="h5 text-black mb-3">Short Info</h3>
                        <p>Company name: {{$job->company->cname}}</p>
                        <p>Address: {{$job->address}}</p>
                        <p>Employment type: {{$job->type}}</p>
                        <p>Position: {{$job->position}}</p>
                        <p>Posted: {{$job->created_at->diffForHumans()}}</p>
                        <p>Last date to apply: {{date('F d, Y', strtotime($job->last_date))}}</p>

                        <p><a class="btn btn-primary py-2 px-4" href="{{route('company.index',[$job->company->id,$job->company->slug])}}">
                                Visit company page
                            </a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>








@endsection
