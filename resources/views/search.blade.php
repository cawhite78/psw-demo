@extends('layouts.app2')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12" id="app">
                <search-results></search-results>
            </div>
        </div>
    </div>

    <div class="container content-area">
        <div class="row">
            <div class="col-4" style="border:1px solid #efefef">{{print_r($featured->toArray())}}
            </div>
            <div class="col-4" style="border:1px solid #efefef">{{print_r($brands->toArray())}}</div>
            <div class="col-4" style="border:1px solid #efefef">{{print_r($categories->toArray())}}</div>
        </div>
    </div>

@endsection
