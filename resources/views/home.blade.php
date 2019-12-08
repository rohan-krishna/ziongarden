@extends('master')

@section('content')
<div class="container" id="swordfish">
    <div class="row justify-content-center py-3">
        <div class="col-md-12">

            @if (session('status'))
                <div class="alert alert-success" role="alert"> 
                    {{ session('status') }}
                </div>
            @endif

            {{-- <a href="#" class="btn btn-success btn-waves">Entries</a> --}}
            <form v-on:submit.prevent="submitQuery">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <select name="" id="" class="form-control form-control-lg" v-model="entry_type">
                            <option value="uid">UID</option>
                            <option value="title">Title</option>
                        </select>
                    </div>
                    <input type="text" class="form-control form-control-lg" placeholder="Please Enter Search Query ..."  v-model="search_query">
                    <div class="input-group-append">
                        <button class="btn btn-success" type="submit">Search</button>
                    </div>
                </div>
            </form>

            <div class="d-flex justify-content-center" v-if="loading">
                <img src="{{ asset('images/loading.gif') }}" alt="" draggable="false">
            </div>

            <div class="d-flex flex-row mt-3 justify-content-between" v-if="!loading">
                <div class="align-self-center">
                    <h4 class="text-muted">Showing Page: @{{ current_page }} of @{{ last_page }}</h4>
                    <h5 class="text-muted">Total @{{ total }} Results</h5>
                </div>
                <div>
                    <button @@click="prevPage()" class="btn btn-secondary btn-waves btn-lg">&larr; Prev Page</button>
                    <button @@click="nextPage()" class="btn btn-info btn-waves btn-lg">Next Page &rarr;</button>
                </div>
            </div>

            <div class="row row-cols-2" v-if="!loading">
                <div class="col" v-for="entry in entries">
                    <div class="card mt-3">
                        <div class="card-body">
                            <div class="d-flex py-3 justify-content-center">
                                <a :href="'/entries/' + entry.id"><h2 v-html="highlight(entry.uid)" style="text-transform: uppercase;"></h2></a>
                            </div>
                            <h5 class="card-title text-center" v-html="highlight(entry.title)" style="text-transform: capitalize;"></h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
