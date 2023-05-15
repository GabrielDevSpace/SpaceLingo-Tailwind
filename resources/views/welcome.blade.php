<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel + VITE + Tailwind</title>

        @vite('resources/js/app.js')
    </head>

    <body class="antialiased">
        <div class="flex justify-center items-center h-screen">
            <h1 class="text-3xl text-purple-800 font-bold">Laravel + VITE + Tailwind</h1>
        </div>
    </body>

</html>