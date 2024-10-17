<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ config('app.name') }}</title>

    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">

    <link rel="stylesheet" href="{{ asset('vendor/inter/4.0/inter.min.css') }}">

    @livewireStyles
    @vite(['resources/scss/index.scss', 'resources/js/index.js'])
    {{--  --}}
</head>

<body>
    {{ $slot }}

    {{--  --}}
    @livewireScriptConfig
</body>

</html>
