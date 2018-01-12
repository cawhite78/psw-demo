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

    @if(isset($ds) && $ds == 1)
<script> var dsmysql = 1; </script>
@else
<script> var dsmysql = 0; </script>
@endif

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
<script>


//  let fp = '';
//  new Fingerprint2().get(function(result, components){
////    fp = result; //a hash, representing your device fingerprint
//  });
</script>
</body>
</html>