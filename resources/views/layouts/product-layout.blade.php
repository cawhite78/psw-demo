<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>ACME Pool Supply</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    {{--<script>--}}
    {{--@if($brand == 0)  var brand = 0; @else var brand = "{{$brand}}"; @endif--}}

    {{--@if($type !== false) var type = 0;  @else var type = "{{$type}}"; @endif--}}

    {{--</script>--}}
</head>
<body>
<div>
    <header class="mb-5">
        <div class="navbar navbar-dark bg-dark">
            <div class="container d-flex justify-content-between">
                <a href="/" class="navbar-brand">{{config('content.global.site_title')}}</a>
            </div>
        </div>
    </header>

    @yield('content')
</div>

<script src="{{ asset('js/app.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/fingerprintjs2@1/dist/fingerprint2.min.js"></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

<script>

  $(function() {
    var fromParam = $("#button-{{$productParam}}");
    var fromParamSelected = fromParam.attr("data-rel");
    $("#portfolio div").not("."+fromParamSelected).fadeOut().removeClass('scale-anm');
    fromParam.addClass('active');


    var selectedClass = "";
    $(".fil-cat").click(function(){
      selectedClass = $(this).attr("data-rel");
      $("#portfolio").fadeTo(100, 0.1);
      $("#portfolio div").not("."+selectedClass).fadeOut().removeClass('scale-anm');
      $("#button-{{$productParam}}").removeClass('active');

      setTimeout(function() {
        $("."+selectedClass).fadeIn().addClass('scale-anm');
        $("#portfolio").fadeTo(300, 1);

        $(".toolbar button").on('click', function(){

          $(this).siblings().removeClass('active');
          $(this).addClass('active');
        })

      }, 300);

    });
  });

</script>
</body>
</html>