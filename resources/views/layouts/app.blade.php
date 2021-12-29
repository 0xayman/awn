<!DOCTYPE html>
<html class="dark" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @livewireStyles
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <title>AWN</title>

    <style>
        [x-cloak] {
            display: none;
        }

    </style>

    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>

<body class="bg-white dark:bg-gray-900">

    @livewire('navbar')

    {{ $slot }}


    <script src="{{ mix('js/app.js') }}"></script>

    @livewireScripts


</body>

</html>
