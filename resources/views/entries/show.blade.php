@extends('master')

@section('content')

    <div class="container">
        <h1 class="title">{{ $entry->title }}</h1>
        <h4 class="text-muted">{{ $entry->uid }}</h4>


        <div class="row">
            <div class="col-sm-12 mt-3">
                <div class="card">
                    <div class="card-body">
                        <h3>Content: </h3>
                        {{ $entry->content }}
                    </div>
                </div>
            </div>

            <div class="col-sm-12 mt-3">
                <div class="card">
                    <div class="card-body">
                        <h3>Additional Notes: </h3>
                        {{ $entry->additional_notes }}
                    </div>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-md-12 mt-3">

            </div>
        </div>

        <div class="row">
            <div class="col-md-12 mt-3 text-center">
                <div class="card">
                    <div class="card-body">
                        <a href="" class="btn btn-info">Edit</a>
                        <a href="" class="btn btn-danger">Delete</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop