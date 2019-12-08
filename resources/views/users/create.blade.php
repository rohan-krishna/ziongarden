@extends('master')

@section('content')
    
    <div class="container">
        <h1>Create New User</h1>

        <form action="{{ route('users.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Name: </label>
                <input type="text" name="name" class="form-control" placeholder="Enter User's Full Name" required style="text-transform: capitalize"> 
            </div>

            <div class="form-group">
                <label for="email">Email: </label>
                <input type="email" name="email" class="form-control" placeholder="Enter valid email" required>
            </div>

            <div class="form-group">
                <label for="password">Password: </label>
                <input type="password" name="password" class="form-control" placeholder="Enter valid password" required>
            </div>

            <div class="form-group">
                <label for="password_confirmation">Password Confirmation: </label>
                <input type="password" name="password_confirmation" placeholder="Confirm Password" class="form-control" required>
            </div>

            <div class="form-group">
                <button class="btn btn-success">Submit</button>
            </div>
        </form>
    </div>

@endsection