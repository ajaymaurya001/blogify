@extends('layouts.dashboard_layout')
@section('title', 'All Category')


@section('content')


    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Basic Datatable</h4>

            @include('components.alert_msg')
            <a href="{{ route('catagory.create') }}" class="btn btn-primary">Add New Category</a>
        </div>
        <div class="card-body pt-0">
            <div class="table-responsive">
                <table id="example" class="display" style="min-width: 845px">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Cat Title</th>
                            <th>Slug</th>
                            <th>Description</th>
                            <th>Image</th>
                            <th>Status</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>


                        @foreach ($catagory as $cat)
                            @if ($cat->id !== auth()->id())
                                <tr>
                                    <td>{{ $cat->id }}</td>
                                    <td>{{ $cat->title }}</td>
                                    <td>{{ $cat->slug }}</td>
                                    <td>{{ $cat->description }}</td>


                                    @php
                                        $imagePath = public_path('uploads/categories/' . $cat->image);
                                        if (!empty($cat->image) && file_exists($imagePath)) {
                                            $img_url = asset('uploads/categories/' . $cat->image);
                                        } else {
                                            $img_url = asset('uploads/categories/default.png');
                                        }
                                    @endphp
                                    <td> <img src="{{ $img_url }}" alt="cat-img" width="50px" height="50px"></td>


                                    <td>{{ $cat->status }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('catagory.edit', $cat->id) }}"
                                            class="btn btn-warning btn-sm mx-2">Edit</a>

                                        <form action="{{ route('catagory.destroy', $cat->id) }}" method="POST"
                                            class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm"
                                                onclick="return confirm('Are you sure you want to delete this cat?')">
                                                Delete
                                            </button>
                                        </form>

                                    </td>
                                </tr>
                            @endif
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
