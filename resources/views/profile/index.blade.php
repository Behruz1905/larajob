@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
                <div class="col-md-3">
                    @if(empty(Auth::user()->profile->avatar))
                         <img src="{{asset('avatar/avatar.jpg')}}" width="100" style="width: 100%" alt="">
                    @else
                        <img src="{{asset('uploads/avatar')}}/{{Auth::user()->profile->avatar}}" width="100" style="width: 100%" alt="">
                    @endif

                    <br><br>
                    <form action="{{route('avatar')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card">
                            <div class="card-header">Update avatar

                            </div>

                            <div class="card-body">
                                <input type="file" class="form-control" name="avatar">
                                <br>
                                <button class="btn btn-success float-right" type="submit">Update</button>
                            </div>
                        </div>
                    </form>


                </div>
                <div class="col-md-5">
                    <div class="card">
                        <div class="card-header">Update your profile</div>
                        <form action="{{ route('profile.create') }}" method="POST" >@csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="address">Address</label>
                                    <input id="address" type="text" class="form-control" name="address" value="{{ Auth::user()->profile->address }}">
                                </div>
                                <div class="form-group">
                                    <label for="experience">Experience</label>
                                    <textarea name="experience" class="form-control" id="experience" cols="30" rows="10">
                                        {{ Auth::user()->profile->experience }}
                                    </textarea>

                                </div>
                                <div class="form-group">
                                    <label for="bio">Bio</label>
                                    <textarea name="bio" class="form-control" id="bio" cols="30" rows="10">
                                        {{ Auth::user()->profile->bio }}
                                    </textarea>
                                </div>

                                <div class="form-group">
                                    <button class="btn btn-success" type="submit">Update</button>
                                </div>

                                @if(Session::has('message'))
                                <div class="alert alert-success">
                                    {{ Session::get('message') }}
                                </div>
                                @endif
                        </div>

                    </form>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">Your information

                        </div>

                        <div class="card-body">
                          <p>Name: {{ Auth::user()->name }}</p>
                          <p>Email: {{ Auth::user()->email }}</p>
                          <p>Address: {{ Auth::user()->profile->address }}</p>
                          <p>Gender: {{ Auth::user()->profile->gender }}</p>
                          <p>Experience: {{ Auth::user()->profile->experience }}</p>
                          <p>Bio: {{ Auth::user()->profile->bio }}</p>
                          <p>Member On: {{ date('F d Y',strtotime(Auth::user()->created_at)) }}</p>

                            @if(!empty(Auth::user()->profile->cover_letter))
                                <p><a href="{{Storage::url(Auth::user()->profile->cover_letter)}}">Cover letter</a></p>
                            @else
                                <p>Please upload cover letter</p>
                            @endif

                            @if(!empty(Auth::user()->profile->resume))
                                <p><a href="{{Storage::url(Auth::user()->profile->resume)}}">resume</a></p>
                            @else
                                <p>Please upload your resume</p>
                            @endif
                        </div>
                    </div>
                    <form action="{{route('cover.letter')}}" method="POST" enctype="multipart/form-data">
                        @csrf

                            <div class="card">
                                <div class="card-header">Update coverletter

                                </div>

                                <div class="card-body">
                                   <input type="file" class="form-control" name="cover_letter">
                                   <br>
                                   <button class="btn btn-success float-right" type="submit">Update</button>
                                </div>
                            </div>
                    </form>
                    <br>

                    <form action="{{route('resume')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                            <div class="card">
                                <div class="card-header">Update resume

                                </div>

                                <div class="card-body">
                                   <input type="file" class="form-control" name="resume">
                                   <br>
                                   <button class="btn btn-success float-right" type="submit">Update</button>
                                </div>
                            </div>
                    </form>

                </div>
        </div>
    </div>
@endsection
