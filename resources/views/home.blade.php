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
                    <div class="input-group mb-3">
                        <select name="" id="" class="form-control form-control-lg" v-model="entry_type">
                            <option value="uid">UID</option>
                            <option value="title">Title</option>
                        </select>
                        <input type="text" class="form-control form-control-lg" placeholder="Please Enter Search Query ..."  v-model="search_query">
                        <div class="input-group-append">
                            <button class="btn btn-success" type="submit">Search</button>
                        </div>
                    </div>
                </div>
            </form>

            <div class="d-flex justify-content-center" v-if="loading">
                <img src="{{ asset('images/loading.gif') }}" alt="" draggable="false">
            </div>

            <div class="row row-cols-2" v-if="!loading">
                <div class="col" v-for="entry in entries">
                    <div class="card mt-3" >
                        <div class="card-body">
                            <div class="d-flex py-3 justify-content-center">
                                <h2 class="" v-html="highlight(entry.uid)"></h2>
                            </div>
                            <h5 class="card-title text-center" v-html="highlight(entry.title)"></h5>
                            <p class="card-text text-center"><small class="text-muted">Last updated 3 mins ago</small></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
