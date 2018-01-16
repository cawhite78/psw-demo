@extends('layouts.main-layout')

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
                    <div class="row">
                        <div class="col-6"><h3>Featured Products</h3></div>
                        <div class="col-6 text-right pt-2"><a href="/products?type=all">View All Products</a></div>
                    </div>
                    <div class="mb-4 mt-4" >
                        @php
                            $i = 0;
                        @endphp
                    @foreach($featured->shuffle() as $product)
                        @php
                            if($i > 2) {
                                continue;
                            }
                        @endphp
                        <div class="row mb-5 pb-3" style="border-bottom:1px solid #efefef;">
                            <div class="col-2">
                                <img src="{{$product['primary_image']}}" width="100%"/>
                            </div>
                            <div class="col-10">
                                <h4>{{$product['name']}}</h4>
                                <span class="category-{{$product['type']}} product-category rounded-1">{{$product['type']}}</span><br/>
                                <p>{{truncateContent($product['description'] ,100, '.', ' ...')}}</p>
                                <a class="product-button"
                                   href="/product/{{$product['id']}}"><button type="button" class="btn btn-outline-primary btn-sm float-right">View
                                        product</button></a>
                            </div>
                        </div>
                        @php
                        $i++
                        @endphp

                    @endforeach
                    </div>
                </div>

            </div>

            <div class="col-12 col-md-4 col-lg-4">
                <div class="row">
                    <div class="col-12">
                        <div class="home-categories p-4">
                            <h3>Product Categories</h3>
                            <div class="row">


                                @foreach($categories->toArray() as $category)

                                    <div class="col-4 mt-3 mt-2" style="text-align: center;">
                                        <button type="button" class="btn btn-sm btn-outline-primary fil-cat"><a href="/products?type={{str_replace(' ','-',$category['type'])}}">{{$category['type']}}</a></button>
                                    </div>
                                @endforeach
                            </div>

                        </div>

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


                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection
