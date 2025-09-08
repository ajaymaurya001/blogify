@extends('layouts.dashboard_layout')
@section('title', 'Registration Page')


@section('content')

    <div class="authincation bg-dark">
        <div class="container-fluid">
            <div class="row justify-content-center min-vh-100 align-items-center">
                <div class="col-md-6">
                    <div class="authincation-content">
                        <div class="row no-gutters">
                            <div class="col-12 text-center bg-dark">
                                <a href="{{ route('home') }}" class="navbar-brand font-weight-bold text-secondary"
                                    style="font-size: 50px">
                                    <img src="{{ asset('assets/img/blogify-logo.webp') }}" alt="" width="160px">
                                </a>
                            </div>
                            <div class="col-xl-12">
                                <div class="auth-form">

                                    <h4 class="text-center mb-4">Share, Inspire & Grow – Join as a Blogger</h4>
                                              @include('components.alert_msg')
                                    <form action="{{ route('users.store') }}" method="POST">
                                        @csrf
                                        <!-- Name -->
                                        <div class="form-group">
                                            <label><strong>Name</strong></label>
                                            <input type="text" class="form-control" name="name"
                                                placeholder="Enter your name" value="{{ old('name') }}">
                                            @error('name')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>

                                        <!-- Email -->
                                        <div class="form-group">
                                            <label><strong>Email</strong></label>
                                            <input type="text" class="form-control" name="email"
                                                placeholder="hello@example.com" value="{{ old('email') }}">
                                            @error('email')
                                                <small class="text-danger">{{ $message }}<br></small>
                                            @enderror
                                            <small>Your password will send to this email, you have to use same
                                                password while login !!</small>
                                        </div>

                                        <!-- Mobile Number -->
                                        <div class="form-group">
                                            <label><strong>Mobile No.</strong></label>
                                            <input type="text" class="form-control" name="mobile"
                                                placeholder="Enter mobile number" value="{{ old('mobile') }}">
                                            @error('mobile')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>

                                        <!-- Date of Birth -->
                                        <div class="form-group">
                                            <label><strong>Date of Birth</strong></label>
                                            <input type="date" class="form-control" name="dob"
                                                value="{{ old('dob') }}">
                                            @error('dob')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>

                                        <!-- Gender -->
                                        <div class="form-group">
                                            <label><strong>Gender</strong></label><br>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="gender" id="male"
                                                    value="male" checked>
                                                <label class="form-check-label" for="male">Male</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="gender" id="female"
                                                    value="female">
                                                <label class="form-check-label" for="female">Female</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="gender" id="other"
                                                    value="other">
                                                <label class="form-check-label" for="other">Other</label>
                                            </div>
                                            @error('gender')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>

                                        <!-- Bio -->
                                        <div class="form-group">
                                            <label><strong>Bio</strong></label>
                                            <textarea class="form-control" rows="3" name="bio" placeholder="Write about yourself..." maxlength="150">{{ old('bio') }}</textarea>
                                            @error('bio')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>

                                        <!-- Submit -->
                                        <div class="text-center mt-4">
                                            <button type="submit" class="btn btn-primary btn-block mx-auto col-lg-6">Turn Your Ideas
                                                Into Blogs – Register Now</button>
                                        </div>
                                    </form>

                                    <div class="new-account mt-3">
                                        <p>Already have an account? <a class="text-primary"
                                                href="{{ route('login') }}">Sign in</a></p>
                                    </div>

                                    <a href="{{ route('home') }}" class="return_btn">
                                        < Return home</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
