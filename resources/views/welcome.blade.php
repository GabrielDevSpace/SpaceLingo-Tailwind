<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel + VITE + Tailwind</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>

    <body class="antialiased">
        <div class="flex justify-center items-center h-screen">
            <h1 class="text-3xl text-purple-800 font-bold">Laravel + VITE + Tailwind</h1>
        </div>
    </body>

</html>