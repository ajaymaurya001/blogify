@extends('layouts.dashboard_layout')
@section('title', 'All Blogs')


@section('content')

    <h2 class="heading text-center">All Blogs</h2>
    <div class="row all-blogs">
        <div class="col-xl-4 col-xxl-6 col-lg-6 col-sm-6">
            <div class="card mb-3">
                <div class="img-box card-img-top img-fluid" style="background-image: url({{ $defaultImage }});"></div>
                <div class="card-header">
                    <a href="#"><h5 class="card-title">Card title</h5></a>
                </div>
                <div class="card-body">
                    <p class="card-text">He lay on his armour-like back, and if he lifted his head a little
                    </p>
                </div>
                <div class="card-footer">
                    <p class="card-text d-inline">Card footer</p>
                    <a href="{{ route('blog.show',1) }}" class="card-link float-right">View Blog</a>
                </div>
            </div>
        </div>

        <div class="col-xl-4 col-xxl-6 col-lg-6 col-sm-6">
            <div class="card mb-3">
                <div class="img-box card-img-top img-fluid" style="background-image: url({{ $defaultImage }});"></div>
                <div class="card-header">
                    <a href="#"><h5 class="card-title">Card title</h5></a>
                </div>
                <div class="card-body">
                    <p class="card-text">He lay on his armour-like back, and if he lifted his head a little
                    </p>
                </div>
                <div class="card-footer">
                    <p class="card-text d-inline">Card footer</p>
                    <a href="{{ route('blog.show',1) }}" class="card-link float-right">View Blog</a>
                </div>
            </div>
        </div>

        <div class="col-xl-4 col-xxl-6 col-lg-6 col-sm-6">
            <div class="card mb-3">
                <div class="img-box card-img-top img-fluid" style="background-image: url({{ $defaultImage }});"></div>
                <div class="card-header">
                    <a href="#"><h5 class="card-title">Card title</h5></a>
                </div>
                <div class="card-body">
                    <p class="card-text">He lay on his armour-like back, and if he lifted his head a little
                    </p>
                </div>
                <div class="card-footer">
                    <p class="card-text d-inline">Card footer</p>
                    <a href="{{ route('blog.show',1) }}" class="card-link float-right">View Blog</a>
                </div>
            </div>
        </div>

        <div class="col-xl-4 col-xxl-6 col-lg-6 col-sm-6">
            <div class="card mb-3">
                <div class="img-box card-img-top img-fluid" style="background-image: url({{ $defaultImage }});"></div>
                <div class="card-header">
                    <a href="#"><h5 class="card-title">Card title</h5></a>
                </div>
                <div class="card-body">
                    <p class="card-text">He lay on his armour-like back, and if he lifted his head a little
                    </p>
                </div>
                <div class="card-footer">
                    <p class="card-text d-inline">Card footer</p>
                    <a href="{{ route('blog.show',1) }}" class="card-link float-right">View Blog</a>
                </div>
            </div>
        </div>

        <div class="col-xl-4 col-xxl-6 col-lg-6 col-sm-6">
            <div class="card mb-3">
                <div class="img-box card-img-top img-fluid" style="background-image: url({{ $defaultImage }});"></div>
                <div class="card-header">
                    <a href="#"><h5 class="card-title">Card title</h5></a>
                </div>
                <div class="card-body">
                    <p class="card-text">He lay on his armour-like back, and if he lifted his head a little
                    </p>
                </div>
                <div class="card-footer">
                    <p class="card-text d-inline">Card footer</p>
                    <a href="{{ route('blog.show',1) }}" class="card-link float-right">View Blog</a>
                </div>
            </div>
        </div>



    </div>

@endsection
