@extends('layouts.main')

@section('content')

<div class="w-10/12 mx-auto">
    <h1 class="text-xxl text-main-blue text-center md:text-left md:text-4xl ">Vacantes <span class="font-semibold">activas</span> </h1>

    <div class="container flex mt-10 text-gray-600">
        <div class="content w-8/12">
            @foreach ($vacancies as $vacancy)


            <div class="card bg-white p-5 mb-10">
                <p>{{$vacanccy->id}}</p>
                <div class="row flex justify-between items-center mt-5">
                    <div class="flex items-center ">
                        {{-- <a href="{{route('vacancies.show',$vacancy)}}" class="text-lg text-main-blue font-semibold">{{$vacancy->title}}</a> --}}
                        <a href="{{route('postulation.index',$vacancy->id)}}" class="text-lg  text-main-blue font-semibold">{{$vacancy->title}}</a>
                       <p class="bg-lime px-5 py-1 rounded-full mx-5 text-white text-sm">Abiertas</p>
                    </div>
                    <div class="flex  justify-center text-xs items-center">
                        <svg aria-hidden="true" data-prefix="fas" data-icon="calendar-alt" class="h-4 svg-inline--fa fa-calendar-alt fa-w-14" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M0 464c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48V192H0v272zm320-196c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40c0 6.6-5.4 12-12 12h-40c-6.6 0-12-5.4-12-12v-40zm0 128c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40c0 6.6-5.4 12-12 12h-40c-6.6 0-12-5.4-12-12v-40zM192 268c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40c0 6.6-5.4 12-12 12h-40c-6.6 0-12-5.4-12-12v-40zm0 128c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40c0 6.6-5.4 12-12 12h-40c-6.6 0-12-5.4-12-12v-40zM64 268c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40c0 6.6-5.4 12-12 12H76c-6.6 0-12-5.4-12-12v-40zm0 128c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40c0 6.6-5.4 12-12 12H76c-6.6 0-12-5.4-12-12v-40zM400 64h-48V16c0-8.8-7.2-16-16-16h-32c-8.8 0-16 7.2-16 16v48H160V16c0-8.8-7.2-16-16-16h-32c-8.8 0-16 7.2-16 16v48H48C21.5 64 0 85.5 0 112v48h448v-48c0-26.5-21.5-48-48-48z"/></svg>
                        <p class="mx-1">{{$vacancy->created_at->format('d M Y')}} - {{$vacancy->expired_at->format('d M Y')}}</p>
                    </div>
                </div>

                <div class="flex  justify-start items-center">
                    <svg aria-hidden="true" data-prefix="fas" data-icon="map-marker-alt" class="h-4 svg-inline--fa fa-map-marker-alt fa-w-12" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"><path fill="currentColor" d="M172.268 501.67C26.97 291.031 0 269.413 0 192 0 85.961 85.961 0 192 0s192 85.961 192 192c0 77.413-26.97 99.031-172.268 309.67-9.535 13.774-29.93 13.773-39.464 0zM192 272c44.183 0 80-35.817 80-80s-35.817-80-80-80-80 35.817-80 80 35.817 80 80 80z"/></svg>
                    <p class="text-xs mx-1">{{$vacancy->city->name}}</p>
                </div>
                <p class="text-xl font-semibold my-5">{{count($vacancy->students)}} <span class="font-normal">Aplicantes</span> </p>

                <div class="mt-5 flex justify-between items-start">
                    <div class="text-main-blue">
                        <h2 class="mb-2">Nuevos</h2>
                        <div class="flex items-center">
                            <svg aria-hidden="true" data-prefix="fas" data-icon="circle" class="h-3 svg-inline--fa fa-circle fa-w-16" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8z"/></svg>
                            <p class="mx-2 text-xl text-gray-700 font-semibold">{{$vacancy->news}}</p>
                        </div>
                    </div>

                    <div class="text-main-blue">
                        <h2 class="mb-2">Descartados</h2>
                        <div class="flex items-center">
                            <svg aria-hidden="true" data-prefix="fas" data-icon="circle" class="h-3 text-red-600 svg-inline--fa fa-circle fa-w-16" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8z"/></svg>
                            <p class="mx-2 text-xl text-gray-700 font-semibold">{{$vacancy->rejected}}</p>
                        </div>
                    </div>

                    <div class="text-main-blue">
                        <h2 class="mb-2">Finalistas</h2>
                        <div class="flex items-center">
                            <svg aria-hidden="true" data-prefix="fas" data-icon="circle" class="h-3 text-lime svg-inline--fa fa-circle fa-w-16" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8z"/></svg>
                            <p class="mx-2 text-xl text-gray-700 font-semibold">{{$vacancy->final}}</p>
                        </div>
                    </div>
                </div>
            </div>

            @endforeach

        </div>

        <div class="aside w-4/12 ">
            <div class="card bg-white items-center text-center mx-5 mb-10 p-5">
                <div class="logo pt-2">
                    <img class="h-16 mx-auto" src="img/logos/danone.png" alt="">
                </div>
                <div class="my-5">
                    <h1 class="text-center font-semibold">Danone</h1>
                    <div class="flex  justify-center my-5">
                        <svg aria-hidden="true" data-prefix="fas" data-icon="users" class="h-4 svg-inline--fa fa-users fa-w-20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"><path fill="currentColor" d="M96 224c35.3 0 64-28.7 64-64s-28.7-64-64-64-64 28.7-64 64 28.7 64 64 64zm448 0c35.3 0 64-28.7 64-64s-28.7-64-64-64-64 28.7-64 64 28.7 64 64 64zm32 32h-64c-17.6 0-33.5 7.1-45.1 18.6 40.3 22.1 68.9 62 75.1 109.4h66c17.7 0 32-14.3 32-32v-32c0-35.3-28.7-64-64-64zm-256 0c61.9 0 112-50.1 112-112S381.9 32 320 32 208 82.1 208 144s50.1 112 112 112zm76.8 32h-8.3c-20.8 10-43.9 16-68.5 16s-47.6-6-68.5-16h-8.3C179.6 288 128 339.6 128 403.2V432c0 26.5 21.5 48 48 48h288c26.5 0 48-21.5 48-48v-28.8c0-63.6-51.6-115.2-115.2-115.2zm-223.7-13.4C161.5 263.1 145.6 256 128 256H64c-35.3 0-64 28.7-64 64v32c0 17.7 14.3 32 32 32h65.9c6.3-47.4 34.9-87.3 75.2-109.4z"/></svg>
                        <p class="text-xs mx-1">users 5,000 - 8,000</p>
                    </div>
                    <div class="flex  justify-center my-5">
                        <svg aria-hidden="true" data-prefix="fas" data-icon="industry" class="h-4 svg-inline--fa fa-industry fa-w-16" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M475.115 163.781 336 252.309v-68.28c0-18.916-20.931-30.399-36.885-20.248L160 252.309V56c0-13.255-10.745-24-24-24H24C10.745 32 0 42.745 0 56v400c0 13.255 10.745 24 24 24h464c13.255 0 24-10.745 24-24V184.029c0-18.917-20.931-30.399-36.885-20.248z"/></svg>
                        <p class="text-xs mx-1">Alimentos</p>
                    </div>
                </div>


                <div class="flex  justify-center items-center my-5 bg-lime text-white px-5 py-2 w-8/12 mx-auto rounded-full">
                   <p class="bg-white text-gray-700 rounded-full px-1 mx-2 ">10</p><p class="font-semibold">Vacantes</p>
                </div>


            </div>

            <a href="{{route('jobs.create')}}" class="flex items-center w-10/12 mx-auto justify-center text-center bg-main-blue text-white m-5 rounded-full py-2">
                <p class="mx-5">Crear vacante</p>
                <svg aria-hidden="true" data-prefix="fas" data-icon="arrow-up" class="h-4 svg-inline--fa fa-arrow-up fa-w-14" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="m34.9 289.5-22.2-22.2c-9.4-9.4-9.4-24.6 0-33.9L207 39c9.4-9.4 24.6-9.4 33.9 0l194.3 194.3c9.4 9.4 9.4 24.6 0 33.9L413 289.4c-9.5 9.5-25 9.3-34.3-.4L264 168.6V456c0 13.3-10.7 24-24 24h-32c-13.3 0-24-10.7-24-24V168.6L69.2 289.1c-9.3 9.8-24.8 10-34.3.4z"/></svg>
            </a>




        </div>
    </div>

    {{$vacancies->links()}}
</div>

@endsection
