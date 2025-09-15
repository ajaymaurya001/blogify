@extends('layouts.dashboard_layout')
@section('title', 'All Blogs')


@section('content')

    <h2 class="heading text-center">All Blogs</h2>
    @include('components.alert_msg')

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

                    @if ($blog->status)
                        <p class="card-text d-inline text-success border border-success">Active</p>
                    @else
                        <p class="card-text d-inline text-danger border border-danger">Draft</p>
                    @endif



                    @if ($blog->image)
                        <div class="img-box card-img-top img-fluid"
                            style="background-image: url({{ asset('uploads/posts_img/' . $blog->image) }});"></div>
                    @else
                        <div class="img-box card-img-top img-fluid"
                            style="background-image: url({{ asset($defaultImage) }});"></div>
                    @endif


                    <div class="card-header">
                        <a href="{{ route('blog.show', $blog->id) }}">
                            <h5 class="card-title">{{ $blog->title }}</h5>
                        </a>
                    </div>
                    <div class="card-body">
                        {!! Str::limit(strip_tags($blog->content), 50) !!}

                    </div>
                    <div class="card-footer">
                        <a href="{{ route('blog.show', $blog->id) }}"
                            class="card-link border border-primary text-primary px-3 py-2 btn">View</a>
                        <a href="{{ route('blog.edit', $blog->id) }}"
                            class="card-link border border-warning text-warning px-3 py-2 btn">Edit</a>

                        <form action="{{ route('blog.destroy', $blog->id) }}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" class="card-link border border-danger text-danger px-3 py-2 btn"
                                onclick="return confirm('Are you sure you want to delete this Blog')">Delete</button>
                        </form>

                    </div>
                </div>
            </div>

        @empty
            <p>No blogs found in this category.</p>
        @endforelse

    </div>

@endsection
