<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SpaceLingo</title>
    <meta name="description" content="">
    <meta name="keywords" content="">

    <!-- Font Awesome if you need it
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
	-->
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.png') }}">
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <!-- Animation CSS-->
  
</head>

<body class="leading-normal tracking-normal text-gray-900" style="font-family: 'Source Sans Pro', sans-serif;">
    <div class="w-full mx-auto sm:px-6 lg:px-8" style="background-image:url('bg.svg');">
        <!--Nav-->
        <div class="w-full container mx-auto p-4">
            <div class="w-full flex items-center justify-between">
                <a href="/">
                    <img src="{{ asset('/images/logospacelingo300.png') }}" width='170px' />
                </a>
                <div class="flex w-1/2 justify-end content-center">
                    <!--  <a href="/login">
                        <button class="bg-purple-700 hover:bg-purple-900 text-white text-sm px-3 py-2 rounded-full flex items-center">
                            <span><i class="fa fa-sign-in"></i> Login</span>
                        </button>
                    </a> -->
                    <a href="{{ route('auth.google') }}">
                        <img src="https://developers.google.com/identity/images/btn_google_signin_dark_normal_web.png" width="140px">
                    </a>
                </div>
            </div>
        </div>
        <!--Main-->
        <div class="container pt-10 md:pt-20 px-6 mx-auto flex flex-wrap flex-col md:flex-row items-center">
            <!--Left Col-->
            <div class="flex flex-col w-full xl:w-3/6 justify-center lg:items-start overflow-y-hidden">
                <h2 class="my-2 text-4xl md:text-4xl text-purple-800 font-bold leading-tight text-center md:text-left slide-in-bottom-h2">Welcome to <b><u>SpaceLingo</u></b></h2>
                <p class="leading-normal text-base md:text-3x2 mb-8 text-center md:text-left slide-in-bottom-subtitle">
                    Discover a universe of possibilities as you register and organize your vocabulary while we prepare exciting new features like quizzes, questions, tests, and tips. All of this is completely free and constantly improving!<br><br>
            </div>
            <!--Right Col-->
            <div class="flex w-full xl:w-3/6 py-6 justify-center  overflow-y-hidden">
                <img class="mx-auto lg:mr-0 slide-in-bottom" src="{{ asset('/images/poster.png') }}" width='300px' />
            </div>
            <!--Footer-->
        </div>
    </div>
    <footer class="w-full fixed bottom-0 bg-purple-900 text-white text-xs py-4">
        <div class="container mx-auto text-center">
            <!-- Your footer content goes here -->
            <span class="text-xs">Powered by <a href="https://developerspace.com.br" class="hover:text-green-500"><b>DeveloperSpace <i class="fa fa-rocket"></i></b></a></span>
        </div>
    </footer>
</body>

</html>