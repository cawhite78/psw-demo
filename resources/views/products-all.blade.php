@extends('layouts.product-layout')
@section('content')
    <div class="container" id="app">
        <div class="row">
            <div class="col-12" id="app">
                {{--<products-all></products-all>--}}

                <div class="toolbar mb2 mt2">
                    <button class="btn fil-cat" href="" data-rel="all">All</button>
                    @foreach($categories->toArray() as $category)
                        <button class="btn btn-sm btn-outline-primary fil-cat" data-rel="{{str_replace(' ', '-',$category['type'])}}">{{ucfirst($category['type'])}}</button>
                    @endforeach
                </div>

                <div style="clear:both;" class="m-5"></div>

                <div id="portfolio">
                    @foreach($featured->toArray() as $product)
                        <div style="border-bottom:1px solid #efefef;" class="row pb-3 mb-3 mt-3 tile scale-anm {{str_replace(' ', '-',$product['type'])}} all">
                            <table class="">
                                <tr>
                                    <td style="width:200px;"><img  style="width:80%; height:auto; float:left;" src="{{$product['primary_image']}}" alt="{{$product['name']}}" /></td>
                                    <td>
                                        <h3>{{$product['name']}}</h3>
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