@extends('layouts.dashboard_layout')
@section('title', 'Forget Password Page')


@section('content')

    <div class="authincation bg-dark">
        <div class="container-fluid h-100">
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

                                    <h4 class="text-center mb-4">Generate New Password</h4>
                                    @include('components.alert_msg')
                                    <form action="{{ route('forget') }}" method="post">
                                        @csrf
                                        <div class="form-group">
                                            <label><strong>Enter Your Registered Email</strong></label>
                                            <input type="email" class="form-control" name="email"
                                                placeholder="email@gmail.com">
                                            <small>Your new password will send to your registered email, you have to use
                                                same
                                                password while login and after login you can create your own
                                                password</small>
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary btn-block">Send Password</button>
                                        </div>
                                    </form>
                                    <div class="new-account mt-3">
                                        <p>Don't have an account? <a class="text-primary"
                                                href="{{ route('users.create') }}">Sign up</a></p>
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
