@extends('layouts.dashboard_layout')
@section('title', 'Add New blog')


@section('content')

    <div class="col-xl-12 ">
        <div class="auth-form">
            <h4 class="text-center mb-4">Add New Blog</h4>
            @include('components.alert_msg')
            <form action="{{ route('catagory.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <!-- Name -->
                <div class="form-group">
                    <label><strong>Blog Title</strong></label>
                    <input type="text" class="form-control" name="title" placeholder="Enter Blog Title"
                        value="{{ old('title') }}">
                    @error('title')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <!-- Email -->
                <div class="form-group">
                    <label><strong>Blog Slug</strong></label>
                    <input type="text" class="form-control" name="slug" placeholder="blog slug"
                        value="{{ old('slug') }}">
                    @error('slug')
                        <small class="text-danger">{{ $message }}<br></small>
                    @enderror
                    <small>Your password will send to this email, you have to use same
                        password while login !!</small>
                </div>

                <!-- Mobile Number -->
                <div class="form-group">
                    <label><strong>Blog Description</strong></label>
                    <input type="text" class="form-control" name="description" placeholder="Enter blog Description"
                        value="{{ old('description') }}">
                    @error('description')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>




                <div class="form-group">
                    <label><strong>Select Blog Categories</strong></label>

                    <div class="input-group mb-3 col-4 col-3">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <input type="checkbox" name="categories[]" value="Uncategoriesd"
                                    {{ in_array('Uncategoriesd', old('categories', [])) ? 'checked' : '' }}>
                            </div>
                        </div>
                        <input type="text" class="form-control" value="Uncategoriesd" readonly>
                    </div>

                    <div class="input-group mb-3 col-4 col-3">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <input type="checkbox" name="categories[]" value="Technology"
                                    {{ in_array('Technology', old('categories', [])) ? 'checked' : '' }}>
                            </div>
                        </div>
                        <input type="text" class="form-control" value="Technology" readonly>
                    </div>

                    <div class="input-group mb-3 col-4 col-3">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <input type="checkbox" name="categories[]" value="Health"
                                    {{ in_array('Health', old('categories', [])) ? 'checked' : '' }}>
                            </div>
                        </div>
                        <input type="text" class="form-control" value="Health" readonly>
                    </div>

                    <div class="input-group mb-3 col-4 col-3">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <input type="checkbox" name="categories[]" value="Travel"
                                    {{ in_array('Travel', old('categories', [])) ? 'checked' : '' }}>
                            </div>
                        </div>
                        <input type="text" class="form-control" value="Travel" readonly>
                    </div>

                    <div class="input-group mb-3 col-4 col-3">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <input type="checkbox" name="categories[]" value="Education"
                                    {{ in_array('Education', old('categories', [])) ? 'checked' : '' }}>
                            </div>
                        </div>
                        <input type="text" class="form-control" value="Education" readonly>
                    </div>

                    @error('categories')
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

                <!-- SEO Section -->
                <div class="form-group mt-4">
                    <h5><strong>SEO Settings</strong></h5>
                </div>

                <div class="form-group">
                    <label><strong>Meta Title</strong></label>
                    <input type="text" class="form-control" name="meta_title" placeholder="Enter meta title"
                        value="{{ old('meta_title') }}">
                    @error('meta_title')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label><strong>Meta Description</strong></label>
                    <textarea class="form-control" name="meta_description" placeholder="Enter meta description" rows="3">{{ old('meta_description') }}</textarea>
                    @error('meta_description')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label><strong>Meta Keywords</strong></label>
                    <input type="text" class="form-control" name="meta_keywords"
                        placeholder="Enter meta keywords (comma separated)" value="{{ old('meta_keywords') }}">
                    @error('meta_keywords')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label><strong>Meta Keyphrase</strong></label>
                    <input type="text" class="form-control" name="meta_keyphrase" placeholder="Enter meta keyphrase"
                        value="{{ old('meta_keyphrase') }}">
                    @error('meta_keyphrase')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>


                <div class="form-group">
                    <label><strong>Blog Status</strong></label><br>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="status" id="active" value="1"
                            checked>
                        <label class="form-check-label" for="active">Active</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="status" id="inactive" value="0">
                        <label class="form-check-label" for="inactive">Inactive</label>
                    </div>
                    @error('status')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <!-- Submit -->
                <div class="text-center mt-4">
                    <button type="submit" class="btn btn-primary btn-block mx-auto col-lg-6">Add blog</button>
                </div>
            </form>
        </div>
    </div>

@endsection
