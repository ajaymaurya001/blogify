@extends('layouts.dashboard_layout')
@section('title', 'All Blogs')


@section('content')

    <h2 class="heading text-center">All Blogs</h2>

    <div class="catagory-list mb-3">
        {{-- All Category Button --}}
        <a href="{{ route('blog.index') }}" class="btn m-1 border {{ request('category') ? '' : 'border-primary active' }}">
            All Category
        </a>

        {{-- Dynamic Category Buttons --}}
        @foreach ($categories as $category)
            <a href="{{ route('blog.index', ['category' => $category->id]) }}"
                class="btn m-1 border {{ request('category') == $category->id ? 'border-primary active' : '' }}">
                {{ $category->title }}
            </a>
        @endforeach

    </div>


    <div class="row all-blogs">

        @forelse($blogs as $blog)
            <div class="col-xl-4 col-xxl-6 col-lg-6 col-sm-6">
                <div class="card mb-3">
                    <div class="img-box card-img-top img-fluid" style="background-image: url({{ $defaultImage }});"></div>
                    <div class="card-header">
                        <a href="{{ route('blog.show', $blog->id) }}">
                            <h5 class="card-title">{{ $blog->title }}</h5>
                        </a>
                    </div>
                    <div class="card-body">
                        {!! Str::limit(strip_tags($blog->content), 250) !!}

                    </div>
                    <div class="card-footer">
                        <p class="card-text d-inline">{{ $blog->status }}</p>
                        <a href="{{ route('blog.show', $blog->id) }}" class="card-link float-right">View Blog</a>
                    </div>
                </div>
            </div>

        @empty
            <p>No blogs found in this category.</p>
        @endforelse

    </div>

@endsection
