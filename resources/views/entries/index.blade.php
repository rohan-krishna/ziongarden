@extends('master')

@section('content')

    <div class="container">
        <h1>Showing All Entries</h1>

        <p>
            <a href="{{ url('entries/create') }}" class="btn btn-success btn-waves">Create New Entry</a>
        </p>

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
                        <a href="{{ $entry->path() }}" style="text-transform: uppercase;">
                            {{ $entry->uid }}
                        </a>
                    </td>
                    <td style="text-transform: capitalize;">
                        {{ $entry->title }}
                    </td>
                    <td>
                        <a href="{{ route('entries.edit', ['entry' => $entry->id]) }}" class="btn btn-info">Edit</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        {{ $entries->links() }}
    </div>

@stop