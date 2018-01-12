@extends('layouts.app2')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12" id="app">
                <search-results></search-results>
            </div>
        </div>

        <div class="row">
            <div class="col-4" style="border:1px solid #efefef">{{print_r($categories->toArray())}} 2</div>
            <div class="col-4" style="border:1px solid #efefef">featured 3</div>
            <div class="col-4" style="border:1px solid #efefef">featured 4</div>
        </div>
    </div>




@endsection
