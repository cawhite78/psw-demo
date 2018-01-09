@extends('layouts.app')

@section('content')
    <div class="container">
        {{--<template>--}}
            <ais-index
                    app-id="951KFANIRT"
                    api-key="435d160a01400128fb8c43509bc6179e"
                    index-name="psw_demo_products"
            >
                <ais-search-box></ais-search-box>
                <ais-results class="row">
                    <template slot-scope="{ result }">

                        <div class="col-12 col-md-4 mb-4 mt-4">
                            <div class="card">
                                <img class="card-img-top" src="..." alt="Card image cap">
                                <div class="card-body">
                                    <h5 class="card-title">@{{ result.name }}</h5>
                                    <p class="card-text">
                                        @{{ result.media }}
                                    </p>
                                    <a href="#" class="btn btn-primary">Go somewhere</a>
                                </div>
                            </div>
                        </div>


                    </template>
                </ais-results>
            </ais-index>
        {{--</template>--}}
    </div>
@endsection
