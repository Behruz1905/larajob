@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-md-12">
            <div class="company-profile">

                @if(empty(Auth::user()->company->cover_photo))
                    <img src="{{asset('cover/cover.jpg')}}" style="width:100%" alt="">
                @else
                    <img src="{{asset('uploads/coverphoto')}}/{{Auth::user()->company->cover_photo}}" width="100"
                         style="width: 100%" alt="">
                @endif

                <div class="company-desc">
                    <br>
                    @if(empty(Auth::user()->company->logo))
                        <img src="{{asset('avatar/avatar.jpg')}}"  width="100" alt="">
                    @else
                        <img src="{{asset('uploads/logo')}}/{{Auth::user()->company->logo}}" width="100" alt="">
                    @endif
                    <p>{{ $company->description }}</p>
                    <h1>{{$company->cname}}</h1>
                    <p><strong>Slogan-</strong>{{$company->slogan}}&nbsp;/
                        Adress- {{$company->address}}&nbsp;/
                        Phone- {{$company->phone}}&nbsp;/
                        Website-{{$company->website}}</p>
                </div>
            </div>

            <table class="table">
                <thead>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>

                </thead>
                <tbody>
                @foreach( $company->jobs as $job)
                    <tr>
                        <td><img src="{{asset('avatar/avatar.jpg')}}"  width="80" alt=""></td>
                        <td>position : {{$job->position}}
                            <br>
                            <i class="fa fa-clock-o" aria-hidden="true"></i>&nbsp;{{$job->type}}
                        </td>
                        <td><i class="fa fa-map-marker" aria-hidden="true"></i>Address: {{$job->address}}</td>
                        <td><i class="fa fa-globe" aria-hidden="true"></i>&nbsp;Date: {{$job->created_at->diffForHumans()}} </td>
                        <td>
                            <a href="{{route('jobs.show', [$job->id, $job->slug])}}">
                                <button class="btn btn-success btn-sm">Apply</button></a></td>
                    </tr>
                @endforeach
                </tbody>



            </table>
        </div>
    </div>
@endsection
