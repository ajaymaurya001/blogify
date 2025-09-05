@extends('layouts.dashboard_layout')
@section('title', 'Login Page')


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
                                    <a href="{{ route('home') }}" class="return_btn">
                                        < Return home</a>
                                            <h4 class="text-center mb-4">Sign In to Your Blog</h4>
                                            @if (session('success'))
                                                <div class="alert alert-success bg-light">
                                                    {{ session('success') }}
                                                </div>
                                            @endif

                                            @if (session('error'))
                                                <div class="alert alert-danger bg-light">
                                                    {{ session('error') }}
                                                </div>
                                            @endif
                                            <form action="{{ route('login.store') }}" method="post">
                                                @csrf
                                                <div class="form-group">
                                                    <label><strong>Registered Email</strong></label>
                                                    <input type="email" class="form-control" name="email"
                                                        value="{{ old('email') }}" placeholder="Enter your registered email">
                                                    @error('email')
                                                        <small class="text-danger">{{ $message }}</small>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label><strong>Password</strong></label>
                                                    <input type="password" class="form-control" name="password"
                                                        value="{{ old('password') }}" placeholder="Enter Your Password">
                                                    @error('password')
                                                        <small class="text-danger">{{ $message }}</small>
                                                    @enderror
                                                </div>
                                                <div class="form-row d-flex justify-content-between mt-4 mb-2">
                                                    <div class="form-group">
                                                        <div class="form-check ml-2">
                                                            <input class="form-check-input" type="checkbox"
                                                                id="basic_checkbox_1" name="remember">
                                                            <label class="form-check-label" for="basic_checkbox_1">Remember
                                                                me</label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <a href="{{ route('forget') }}">Forgot Password?</a>
                                                    </div>
                                                </div>
                                                <div class="text-center">
                                                    <button type="submit" class="btn btn-primary btn-block col-lg-6 mx-auto">Sign me
                                                        in</button>
                                                </div>
                                            </form>
                                            <div class="new-account mt-3">
                                                <p>Don't have an account? <a class="text-primary"
                                                        href="{{ route('users.create') }}">Sign up</a></p>
                                            </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
