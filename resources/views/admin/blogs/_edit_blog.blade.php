@extends('layouts.dashboard_layout')
@section('title', 'Edit blog')


@section('content')

    <div class="col-xl-12 ">
        <div class="auth-form">
            <h4 class="text-center mb-4">Edit Blog </h4>

            @include('components.alert_msg')
            <form action="{{ route('blog.update', $blog->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <!-- Name -->
                <div class="form-group">
                    <label><strong>Blog Title</strong></label>
                    <input type="text" class="form-control" name="title" placeholder="Enter Blog Title"
                        value="{{ old('title', $blog->title) }}">
                    @error('title')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <!-- Email -->
                <div class="form-group">
                    <label><strong>Blog Slug</strong></label>
                    <input type="text" class="form-control" name="slug" placeholder="blog slug"
                        value="{{ old('slug', $blog->slug) }}">
                    @error('slug')
                        <small class="text-danger">{{ $message }}<br></small>
                    @enderror
                    <small>Your password will send to this email, you have to use same
                        password while login !!</small>
                </div>

                <!-- discription -->
                <div class="form-group">
                    <label><strong>Blog Description</strong></label>
                    <textarea class="form-control" name="description" id="description" rows="20" placeholder="Enter blog description">{{ old('description', $blog->content) }}</textarea>
                    @error('description')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>



                <div class="form-group">
                    <label><strong>Select Blog Category</strong></label>

                    <select name="catagory_id" class="form-control">
                        {{-- Default Option --}}
                        <option value="">-- Select Category --</option>

                        {{-- Loop categories --}}
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}"
                                {{ old('catagory_id', $blog->catagory_id) == $category->id ? 'selected' : '' }}>
                                {{ $category->title }}
                            </option>
                        @endforeach
                    </select>
                    @error('catagory_id')
                        <small class="text-danger d-block">{{ $message }}</small>
                    @enderror
                </div>


                {{-- cat image  --}}
                <div class="form-group">
                    <label><strong>Blog Image</strong></label>
                    <input type="file" class="form-control" name="image" accept="image/*">
                    @error('image')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>


                <div class="form-group">
                    <label><strong>Below is the Current Blog Image</strong></label><br>
                    @php
                        $imagePath = public_path('uploads/posts_img/' . $blog->image);
                        if (!empty($blog->image) && file_exists($imagePath)) {
                            $img_url = asset('uploads/posts_img/' . $blog->image);
                        } else {
                            $img_url = asset('uploads/categories/default.png');
                        }
                    @endphp
                    <img src="{{ $img_url }}" alt="cat-img" width="200px" height="200px">
                </div>

                <!-- SEO Section -->
                <div class="form-group mt-4">
                    <h5><strong>SEO Settings</strong></h5>
                </div>

                <div class="form-group">
                    <label><strong>Meta Title</strong></label>
                    <input type="text" class="form-control" name="meta_title" placeholder="Enter meta title"
                        value="{{ old('meta_title', $blog->meta_title) }}">
                    @error('meta_title')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label><strong>Meta Description</strong></label>
                    <textarea class="form-control" name="meta_description" placeholder="Enter meta description" rows="3">{{ old('meta_description', $blog->meta_description) }}</textarea>
                    @error('meta_description')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label><strong>Meta Keywords</strong></label>
                    <input type="text" class="form-control" name="meta_keywords"
                        placeholder="Enter meta keywords (comma separated)"
                        value="{{ old('meta_keywords', $blog->meta_keywords) }}">
                    @error('meta_keywords')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label><strong>Meta Keyphrase</strong></label>
                    <input type="text" class="form-control" name="meta_keyphrase" placeholder="Enter meta keyphrase"
                        value="{{ old('meta_keyphrase', $blog->meta_keyphrase) }}">
                    @error('meta_keyphrase')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label><strong>Blog Status</strong></label><br>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="status" id="active" value="1"
                            {{ $blog->status == 1 ? 'checked' : '' }}>
                        <label class="form-check-label" for="active">Active</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="status" id="inactive" value="0"
                            {{ $blog->status == 0 ? 'checked' : '' }}>
                        <label class="form-check-label" for="inactive">Inactive</label>
                    </div>
                    @error('status')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <!-- Submit -->
                <div class="text-center mt-4">
                    <button type="submit" class="btn btn-primary btn-block mx-auto col-lg-6">Save Changes</button>
                </div>
            </form>
        </div>
    </div>

@endsection
