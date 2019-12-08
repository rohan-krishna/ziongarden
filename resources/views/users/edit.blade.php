@extends('master')

@section('content')
    
    <div class="container">
        <h3>Edit User - {{ $user->email }}</h3>

        <form action="{{ route('users.update', ['user' => $user->id]) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Name: </label>
                <input type="text" value="{{ $user->name }}" name="name" class="form-control" placeholder="Enter User's Full Name" required style="text-transform: capitalize"> 
            </div>

            <div class="form-group">
                <label for="email">Email: </label>
                <input type="email" class="form-control" placeholder="Enter valid email" required value="{{ $user->email }}" disabled>
            </div>

            <div class="form-group">
                <label for="password">Password: </label>
                <input type="password" name="password" class="form-control" placeholder="Enter valid password">
            </div>

            <div class="form-group">
                <label for="password_confirmation">Password Confirmation: </label>
                <input type="password" name="password_confirmation" placeholder="Confirm Password" class="form-control">
            </div>

            <div class="form-group">
                <button class="btn btn-success">Submit</button>
            </div>
        </form>
    </div>

@endsection