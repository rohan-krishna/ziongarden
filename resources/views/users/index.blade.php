@extends('master')

@section('content')

<div class="container">
    <h1>Showing All Users</h1>

    <p>
        <a href="{{ url('users/create') }}" class="btn btn-success">Create User</a>
    </p>

    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr>
                    <td>{{ $loop->index+1 }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        <a href="{{ $user->editRoute() }}" class="btn btn-secondary btn-waves">Edit</a>

                        @role('Administrator')
                        <a href="{{ $user->deleteRoute() }}" class="btn btn-danger btn-waves">Delete</a>
                        @endrole
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
    
@endsection