@extends('layouts.app')


@section('content')

    <div class="container">
        @if(Session::has('message'))
            <div class="alert alert-success">
                {{ Session::get('message') }}
            </div>
        @endif
        <div class="row">
            <div class="col-md-4">
                @include('admin.left-menu')
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Add post
                    </div>
                    <div class="card-body">
                        <form action="{{route('testimonial.store')}}" method="POST">@csrf
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="name" id="name" name="name" class="form-control @error('name') is-invalid @enderror">
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="content">Content</label>
                                <textarea name="content" id="content" class="form-control @error('content') is-invalid @enderror"></textarea>
                                @error('content')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="profession">Profession</label>
                                <textarea name="profession" id="profession" class="form-control @error('profession') is-invalid @enderror"></textarea>
                                @error('profession')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="video_id">Vimeo Video id</label>
                                <input type="video_id" id="video_id" name="video_id" class="form-control @error('video_id') is-invalid @enderror">
                                @error('video_id')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-success">Submit</button>
                            </div>


                        </form>
                    </div>
                </div>
            </div>
        </div>


    </div>

@endsection

