<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" id="csrf-token" content="{{ csrf_token() }}">
    <title>Answers First</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Lobster|Play" rel="stylesheet">

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body id="app-layout">
@unless(isset($no_nav))
    @include('layouts.partials.nav')
@endunless

@yield('content')

@unless(isset($no_footer))
    @include('layouts.partials.footer')
@endunless

<!-- JavaScripts -->
<script src="{{ asset('js/app.js') }}"></script>

</body>
</html>
