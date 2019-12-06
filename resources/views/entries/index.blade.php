@extends('master')

@section('content')

    <div class="container">
        <h1>Showing All Entries</h1>


        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Entry UID</th>
                    <th>Entry Title</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($entries as $entry)
                <tr>
                    <td>
                        {{ $loop->index+1 }}
                    </td>
                    <td>
                        <a href="{{ $entry->path() }}">
                            {{ $entry->uid }}
                        </a>
                    </td>
                    <td>
                        {{ $entry->title }}
                    </td>
                    <td>
                        <a href="{{ url('entries/'. $entry->id.'/edit') }}" class="btn btn-info">Edit</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        {{ $entries->links() }}
    </div>

@stop