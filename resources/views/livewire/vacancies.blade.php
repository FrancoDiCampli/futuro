@extends('layouts.main')

@section('content')
<div class="w-10/12 mx-auto" x-data="{ open: true }">
    <h1 class="text-center text-xxl text-main-blue md:text-left md:text-4xl ">Encuentra <span class="font-semibold">trabajo</span> </h1>

    <div class="flex justify-between mt-12"  >
        <div class="flex items-center justify-start w-4/12 bg-white rounded-full search">
                <div class="px-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 font-semibold transition duration-100 cursor-pointer text-main-blue" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </div>

                <input type="text" class="px-2 text-left border-none rounded-full outline-none focus:outline-none w-60" placeholder="Busca vacantes">
        </div>

        <div class="flex items-center justify-between filters text-main-blue">
            <p class="mx-5 font-semibold">Filtros avanzados</p>
            <div class="">
                <svg  x-on:click="open = ! open" aria-hidden="true" data-prefix="fas" data-icon="filter" class="w-5 cursor-pointer svg-inline--fa fa-filter fa-w-16" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M487.976 0H24.028C2.71 0-8.047 25.866 7.058 40.971L192 225.941V432c0 7.831 3.821 15.17 10.237 19.662l80 55.98C298.02 518.69 320 507.493 320 487.98V225.941l184.947-184.97C520.021 25.896 509.338 0 487.976 0z"/>
                </svg>
            </div>
        </div>



    </div>

    <div x-show="open" class="my-10 text-xs bg-white"
    x-transition:enter="transition ease-out duration-300"
    x-transition:enter-start="opacity-0 transform scale-90"
    x-transition:enter-end="opacity-100 transform scale-100"
    x-transition:leave="transition ease-in duration-300"
    x-transition:leave-start="opacity-100 transform scale-100"
    x-transition:leave-end="opacity-0 transform scale-90"
    >
        <div class="flex flex-wrap row ">
            <pre>{{$states}}</pre>
                <div class="w-3/12 p-5">

                    <label for="" class="block px-5 font-semibold text-main-blue">Estado</label>
                    <select wire:model="selectedState"  class="w-full px-5 text-sm border border-gray-200 rounded-full focus:outline-none h-9"
                     >
                     {{-- <option value="">Seleccione un estado</option> --}}
                       @foreach (Config::get('locations.states') as $estado)
                       <option value="1">{{$estado}}</option>
                       @endforeach
                    </select>
                </div>

            </div>
            <div class="flex justify-end p-5">

                <button class="px-5 text-sm text-white rounded-full bg-main-blue py2">Buscar</button>
            </div>

    </div>

    <div class="flex items-center justify-between mt-5">

        {{-- {{ $vacancies->links() }} --}}

    </div>

    <div class="flex flex-wrap content">
        @foreach ($vacancies as $vacancy)
        <a href="{{route('vacancies.show',$vacancy->slug)}}" class="justify-center w-56 mx-1 mt-5 space-x-2 text-gray-700 bg-white cursor-pointer card">

                {{-- @if (isset($vacancy->recruiter->enterprise->user->photo))

                    @else
                    <img class="h-16 mx-auto mt-5" src="{{asset('img/logos/logo.png')}}" alt="ft">

                    @endif --}}

                @if($vacancy->recruiter->belong_enterprise == 1)
                    <img class="h-16 mx-auto mt-5" src="{{asset('storage/'.$vacancy->recruiter->enterprise->logo->path)}}" alt="logo">
                @else
                <img class="h-16 mx-auto mt-5" src="{{asset('img/logos/logo.png')}}" alt="ft">

                @endif

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
@endsection
