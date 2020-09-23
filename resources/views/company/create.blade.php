@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                @if(empty(Auth::user()->company->logo))
                    <img src="{{asset('avatar/avatar.jpg')}}" width="100" style="width: 100%" alt="">
                @else
                    <img src="{{asset('uploads/logo')}}/{{Auth::user()->company->logo}}" width="100" style="width: 100%" alt="">
                @endif

                <br><br>
                <form action="{{route('company.logo')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card">
                        <div class="card-header">Update logo

                        </div>

                        <div class="card-body">
                            <input type="file" class="form-control" name="company_logo">
                            <br>
                            <button class="btn btn-success float-right" type="submit">Update</button>
                            @if($errors->has('company_logo'))
                                <div class="error" style="color:red">{{ $errors->first('company_logo') }}</div>
                            @endif
                        </div>
                    </div>
                </form>


            </div>
            <div class="col-md-5">
                <div class="card">
                    <div class="card-header">Update your company  profile</div>
                    <form action="{{ route('company.store') }}" method="POST" >@csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="address">Address</label>
                                <input id="address" type="text" class="form-control" name="address" value="{{ Auth::user()->company->address }}">
                                @if($errors->has('address'))
                                    <div class="error" style="color:red">{{ $errors->first('address') }}</div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="address">Phone</label>
                                <input id="address" type="text" class="form-control" name="phone" value="{{ Auth::user()->company->phone }}">
                                @if($errors->has('phone'))
                                    <div class="error" style="color:red">{{ $errors->first('phone') }}</div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="website">Website</label>
                                <input id="website" type="text" class="form-control" name="website" value="{{ Auth::user()->company->website }}">
                                @if($errors->has('address'))
                                    <div class="error" style="color:red">{{ $errors->first('website') }}</div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="slogan">Slogan</label>
                                <input id="slogan" type="text" class="form-control" name="slogan" value="{{ Auth::user()->company->slogan }}">
                                @if($errors->has('slogan'))
                                    <div class="error" style="color:red">{{ $errors->first('slogan') }}</div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea name="description" id="description" class="form-control">{{ Auth::user()->company->description }}</textarea>
                                @if($errors->has('slogan'))
                                    <div class="error" style="color:red">{{ $errors->first('description') }}</div>
                                @endif
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
                    <div class="card-header">About your company

                    </div>

                    <div class="card-body">
                        <p>Name: {{Auth::user()->company->cname}}</p>
                        <p>Address: {{Auth::user()->company->address}}</p>
                        <p>Phone: {{Auth::user()->company->phone}}</p>
                        <p>Website: <a href="{{Auth::user()->company->website}}">{{Auth::user()->company->website}}</a></p>
                        <p>Company slogan: {{Auth::user()->company->slogan}}</p>
                        <p>Company page: <a href="company/{{Auth::user()->company->slug}}">View</a></p>

                    </div>
                </div>


                <form action="{{route('cover.photo')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card">
                        <div class="card-header">Update Cover Photo

                        </div>

                        <div class="card-body">
                            <input type="file" class="form-control" name="cover_photo">
                            <br>
                            <button class="btn btn-dark float-right" type="submit">Update</button>

                            @if($errors->has('cover_photo'))
                                <div class="error" style="color:red">{{ $errors->first('cover_photo') }}</div>
                            @endif
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection
