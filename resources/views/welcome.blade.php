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

    <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <!-- Animation CSS-->
    <style>
        /* ----------------------------------------------
		 * Generated by Animista
		 * w: http://animista.net, t: @cssanimista
		 * ---------------------------------------------- */

        .slide-in-bottom {
            -webkit-animation: slide-in-bottom .5s cubic-bezier(.25, .46, .45, .94) both;
            animation: slide-in-bottom .5s cubic-bezier(.25, .46, .45, .94) both
        }

        .slide-in-bottom-h1 {
            -webkit-animation: slide-in-bottom .5s cubic-bezier(.25, .46, .45, .94) .5s both;
            animation: slide-in-bottom .5s cubic-bezier(.25, .46, .45, .94) .5s both
        }

        .slide-in-bottom-subtitle {
            -webkit-animation: slide-in-bottom .5s cubic-bezier(.25, .46, .45, .94) .75s both;
            animation: slide-in-bottom .5s cubic-bezier(.25, .46, .45, .94) .75s both
        }

        .fade-in {
            -webkit-animation: fade-in 1.2s cubic-bezier(.39, .575, .565, 1.000) 1s both;
            animation: fade-in 1.2s cubic-bezier(.39, .575, .565, 1.000) 1s both
        }

        .bounce-top-icons {
            -webkit-animation: bounce-top .9s 1s both;
            animation: bounce-top .9s 1s both
        }

        @-webkit-keyframes slide-in-bottom {
            0% {
                -webkit-transform: translateY(1000px);
                transform: translateY(1000px);
                opacity: 0
            }

            100% {
                -webkit-transform: translateY(0);
                transform: translateY(0);
                opacity: 1
            }
        }

        @keyframes slide-in-bottom {
            0% {
                -webkit-transform: translateY(1000px);
                transform: translateY(1000px);
                opacity: 0
            }

            100% {
                -webkit-transform: translateY(0);
                transform: translateY(0);
                opacity: 1
            }
        }

        @-webkit-keyframes bounce-top {
            0% {
                -webkit-transform: translateY(-45px);
                transform: translateY(-45px);
                -webkit-animation-timing-function: ease-in;
                animation-timing-function: ease-in;
                opacity: 1
            }

            24% {
                opacity: 1
            }

            40% {
                -webkit-transform: translateY(-24px);
                transform: translateY(-24px);
                -webkit-animation-timing-function: ease-in;
                animation-timing-function: ease-in
            }

            65% {
                -webkit-transform: translateY(-12px);
                transform: translateY(-12px);
                -webkit-animation-timing-function: ease-in;
                animation-timing-function: ease-in
            }

            82% {
                -webkit-transform: translateY(-6px);
                transform: translateY(-6px);
                -webkit-animation-timing-function: ease-in;
                animation-timing-function: ease-in
            }

            93% {
                -webkit-transform: translateY(-4px);
                transform: translateY(-4px);
                -webkit-animation-timing-function: ease-in;
                animation-timing-function: ease-in
            }

            25%,
            55%,
            75%,
            87% {
                -webkit-transform: translateY(0);
                transform: translateY(0);
                -webkit-animation-timing-function: ease-out;
                animation-timing-function: ease-out
            }

            100% {
                -webkit-transform: translateY(0);
                transform: translateY(0);
                -webkit-animation-timing-function: ease-out;
                animation-timing-function: ease-out;
                opacity: 1
            }
        }

        @keyframes bounce-top {
            0% {
                -webkit-transform: translateY(-45px);
                transform: translateY(-45px);
                -webkit-animation-timing-function: ease-in;
                animation-timing-function: ease-in;
                opacity: 1
            }

            24% {
                opacity: 1
            }

            40% {
                -webkit-transform: translateY(-24px);
                transform: translateY(-24px);
                -webkit-animation-timing-function: ease-in;
                animation-timing-function: ease-in
            }

            65% {
                -webkit-transform: translateY(-12px);
                transform: translateY(-12px);
                -webkit-animation-timing-function: ease-in;
                animation-timing-function: ease-in
            }

            82% {
                -webkit-transform: translateY(-6px);
                transform: translateY(-6px);
                -webkit-animation-timing-function: ease-in;
                animation-timing-function: ease-in
            }

            93% {
                -webkit-transform: translateY(-4px);
                transform: translateY(-4px);
                -webkit-animation-timing-function: ease-in;
                animation-timing-function: ease-in
            }

            25%,
            55%,
            75%,
            87% {
                -webkit-transform: translateY(0);
                transform: translateY(0);
                -webkit-animation-timing-function: ease-out;
                animation-timing-function: ease-out
            }

            100% {
                -webkit-transform: translateY(0);
                transform: translateY(0);
                -webkit-animation-timing-function: ease-out;
                animation-timing-function: ease-out;
                opacity: 1
            }
        }

        @-webkit-keyframes fade-in {
            0% {
                opacity: 0
            }

            100% {
                opacity: 1
            }
        }

        @keyframes fade-in {
            0% {
                opacity: 0
            }

            100% {
                opacity: 1
            }
        }
    </style>
</head>
<body class="leading-normal tracking-normal text-gray-900" style="font-family: 'Source Sans Pro', sans-serif;">
    <div class="max-w-6xl mx-auto py-0 sm:px-6 lg:px-8" style="background-image:url('bg.svg');">
        <!--Nav-->
        <div class="w-full container mx-auto p-6">

            <div class="w-full flex items-center justify-between">
                <a href="/">
                    <img src="{{ asset('/images/logospacelingo300.png') }}" width='200px' />
                </a>
                <div class="flex w-1/2 justify-end content-center">
                    <a href="/login">
                        <button class="bg-purple-900 hover:bg-purple-800 text-white font-bold py-2 px-3 rounded inline-flex items-center">
                            <span>Login</span>
                        </button>
                    </a>
                </div>
            </div>
        </div>
        <!--Main-->
        <div class="container pt-10 md:pt-20 px-6 mx-auto flex flex-wrap flex-col md:flex-row items-center">
            <!--Left Col-->
            <div class="flex flex-col w-full xl:w-3/6 justify-center lg:items-start overflow-y-hidden">
                <h1 class="my-4 text-3xl md:text-5xl text-purple-800 font-bold leading-tight text-center md:text-left slide-in-bottom-h1">Welcome to <b>Space Lingo</b></h1>
                <p class="leading-normal text-base md:text-3x2 mb-8 text-center md:text-left slide-in-bottom-subtitle">Explore Space Lingo - Your Interplanetary Journey of Language Learning!<br><br>

                    Discover a universe of possibilities as you register and organize your vocabulary while we prepare exciting new features like quizzes, questions, tests, and tips. All of this is completely free and constantly improving!<br><br>
            </div>
            <!--Right Col-->
            <div class="flex w-full xl:w-3/6 py-6 justify-center  overflow-y-hidden">
                <img class="mx-auto lg:mr-0 slide-in-bottom" src="{{ asset('/images/poster.png') }}" width='300px' />
            </div>
            <!--Footer-->
            <div class="w-full pt-16 pb-6 text-sm text-center md:text-left fade-in">
                <a class="text-gray-500 no-underline hover:no-underline" href="#">&copy; DeveloperSpace</a>
            </div>
        </div>
    </div>
</body>
</html>