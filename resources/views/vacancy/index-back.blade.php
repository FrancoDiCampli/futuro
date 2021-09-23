@extends('layouts.app')

@section('content')

    <div class="md:flex md:justify-center md:space-x-8 md:px-14 flex-wrap">
        @foreach ($categories as $category)

        <div class="mt-16 py-4 px-4 bg-whit w-72 bg-white rounded-xl shadow-lg hover:shadow-xl transform hover:scale-110 transition duration-500 mx-auto md:mx-0">
            <div class="w-sm">
            <img class="w-64" src="https://images01.nicepage.com/c461c07a441a5d220e8feb1a/a17abde8d83650a582a28432/users-with-speech-bubbles-vector_53876-82250.jpg" alt="" />
            <div class="mt-4 text-green-600 text-center">
                <h1 class="text-xl font-bold">{{$category->name}}</h1>
                <p class="mt-4 text-gray-600">Pretium lectus quam id leo in vitae turpis. Mattis pellentesque id nibh tortor id.</p>
                <button class="mt-8 mb-4 py-2 px-14 rounded-full bg-green-600 text-white tracking-widest hover:bg-green-500 transition duration-200">MORE</button>
            </div>
            </div>
        </div>
        @endforeach
    </div>


@endsection

