@extends('layouts.dashboard_layout')
@section('title', 'Edit User')


@section('content')

    <div class="col-xl-12">
        <div class="auth-form">

            <h4 class="text-center mb-4">Edit User</h4>
            @include('components.alert_msg')
            <form action="{{ route('users.update',$user->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('put')
                <!-- Name -->
                <div class="form-group">
                    <label><strong>Name</strong></label>
                    <input type="text" class="form-control" name="name" placeholder="Enter your name"
                        value="{{ $user->name }}">
                    @error('name')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <!-- Email -->
                <div class="form-group">
                    <label><strong>Email</strong></label>
                    <input type="text" class="form-control" name="email" placeholder="hello@example.com"
                        value="{{ $user->email }}" readonly>
                    @error('email')
                        <small class="text-danger">{{ $message }}<br></small>
                    @enderror
                    <small>Only User can edit their email !!</small>
                </div>

                <!-- Mobile Number -->
                <div class="form-group">
                    <label><strong>Mobile No.</strong></label>
                    <input type="text" class="form-control" name="mobile" placeholder="Enter mobile number"
                        value="{{ $user->mobile }}">
                    @error('mobile')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <!-- Date of Birth -->
                <div class="form-group">
                    <label><strong>Date of Birth</strong></label>
                    <input type="date" class="form-control" name="dob" value="{{ $user->dob }}">
                    @error('dob')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <!-- Gender -->
                <div class="form-group">
                    <label><strong>Gender</strong></label><br>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="gender" id="male" value="male" {{ $user->gender == 'male' ? 'checked' : '' }}>
                        <label class="form-check-label" for="male">Male</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="gender" id="female" value="female" {{ $user->gender == 'female' ? 'checked' : '' }}>
                        <label class="form-check-label" for="female">Female</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="gender" id="other" value="other" {{ $user->gender == 'other' ? 'checked' : '' }}>
                        <label class="form-check-label" for="other">Other</label>
                    </div>
                    @error('gender')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <!-- Bio -->
                <div class="form-group">
                    <label><strong>Bio</strong></label>
                    <textarea class="form-control" rows="3" name="bio" placeholder="Write about yourself..." maxlength="150">{{ $user->bio }}</textarea>
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
                <p>Already have an account? <a class="text-primary" href="{{ route('login') }}">Sign in</a></p>
            </div>

            <a href="{{ route('home') }}" class="return_btn">
                < Return home</a>
        </div>
    </div>

@endsection
