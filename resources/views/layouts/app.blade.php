<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- styles -->
    <link rel="stylesheet" href='{{ asset('css/app.css') }}'>

    <!-- alpinejs -->
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>

    <livewire:styles />

    <title>Lara games</title>
</head>
<body class="text-white bg-gray-900">
    {{ $slot }}

    <livewire:scripts />
    <script src="/js/app.js" type="application/javascript"></script>
    @stack('scripts')
</body>
</html>
