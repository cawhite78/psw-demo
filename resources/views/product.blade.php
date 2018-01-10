@extends('layouts.app2')
@section('content')

   @php
      $images = json_decode($data['images'],1);
   @endphp
   <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
      <div class="carousel-inner">
         @foreach($images as $image)

         <div class="carousel-item active">
            <img class="d-block w-100" src="{{$image}}" alt="First slide">
         </div>
         @endforeach
      </div>
      <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
         <span class="carousel-control-prev-icon" aria-hidden="true"></span>
         <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
         <span class="carousel-control-next-icon" aria-hidden="true"></span>
         <span class="sr-only">Next</span>
      </a>
   </div>
@endsection
