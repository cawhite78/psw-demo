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

    @if(isset($ds) && $ds == 1)
<script> var dsmysql = 1; </script>
@else
<script> var dsmysql = 0; </script>
@endif

</head>
<body>
<div id="app">
    <header class="mb-5">
        <div class="navbar navbar-dark bg-dark">
            <div class="container d-flex justify-content-between">
                <a href="/" class="navbar-brand">{{config('content.global.site_title')}}</a>
            </div>
        </div>
    </header>

    @yield('content')


</div>
@include('sections.footer')


<script src="{{ asset('js/app.js') }}"></script>

<script>
  $(function() {
    var selectedClass = "";
    $(".fil-cat").click(function(){
      selectedClass = $(this).attr("data-rel");
      $("#portfolio").fadeTo(100, 0.1);
      $("#portfolio div").not("."+selectedClass).fadeOut().removeClass('scale-anm');
      setTimeout(function() {
        $("."+selectedClass).fadeIn().addClass('scale-anm');
        $("#portfolio").fadeTo(300, 1);
      }, 300);

    });
  });
</script>
</body>
</html>