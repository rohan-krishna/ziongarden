@extends('master')

@section('content')
<div class="container">
    <div class="row justify-content-center py-3">
        <div class="col-md-12">

            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            {{-- <a href="#" class="btn btn-success btn-waves">Entries</a> --}}
            
            <div class="input-group mb-3 input-group-lg">
                <div class="input-group-prepend">
                    <select name="" id="" class="form-control form-control-lg">
                        <option value="">UID</option>
                        <option value="">Title</option>
                    </select>
                </div>
                <input type="text" class="form-control" aria-label="Text input with dropdown button" placeholder="Please enter search term ...">
                <button class="btn btn-success btn-waves">Search</button>
            </div>


            <div class="row row-cols-2">
                @foreach(\App\Entry::all() as $entry)
                <div class="col">
                    <div class="card mt-3">
                        <div class="card-body">
                            <div class="d-flex py-3 justify-content-center">
                                <h2 class="">{{ $entry->uid }}</h2>
                            </div>
                            <h5 class="card-title text-center">{{ $entry->title }}</h5>
                            <p class="card-text text-center"><small class="text-muted">Last updated 3 mins ago</small></p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            {{-- <div id="swordfish">
                <my-search />
            </div> --}}
        </div>
    </div>
</div>
@endsection
