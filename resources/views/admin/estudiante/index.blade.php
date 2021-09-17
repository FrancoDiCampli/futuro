@extends('layouts.main')

@section('content')

<div class="w-10/12 mx-auto">
    <h1 class="text-xxl text-main-blue text-center md:text-left md:text-4xl ">Mis  <span class="font-semibold">postulaciones</span> </h1>
    <div class="flex justify-between mt-5 items-center">
        <p class="">Mostrando 1 de 1</p>
    </div>

    <div class="content flex flex-wrap">
        @foreach ($postulations as $job)
        <a href="{{route('jobs.show',$job->id)}}" class="card w-56 bg-white space-x-2 mx-1 text-gray-700 justify-center mt-5 cursor-pointer">
            <img class="h-16 mt-5 mx-auto" src="{{asset('img/logos/logo.png')}}" alt="">
            <div class="my-5">
                <h1 class="text-center font-semibold">{{$job->recruiter->name}}</h1>
                <div class="flex  justify-center">
                    <svg aria-hidden="true" data-prefix="fas" data-icon="map-marker-alt" class="h-4 svg-inline--fa fa-map-marker-alt fa-w-12" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"><path fill="currentColor" d="M172.268 501.67C26.97 291.031 0 269.413 0 192 0 85.961 85.961 0 192 0s192 85.961 192 192c0 77.413-26.97 99.031-172.268 309.67-9.535 13.774-29.93 13.773-39.464 0zM192 272c44.183 0 80-35.817 80-80s-35.817-80-80-80-80 35.817-80 80 35.817 80 80 80z"/></svg>
                    <p class="text-xs mx-1">{{$job->city->name}}</p>
                </div>
            </div>

            <div class="my-5 mx-auto text-center">
                <h2 class="text-xl text-main-blue font-semibold">{{$job->subcategory->category->name}}</h2>
                <p class="text-xs">{{$job->subcategory->name}}</p>
            </div>

            <div class="flex  justify-center text-xs items-center my-10">
                <svg aria-hidden="true" data-prefix="fas" data-icon="calendar-alt" class="h-4 svg-inline--fa fa-calendar-alt fa-w-14" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M0 464c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48V192H0v272zm320-196c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40c0 6.6-5.4 12-12 12h-40c-6.6 0-12-5.4-12-12v-40zm0 128c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40c0 6.6-5.4 12-12 12h-40c-6.6 0-12-5.4-12-12v-40zM192 268c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40c0 6.6-5.4 12-12 12h-40c-6.6 0-12-5.4-12-12v-40zm0 128c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40c0 6.6-5.4 12-12 12h-40c-6.6 0-12-5.4-12-12v-40zM64 268c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40c0 6.6-5.4 12-12 12H76c-6.6 0-12-5.4-12-12v-40zm0 128c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40c0 6.6-5.4 12-12 12H76c-6.6 0-12-5.4-12-12v-40zM400 64h-48V16c0-8.8-7.2-16-16-16h-32c-8.8 0-16 7.2-16 16v48H160V16c0-8.8-7.2-16-16-16h-32c-8.8 0-16 7.2-16 16v48H48C21.5 64 0 85.5 0 112v48h448v-48c0-26.5-21.5-48-48-48z"/></svg>
                <p class="mx-1">{{$job->expired_at->format('d-m-Y')}}</p>
            </div>
        </a>
        @endforeach
    </div>
</div>
@endsection
