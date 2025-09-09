@extends('layouts.dashboard_layout')
@section('title', 'Add New Category')


@section('content')

    <div class="col-xl-12 ">
        <div class="auth-form">
            <h4 class="text-center mb-4">Add New Category</h4>
            @include('components.alert_msg')
            <form action="{{ route('catagory.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <!-- Name -->
                <div class="form-group">
                    <label><strong>Title</strong></label>
                    <input type="text" class="form-control" name="title" placeholder="Enter Category Title"
                        value="{{ old('title') }}">
                    @error('title')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <!-- Email -->
                <div class="form-group">
                    <label><strong>Slug</strong></label>
                    <input type="text" class="form-control" name="slug" placeholder="Category slug"
                        value="{{ old('slug') }}">
                    @error('slug')
                        <small class="text-danger">{{ $message }}<br></small>
                    @enderror
                    <small>Your password will send to this email, you have to use same
                        password while login !!</small>
                </div>

                <!-- Mobile Number -->
                <div class="form-group">
                    <label><strong>Description</strong></label>
                    <input type="text" class="form-control" name="description" placeholder="Enter Category Description"
                        value="{{ old('description') }}">
                    @error('description')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                {{-- cat image  --}}
                <div class="form-group">
                    <label><strong>Category Image</strong></label>
                    <input type="file" class="form-control" name="image" accept="image/*">
                    @error('image')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label><strong>Category Status</strong></label><br>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="status" id="active" value="1" checked>
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
                    <button type="submit" class="btn btn-primary btn-block mx-auto col-lg-6">Add Category</button>
                </div>
            </form>
        </div>
    </div>

@endsection
