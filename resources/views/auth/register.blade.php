@extends('layouts.main')

@section('content')



    <div class="site-section bg-light">
        <div class="container">
            <div class="row">

                <div class="col-md-12 col-lg-8 mb-5">
                    <h2>{{ __('Seeker Registiration') }}</h2>

                        <form method="POST"  class="p-5 bg-white" action="{{ route('register') }}">
                            @csrf

                            <input type="hidden" value="seeker" name="user_type">

                            <div class="form-group row">
                                <label for="name" class="font-weight-bold">{{ __('Name') }}</label>

                                <div class="col-md-12 mb-3 mb-md-0">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="font-weight-bold">{{ __('E-Mail Address') }}</label>

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
                                <label for="dob" class="font-weight-bold">{{ __('Date of Birth') }}</label>

                                <div class="col-md-12 mb-3 mb-md-0">
                                    <input id="datepicker" type="text" class="form-control @error('dob') is-invalid @enderror" name="dob" value="{{ old('dob') }}" required autocomplete="dob">

                                    @error('dob')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>



                            <div class="form-group row">
                                <label for="password" class="font-weight-bold">{{ __('Password') }}</label>

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
                                <label for="password-confirm" class="font-weight-bold">{{ __('Confirm Password') }}</label>

                                <div class="col-md-12 mb-3 mb-md-0">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="email" class="font-weight-bold">{{ __('Gender') }}</label>

                                <div class="col-md-12 mb-3 mb-md-0">
                                    <input id="gender" type="radio"  name="gender" value="male">Male
                                    <input id="gender" type="radio"  name="gender" value="female">Female
                                    @error('gender')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </div>
                        </form>


            </div>
        </div>
    </div>
    </div>






@endsection
