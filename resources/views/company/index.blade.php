
@extends('layouts.main')

@section('content')
    <div class="site-section bg-light">
        <div class="container">
            <div class="row">

                <div class="col-md-12 col-lg-12 mb-5">

                    <div class="p-5 bg-white">

                        <div class="mb-4 mb-md-5 mr-5">
                            <div class="job-post-item-header d-flex align-items-center">
                                <h2 class="mr-3 text-black h4"></h2>


                                <div class="badge-wrap">

                                </div>
                            </div>
                            <div class="job-post-item-body d-block d-md-flex">
                                <div class="mr-3"><span class="fl-bigmug-line-portfolio23"></span> <a href="#"></a></div>
                                <div><span class="fl-bigmug-line-big104"></span> <span></span></div>
                            </div>
                        </div>



                        <div class="img-border mb-5">
                            <a href="https://vimeo.com/28959265" class="popup-vimeo image-play">
                              <span class="icon-wrap">
                                <span class="icon icon-play"></span>
                              </span>


                                @if(empty($company->cover_photo))

                                    <img src="{{asset('cover/cover.jpg')}}" style="width:100%" alt="" class="img-fluid rounded>
                                @else
                                    <img src="{{asset('uploads/coverphoto')}}/{{$company->cover_photo}}" width="100"
                                         style="width: 100%" alt="" class="img-fluid rounded">
                                @endif

                            </a>
                        </div>



                            <div class="p-4 mb-8 bg-white">
                                <div class="company-desc">
                                    <br>
                                    @if(empty($company->logo))
                                        <img src="{{asset('avatar/avatar.jpg')}}"  width="100" alt="">
                                    @else
                                        <img src="{{asset('uploads/logo')}}/{{$company->logo}}" width="100" alt="">
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
                </div>


            </div>
        </div>


    </div>








@endsection
