<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title>@yield('title')</title>

    @yield('cdns')
</head>
<body>
    @include('includes.header')

    <section id="@yield('section-id')">
        @yield('content')
    </section>

    @yield('scripts')
</body>
</html>