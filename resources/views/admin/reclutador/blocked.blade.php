<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">


        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>

        <link rel="stylesheet" href="{{asset('css/app.css')}}">

    </head>
    <body class="antialiased">

        <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">

            {{-- <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 underline">Dashboard</a> --}}


            <div class="center w-6/12 justify-center">
                <h1 class="text-2xl text-gray-800 text-center font-semibold">La empresa a la que pertenece aun no acepto la solicitud</h1>
                <img class="h-40 mx-auto" src="{{asset('img/logo-futuro-talento-azul.svg')}}" alt="futuro talento">
                <div>
                    <form  method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="flex items-center w-10/12 mx-auto justify-center text-center bg-main-blue text-white m-5 rounded-full py-2">
                            Log Out
                        </button>
                    </form>

                </div>

            </div>

        </div>
    </body>
</html>
