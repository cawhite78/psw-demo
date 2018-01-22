@extends('layouts.product-layout')
@section('content')
    <div class="container" id="app">
        <div class="row mb-3">
            <div class="col-12">
                <nav class="breadcrumb">
                    <a class="breadcrumb-item" href="/"><img src="/images/psw-home.png"/></a>
                    <a class="breadcrumb-item" href="/products">products</a>
                    <span class="breadcrumb-item active" id="current-category"></span>

                </nav>
            </div>
        </div>

        <div class="row">
            <div class="col-12" id="app">
                <user-fingerprint></user-fingerprint>

                <div class="toolbar mb2 mt2">
                    <button data-category="all" id="button-all" class="btn btn-sm btn-outline-primary fil-cat" data-rel="all">All</button>
                    @foreach($categories->toArray() as $category)
                        <button data-category="{{$category['type']}}"id="button-{{str_replace(' ', '-',$category['type'])}}" class="btn btn-sm btn-outline-primary fil-cat" data-rel="{{str_replace(' ', '-',$category['type'])}}">{{ucfirst($category['type'])}}s</button>
                    @endforeach
                </div>

                <div style="clear:both;" class="m-5"></div>

                <div id="portfolio">
                    @foreach($featured->toArray() as $product)
                        <div style="border-bottom:1px solid #efefef;" class="row pb-3 mb-3 mt-3 tile scale-anm {{str_replace(' ', '-',$product['type'])}} all">
                            <table class="">
                                <tr>
                                    <td style="width:200px; text-align: center;">
                                        <img  style="width:80%; height:auto; float:left;" src="{{$product['primary_image']}}" alt="{{$product['name']}}" />
                                        <img src="/images/brands/{{str_replace(' ','-',$product['brand'])}}.jpg" style="margin:15px auto; width:75px; height:auto;"/>
                                    </td>
                                    <td>
                                        <h3>{{$product['name']}}</h3>
                                        {{--<span class="category-{{$product['type']}} product-category rounded-1">{{$product['type']}}</span><br/>--}}
                                        {{truncateContent($product['description'],100,'.')}}  <a class="product-button"
                                                                                                    href="/product/{{$product['id']}}">Read
                                                    more</a>

                                        <p><a class="product-button"
                                           href="/product/{{$product['id']}}"><button type="button" class="btn btn-outline-primary btn-sm float-right">View
                                                product</button></a></p>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    @endforeach
                </div>
                <div style="clear:both;"></div>
            </div>
        </div>
    </div>

@endsection