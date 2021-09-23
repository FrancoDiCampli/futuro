<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>


        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        @livewireStyles
    </head>
    <body class="bg-gray-100 ">
        <div class="bg-gray-100 text-gray-600">
            @include('layouts.navigation')
        </div>
        <main class="w-11/12 font-poppins mx-auto mt-5">
            @if ($errors->any())
                <ul class="mt-3 list-disc list-inside text-sm text-red-600">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif
           @yield('content')

        </main>
        @livewire('livewire-ui-modal')
        @livewireScripts
        @stack('scripts')
    </body>
</html>
