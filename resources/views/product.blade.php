{{--
        Data structure
        [
            'product' => $product,
            'brand' =>$brand,
            'types' => $matchingType,
        ]
    --}}
@extends('layouts.main-layout')
@section('content')
    @php
        $images = json_decode($product['images'],1);
    @endphp
    <div class="container" id="app">
        <div class="row">
            <div class="col-lg-8 col-md-12">
                <h2>{{$product['name']}}</h2>

                <strong>Brand: {{$product['brand']}}</strong><br/>
                <span class="category-{{$product['type']}} product-category rounded-1"><a href="/products?type={{str_replace(' ','-', $product['type'])}}">{{$product['type']}}</a></span><br/>
                <p>{{$product['description']}}</p>

                <div class="row">
                    @if(count($types) > 0)
                        <div class="col-6">
                            <h4>Others viewed for type "{{$product['type']}}"</h4>
                            <hr/>
                            @foreach($types->shuffle() as $typeItem)
                                <div class="row mb-3">
                                    <div class="col-3">
                                        <img src="{{$typeItem['primary_image']}}" style="width:50px; height:auto"/>
                                    </div>
                                    <div class="col-9">
                                        {{$typeItem['name']}}
                                        <div class="text-right"><a href="/product/{{$typeItem['id']}}">view item</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif

                    @if(count($brand) > 0)
                        <div class="col-6">
                            <h4>Other products by {{$product['brand']}}</h4>
                            <hr/>
                            @foreach($brand as $brandItem)
                                <div class="row mb-3">
                                    <div class="col-3">
                                        <img src="{{$brandItem['primary_image']}}" style="width:50px; height:auto"/>
                                    </div>
                                    <div class="col-9">
                                        {{$brandItem['name']}}
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>

            </div>
            <div class="col-lg-4 col-md-12">
                <div class="tab-content" id="pills-tabContent">
                    @for ($i = 0; $i < count($images); $i++)
                        <div @if($i == 0) class="tab-pane fade show active" @else class="tab-pane fade"
                             @endif id="pills-{{$i}}" role="tabpanel"
                             aria-labelledby="pills-{{$i}}-tab">
                            <img src="{{$images[$i]}}" style="width:320px; height:auto"/>
                        </div>
                    @endfor
                </div>
                <ul class="nav nav-pills mt-3" id="pills-tab" role="tablist">
                    @for ($i = 0; $i < count($images); $i++)
                        <li class="nav-item">
                            <a @if($i == 0) class="nav-link active" @else class="nav-link" @endif id="pills-{{$i}}-tab"
                               data-toggle="pill" href="#pills-{{$i}}" role="tab"
                               aria-controls="pills-{{$i}}" @if($i == 0) aria-selected="true" @endif>
                                <img src="{{$images[$i]}}" style="width:65px; height:auto"/>

                            </a>
                        </li>
                    @endfor
                </ul>

            </div>
        </div>

    </div>



@endsection

