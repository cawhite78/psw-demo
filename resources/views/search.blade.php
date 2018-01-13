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
            <div class="col-12 col-md-8 col-lg-8">


                <div class="home-featured p-4">
                    <h3>Featured Products</h3>
                    <div class="mb-4 mt-4">
                    @foreach($featured as $product)
                        <h4>{{$product['name']}}</h4>
                        <div class="row mb-5">
                            <div class="col-2">
                                <img src="{{$product['primary_image']}}" width="100%"/>
                            </div>
                            <div class="col-10">
                                <p>{{truncateContent($product['description'] ,100, '.', ' ...')}}</p>
                            </div>
                        </div>
                    @endforeach
                    </div>
                </div>

            </div>

            <div class="col-12 col-md-4 col-lg-4">
                <div class="row">
                    <div class="col-12">
                        <div class="home-brands p-4">
                            <h3>Popular Brands</h3>

                            <div class="row">
                            @foreach($brands->toArray() as $brand)

                                    <div class="col-4 mt-3 mt-2" style="text-align: center;">
                                        <h6>{{$brand['brand']}}</h6>
                                        <img src="{{getBrandLogo($brand['brand'])}}" style="width:100%; height:auto;"/>
                                    </div>
                            @endforeach
                            </div>

                        </div>

                        <div class="home-categories p-4">
                            <h3>Product Categories</h3>
                            <div class="row">


                            @foreach($categories->toArray() as $category)

                                    <div class="col-4 mt-3 mt-2" style="text-align: center;">
                                        <button type="button" class="btn btn-outline-primary">{{$category['type']}}</button>
                                    </div>
                                @endforeach
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection
