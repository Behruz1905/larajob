@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">create a job </div>

                    <form action="{{route('job.store')}}" class="card-body" method="POST">@csrf
                            <div class="form-group">
                                <label for="title">Title:</label>
                                <input type="text" name="title"
                                       class="form-control
                                       @error('title') is-invalid @enderror"
                                       value="{{ old('title') }}">
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
                                    {{ old('description') }}
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
                                    {{ old('roles') }}
                                </textarea>
                                @error('roles')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="category">Category</label>
                                <select name="category" id="category" class="form-control">
                                        @foreach(App\Category::all() as $cat)
                                        <option value="{{$cat->id}}">{{$cat->name}}</option>
                                        @endforeach

                                </select>
                            </div>
                            <div class="form-group">
                                <label for="position">Position:</label>
                                <input type="text" id="position"
                                       name="position"
                                       class="form-control  @error('position') is-invalid @enderror"
                                       value="{{ old('position') }}">
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
                                           value="{{ old('address') }}">
                                    @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="type">Type:</label>
                                    <select name="type" id="type" class="form-control">
                                        <option value="fulltime">fulltime</option>
                                        <option value="parttime">parttime</option>
                                        <option value="casual">casual</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="status">Status:</label>
                                    <select name="status" id="status" class="form-control">
                                        <option value="1">live</option>
                                        <option value="0">draft</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="datepicker">Last date:</label>
                                    <input type="text"
                                           id="datepicker"
                                           name="last_date"
                                           class="form-control @error('last_date') is-invalid @enderror"
                                           value="{{ old('last_date') }}">
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
