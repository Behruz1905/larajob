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
                       Edit Post
                    </div>
                    <div class="card-body">
                        <form action="{{route('post.update',[$post->id])}}" method="POST" enctype="multipart/form-data">@csrf
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text"
                                       id="title"
                                       name="title"
                                       value="{{$post->title}}"
                                       class="form-control @error('title') is-invalid @enderror">
                                @error('title')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="content">Content</label>
                                <textarea name="content"
                                          id="content"
                                          class="form-control @error('content') is-invalid @enderror">
                                    {{$post->content}}
                                </textarea>
                                @error('content')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="image">Image</label>
                                <input type="file" id="image" name="image" class="form-control @error('image') is-invalid @enderror">
                                <img src="{{asset('storage/'.$post->image)}}" style="width: 100%" alt="">
                                @error('image')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="status">Status</label>
                                <select name="status" id="status" class="form-control">
                                    <option value="1"{{$post->status == '1'?'selected':''}}>Live</option>
                                    <option value="0"{{$post->status == '0'?'selected':''}}>Draft</option>
                                </select>
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

