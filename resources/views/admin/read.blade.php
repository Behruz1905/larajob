@extends('layouts.main')

@section('content')
    <div class="site-section bg-light">
        <div class="container">

            <div class="row">
                <div class="title" style="margin-top: 20px">
                        <h2>{{$post->title}}</h2>
                </div>
                <img src="{{ asset('storage/'.$post->image) }}" style="width: 100%" alt="">
                <div class="col-lg-8 mb-5">

                    <div class="p-4 mb-8 bg-white">
                        <h5 class="h5 text-black mb-3">Created by:Admin &nbsp;{{date('d-m-Y',strtotime($post->created_at))}}</h5>
                        <p>{{$post->content }}</p>
                    </div>
                </div>

                <div class="col-lg-4">



                </div>
            </div>
        </div>
    </div>








@endsection

