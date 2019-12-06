@extends('master')

@section('content')

    <div class="container">
        <h1 class="title">Edit - {{ $entry->title }}</h1>
        <h4>{{ $entry->uid }}</h4>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('entries.update') }}" method="POST" id="updateForm" enctype="multipart/form-data"> 
                            @csrf
                            <div class="form-group">
                                <label for="title">Title: </label>
                                <input type="text" name="title" placeholder="Enter Entry Title" required class="form-control" style="text-transform: capitalize;">
                            </div>

                            <div class="form-group">
                                <label for="uid">UID: </label>
                                <input type="text" name="uid" placeholder="Enter UID. Ex: PSJ-01" required class="form-control" style="text-transform: uppercase;">
                            </div>

                            <div class="form-group">
                                <label for="content">Content: </label>
                                <textarea name="content" class="form-control" placeholder="Please enter text content ..." rows="9"></textarea>
                            </div>

                            <div class="form-group">
                                <label for="files">Attach Images: </label>
                                <input type="file" multiple name="files[]" class="form-control" accept="image/png, image/png, image/gif">
                            </div>

                            <div class="form-group">
                                <button class="btn btn-success btn-waves">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
