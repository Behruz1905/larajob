
@extends('layouts.main')

@section('content')
    <div class="site-section bg-light">
        <div class="container">
            <h2>Companies</h2>
            <div class="row">
                @foreach($companies as $company)
                <div class="col-md-3">
                    <div class="card" style="width: 18rem;">
                        @if(empty($company->logo))
                            <img class="card-img-top" src="{{asset('avatar/avatar.jpg')}}"  width="100" alt="">
                        @else
                            <img class="card-img-top" src="{{asset('uploads/logo')}}/{{$company->logo}}" width="100" alt="">
                        @endif

                        <div class="card-body">
                            <h5 class="card-title text-center">{{$company->cname}}</h5>

                            <center><a href="{{route('company.index',[$company->id,$company->slug])}}" class="btn btn-primary">View company</a></center>
                        </div>
                    </div>
                </div>
                 @endforeach

            </div>
            <br><br><br>
            {{ $companies->appends(Illuminate\Support\Facades\Request::except('page'))->links() }}

        </div>

    </div>











@endsection
