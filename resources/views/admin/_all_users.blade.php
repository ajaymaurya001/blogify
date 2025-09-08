@extends('layouts.dashboard_layout')
@section('title', 'All Users')


@section('content')


    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Basic Datatable</h4>

            @include('components.alert_msg')
            <a href="{{ route('admin.add_user') }}" class="btn btn-primary">Add New User</a>
        </div>
        <div class="card-body pt-0">
            <div class="table-responsive">
                <table id="example" class="display" style="min-width: 845px">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Mobile</th>
                            <th>DOB</th>
                            <th>Gender</th>
                            <th>Bio</th>
                            <th>Status</th>
                            <th>Role</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>


                        @foreach ($users as $user)
                            @if ($user->id !== auth()->id())
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->mobile }}</td>
                                    <td>{{ $user->dob->format('d F Y') }}</td>
                                    <td>{{ $user->gender }}</td>
                                    <td>{{ $user->bio }}</td>
                                    <td>
                                        @if ($user->is_admin)
                                            <span class="text-success">ADMIN</span>
                                        @else
                                            <span>USER</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($user->is_active)
                                            <span class="text-warning">Active</span>
                                        @else
                                            <span class="text-danger">Inactive</span>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <a href="{{ route('users.show', $user->id) }}"
                                            class="btn btn-primary btn-sm">View</a>
                                        <a href="{{ route('users.edit', $user->id) }}"
                                            class="btn btn-warning btn-sm mx-2">Edit</a>

                                        <form action="{{ route('users.destroy', $user->id) }}" method="POST"
                                            class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm"
                                                onclick="return confirm('Are you sure you want to delete this user?')">
                                                Delete
                                            </button>
                                        </form>

                                    </td>

                                </tr>
                            @endif
                        @endforeach

                    </tbody>
                    {{-- <tfoot>
                                        <tr>
                                            <th>Name</th>
                                            <th>Position</th>
                                            <th>Office</th>
                                            <th>Age</th>
                                            <th>Start date</th>
                                            <th>Salary</th>
                                        </tr>
                                    </tfoot> --}}
                </table>
            </div>
        </div>
    </div>

@endsection
