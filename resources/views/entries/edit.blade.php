@extends('master')

@section('content')

    <div class="container">
        <h1 class="title">Edit - {{ $entry->title }}</h1>
        <h4>{{ $entry->uid }}</h4>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('entries.update',['entry' => $entry->id]) }}" method="POST" id="updateForm" enctype="multipart/form-data"> 
                            @csrf
                            <div class="form-group">
                                <label for="title">Title: </label>
                                <input type="text" value="{{ $entry->title }}" name="title" placeholder="Enter Entry Title" required class="form-control" style="text-transform: capitalize;">
                            </div>

                            <div class="form-group">
                                <label for="uid">UID: </label>
                                <input type="text" name="uid" value="{{ $entry->uid }}" placeholder="Enter UID. Ex: PSJ-01" required class="form-control" style="text-transform: uppercase;">
                            </div>

                            <div class="form-group">
                                <label for="content">Content: </label>
                                <textarea name="content" class="form-control" placeholder="Please enter text content ..." rows="9">{{ $entry->content }}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="additional_notes">Additional Notes: </label>
                                <textarea name="additional_notes" rows="9" class="form-control" placeholder="Additional Notes">{{ $entry->additional_notes }}</textarea>
                            </div>

                            @if($entry->getMedia()->count() > 0)
                            <div class="row">
                                <div class="col-md-12 mt-3">
                                    <div class="card">
                                        <div class="card-body">
                                            <h3>Attached Images: </h3>
                                            
                                            <div class="">
                                                @foreach($entry->getMedia() as $media)
                                                <div class="d-inline-block">
                                                    <a href="{{ $media->getUrl() }}" data-lightbox="{{ $entry->title }}" class="d-inline-block">
                                                        <img src="{{ $media->getUrl() }}" alt="" class="lightbox-gallery-img shadow mr-3">
                                                    </a>
                                                    <p>
                                                        <a href="#" class="mt-3 btn btn-danger deleteBtn" data-id="{{ $media->id }}">Delete</a>
                                                    </p>
                                                </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif

                            <input type="hidden" id="deletedMedia" name="deletedMedia">

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

@push('footerScripts')
<script>
    $(document).ready(function() {
        
        var deletedMediaIDs = [];
        
        $(".deleteBtn").click(function(e) {
            deletedMediaIDs.push($(this).data('id')); 
            $(this).parent().parent().remove();
        });

        $('#updateForm').submit(function(e) {
            e.preventDefault();

            $('#deletedMedia').val(JSON.stringify(deletedMediaIDs));

            e.target.submit();
        })
    })
</script>
@endpush