<!DOCTYPE html>
<html class="dark" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    @livewireStyles
    <title>AWN</title>
</head>

<body class="bg-white dark:bg-gray-900">
    @yield('content')

    @livewireScripts
</body>

</html>
