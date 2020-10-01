@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">update a job </div>

                    <form action="{{route('job.update',[$job->id])}}" class="card-body" method="POST">@csrf
                        <div class="form-group">
                            <label for="title">Title:</label>
                            <input type="text" name="title"
                                   class="form-control
                                       @error('title') is-invalid @enderror"
                                   value="{{ $job->title }}">
                            @error('title')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea name="description" id="description"
                                      class="form-control  @error('description') is-invalid @enderror">
                                    {{ $job->description }}
                                </textarea>
                            @error('description')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="roles">Role</label>
                            <textarea name="roles" id="roles"
                                      class="form-control @error('roles') is-invalid @enderror">
                                    {{ $job->roles }}
                                </textarea>
                            @error('roles')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="category">Category</label>
                            <select name="category_id" id="category" class="form-control">
                                @foreach(App\Category::all() as $cat)
                                    <option value="{{$cat->id}}" {{$cat->id==$job->category_id ? 'selected':''}}>{{$cat->name}}</option>
                                @endforeach

                            </select>
                        </div>
                        <div class="form-group">
                            <label for="position">Position:</label>
                            <input type="text" id="position"
                                   name="position"
                                   class="form-control  @error('position') is-invalid @enderror"
                                   value="{{ $job->position }}">
                            @error('position')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="address">Address:</label>
                            <input type="text" id="address"
                                   name="address"
                                   class="form-control @error('address') is-invalid @enderror"
                                   value="{{ $job->address }}">
                            @error('address')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="number_of_vacancy">No of vacancy:</label>
                            <input type="text" id="number_of_vacancy"
                                   name="number_of_vacancy"
                                   class="form-control @error('number_of_vacancy') is-invalid @enderror"
                                   value="{{ $job->number_of_vacancy }}">
                            @error('number_of_vacancy')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="experience">Year of experience:</label>
                            <input type="text" id="experience"
                                   name="experience"
                                   class="form-control @error('experience') is-invalid @enderror"
                                   value="{{ $job->experience }}">
                            @error('experience')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>


                        <div class="form-group">
                            <label for="gender">Gender:</label>
                            <select name="gender" id="gender" class="form-control">
                                <option value="any" {{$job->gender=='any'?'selected':''}}>Any</option>
                                <option value="male" {{$job->gender=='male'?'selected':''}}>Male</option>
                                <option value="female" {{$job->gender=='female'?'selected':''}}>Female</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="salary">Salary:</label>
                            <select name="salary" id="salary" class="form-control">
                                <option value="negotiable" {{$job->salary=='negotiable'?'selected':''}}>Negotiable</option>
                                <option value="1000-1500" {{$job->salary=='1000-1500'?'selected':''}}>1000-1500</option>
                                <option value="1500-1800" {{$job->salary=='1500-1800'?'selected':''}}>1500-1800</option>
                                <option value="1800-2000" {{$job->salary=='1800-2000'?'selected':''}}>1800-2000</option>
                                <option value="2000-2500" {{$job->salary=='2000-2500'?'selected':''}}>2000-2500</option>
                                <option value="2500-3000" {{$job->salary=='2500-3000'?'selected':''}}>2500-3000</option>
                                <option value="3000+" {{$job->salary=='3000+'?'selected':''}}>3000+</option>
                            </select>
                        </div>







                        <div class="form-group">
                            <label for="type">Type:</label>
                            <select name="type" id="type" class="form-control">
                                <option value="fulltime"{{$job->type=='fulltime'?'selected':''}}>fulltime</option>
                                <option value="parttime"{{$job->type=='parttime'?'selected':''}}>parttime</option>
                                <option value="casual"{{$job->type=='casual'?'selected':''}}>casual</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="status">Status:</label>
                            <select name="status" id="status" class="form-control">
                                <option value="1"{{$job->status=='1'?'selected':''}}>live</option>
                                <option value="0"{{$job->status=='0'?'selected':''}}>draft</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="lastdate">Last date:</label>
                            <input type="date"
                                   id="lastdate"
                                   name="last_date"
                                   class="form-control @error('last_date') is-invalid @enderror"
                                   value="{{ $job->last_date }}">
                            @error('last_date')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-dark">Submit</button>
                        </div>

                        @if(Session::has('message'))
                            <div class="alert alert-success">
                                {{ Session::get('message') }}
                            </div>
                        @endif

                    </form>




                </div>

            </div>
        </div>
    </div>
@endsection
