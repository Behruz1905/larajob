@extends('layouts.main')

@section('content')
    <div class="container">
        <div class="row" style="margin-top: 100px">

            <h1>{{$categoryName->name}}</h1>
            <table class="table">
                <thead>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>

                </thead>
                <tbody>
                @foreach( $jobs as $job)
                    <tr>
                        <td><img src="{{asset('uploads/logo')}}/{{ $job->company->logo }}"  width="80" alt=""></td>
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

            {{ $jobs->appends(Illuminate\Support\Facades\Request::except('page'))->links() }}

        </div>



    </div>

@endsection

<style>
    .fa {
        color: #4183D7;
    }
</style>