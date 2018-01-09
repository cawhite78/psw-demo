<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
<script>

  $('input#input_box').keypress(function(){ //letter has been pressed
    var search = $(this).val();
    $.ajax({
      url : '/api/search', //the php page that will handle the request
      type : 'GET', //the method of sending the data
      data: 'q='+search, //the data you are sending
      success : function(data){
        //the variable 'data' will be whatever the php outputs (via
        //any method - echo, exit, print, print_r etc. you can
        //use data from php page to output wherever you want, e.g.
        $('div#search_autosuggestbox').html(data);
      }
    });
  });
</script>
</body>
</html>
