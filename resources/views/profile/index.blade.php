@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
                <div class="col-md-2">
                    <img src="{{asset('avatar/avatar.jpg')}}" width="100" alt="">
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">Update your profile</div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="address">Address</label>
                                <input type="text" class="form-control" name="address">
                            </div>
                            <div class="form-group">
                                <label for="experience">Experience</label>
                                <textarea name="experience" class="form-control" id="experience" cols="30" rows="10"></textarea>

                            </div>
                            <div class="form-group">
                                <label for="bio">Bio</label>
                                <textarea name="bio" class="form-control" id="bio" cols="30" rows="10"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>
@endsection
