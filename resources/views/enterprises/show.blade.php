@extends('layouts.main')

@section('content')

<div class="w-10/12 mx-auto text-gray-700">
    <div class="w-8/12">
        <a class="text-xs font-semibold text-main-blue" href="">Regresar</a>
        <img class="h-24 my-5" src="{{asset('storage\danone.png')}}" alt="">
        <h1 class="text-2xl text-main-blue">{{$enterprise->name}}</h1>
        <p>{{$enterprise->description}}</p>
        <div class="flex justify-start my-2">
            <svg aria-hidden="true" data-prefix="fas" data-icon="map-marker-alt" class="h-4 svg-inline--fa fa-map-marker-alt fa-w-12" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"><path fill="currentColor" d="M172.268 501.67C26.97 291.031 0 269.413 0 192 0 85.961 85.961 0 192 0s192 85.961 192 192c0 77.413-26.97 99.031-172.268 309.67-9.535 13.774-29.93 13.773-39.464 0zM192 272c44.183 0 80-35.817 80-80s-35.817-80-80-80-80 35.817-80 80 35.817 80 80 80z"/></svg>
            <p class="mx-1 text-xs">{{$enterprise->city->name}}</p>
        </div>
        <div class="flex justify-start my-2">
            <svg aria-hidden="true" data-prefix="fas" data-icon="users" class="h-4 svg-inline--fa fa-users fa-w-20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"><path fill="currentColor" d="M96 224c35.3 0 64-28.7 64-64s-28.7-64-64-64-64 28.7-64 64 28.7 64 64 64zm448 0c35.3 0 64-28.7 64-64s-28.7-64-64-64-64 28.7-64 64 28.7 64 64 64zm32 32h-64c-17.6 0-33.5 7.1-45.1 18.6 40.3 22.1 68.9 62 75.1 109.4h66c17.7 0 32-14.3 32-32v-32c0-35.3-28.7-64-64-64zm-256 0c61.9 0 112-50.1 112-112S381.9 32 320 32 208 82.1 208 144s50.1 112 112 112zm76.8 32h-8.3c-20.8 10-43.9 16-68.5 16s-47.6-6-68.5-16h-8.3C179.6 288 128 339.6 128 403.2V432c0 26.5 21.5 48 48 48h288c26.5 0 48-21.5 48-48v-28.8c0-63.6-51.6-115.2-115.2-115.2zm-223.7-13.4C161.5 263.1 145.6 256 128 256H64c-35.3 0-64 28.7-64 64v32c0 17.7 14.3 32 32 32h65.9c6.3-47.4 34.9-87.3 75.2-109.4z"/></svg>
            <p class="mx-1 text-xs">{{$enterprise->employees}}</p>
        </div>
        <div class="flex justify-start my-2">
            <svg aria-hidden="true" data-prefix="fas" data-icon="industry" class="h-4 svg-inline--fa fa-industry fa-w-16" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M475.115 163.781 336 252.309v-68.28c0-18.916-20.931-30.399-36.885-20.248L160 252.309V56c0-13.255-10.745-24-24-24H24C10.745 32 0 42.745 0 56v400c0 13.255 10.745 24 24 24h464c13.255 0 24-10.745 24-24V184.029c0-18.917-20.931-30.399-36.885-20.248z"/></svg>
            <p class="mx-1 text-xs">{{$enterprise->sector}}</p>
        </div>
    </div>

    <div class="content">
        <h1 class="py-5 text-2xl font-medium text-main-blue">Vacantes <span class="font-semibold">disponibles</span></h1>
        <p class="text-sm">Mostrando 10 de 10</p>

        <div class="flex flex-wrap content">
            @foreach ($vacancies as $vacancy)
            <a href="{{route('vacancies.show',$vacancy->slug)}}" class="justify-center w-56 mx-1 mt-5 space-x-2 text-gray-700 bg-white cursor-pointer card">
                <img class="h-16 mx-auto mt-5" src="{{asset('img/logos/logo.png')}}" alt="">
                <div class="my-5">
                    @if ($vacancy->recruiter->belong_enterprise)
                    <h1 class="font-semibold text-center">{{$vacancy->recruiter->enterprise->name}}</h1>
                    @else
                        <h1 class="font-semibold text-center">{{$vacancy->recruiter->fullname}}</h1>
                    @endif
                    <div class="flex justify-center">
                        <svg aria-hidden="true" data-prefix="fas" data-icon="map-marker-alt" class="h-4 svg-inline--fa fa-map-marker-alt fa-w-12" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"><path fill="currentColor" d="M172.268 501.67C26.97 291.031 0 269.413 0 192 0 85.961 85.961 0 192 0s192 85.961 192 192c0 77.413-26.97 99.031-172.268 309.67-9.535 13.774-29.93 13.773-39.464 0zM192 272c44.183 0 80-35.817 80-80s-35.817-80-80-80-80 35.817-80 80 35.817 80 80 80z"/></svg>
                        <p class="mx-1 text-xs">{{$vacancy->city->name}}</p>
                    </div>
                </div>

                <div class="mx-auto my-5 text-center">
                    <h2 class="text-xl font-semibold text-main-blue">{{$vacancy->subcategory->category->name}}</h2>
                    <p class="text-xs">{{$vacancy->subcategory->name}}</p>
                </div>

                <div class="flex items-center justify-center my-10 text-xs">
                    <svg aria-hidden="true" data-prefix="fas" data-icon="calendar-alt" class="h-4 svg-inline--fa fa-calendar-alt fa-w-14" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M0 464c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48V192H0v272zm320-196c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40c0 6.6-5.4 12-12 12h-40c-6.6 0-12-5.4-12-12v-40zm0 128c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40c0 6.6-5.4 12-12 12h-40c-6.6 0-12-5.4-12-12v-40zM192 268c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40c0 6.6-5.4 12-12 12h-40c-6.6 0-12-5.4-12-12v-40zm0 128c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40c0 6.6-5.4 12-12 12h-40c-6.6 0-12-5.4-12-12v-40zM64 268c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40c0 6.6-5.4 12-12 12H76c-6.6 0-12-5.4-12-12v-40zm0 128c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40c0 6.6-5.4 12-12 12H76c-6.6 0-12-5.4-12-12v-40zM400 64h-48V16c0-8.8-7.2-16-16-16h-32c-8.8 0-16 7.2-16 16v48H160V16c0-8.8-7.2-16-16-16h-32c-8.8 0-16 7.2-16 16v48H48C21.5 64 0 85.5 0 112v48h448v-48c0-26.5-21.5-48-48-48z"/></svg>
                    <p class="mx-1">{{$vacancy->expired_at->format('d-m-Y')}}</p>
                </div>
            </a>
            @endforeach
        </div>

    </div>



</div>
@endsection
