@extends('layouts.main')

@section('content')
    <div class="site-section bg-light">
       <div class="container">
        <div class="row">
            @if(Session::has('message'))
                <div class="alert alert-success">
                    {{ Session::get('message') }}
                </div>
            @endif
            <div class="col-md-12 col-lg-8 mb-5">

                    <h2>{{ __('Employer Registiration') }}</h2>

                        <form method="POST" class="p-5 bg-white" action="{{ route('emp.register') }}">
                            @csrf

                            <input type="hidden" value="employer" name="user_type">

                            <div class="form-group row">
                                <div class="col-md-12">{{ __('Company name') }}</div>
                                <div class="col-md-12 mb-3 mb-md-0">
                                    <input id="cname" type="text" class="form-control @error('cname') is-invalid @enderror" name="cname" value="{{ old('cname') }}" required autocomplete="cname" autofocus>

                                    @error('cname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-12">{{ __('E-Mail Address') }}</div>
                                <div class="col-md-12 mb-3 mb-md-0">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>



                            <div class="form-group row">
                                <div class="col-md-12">{{ __('Password') }}</div>

                                <div class="col-md-12 mb-3 mb-md-0">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-12">{{ __('Confirm Password') }}</div>
                                <div class="col-md-12 mb-3 mb-md-0">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Register as employer') }}
                                    </button>
                                </div>
                            </div>
                        </form>








            </div>
        </div>
    </div>
    </div>
@endsection
