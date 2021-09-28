@extends('layouts.main')

@section('content')
<div class="w-10/12 mx-auto">
    <h1 class="text-xxl text-main-blue text-center md:text-left md:text-4xl ">Encuentra <span class="font-semibold">trabajo</span> </h1>

    <div class="flex justify-between mt-12">
        <div class="search bg-white rounded-full flex justify-start items-center w-4/12">
                <div class="px-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 font-semibold text-main-blue transition duration-100 cursor-pointer" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </div>

                <input type="text" class="text-left focus:outline-none  rounded-full outline-none border-none w-60 px-2" placeholder="Busca vacantes">
        </div>

        <div class="filters flex text-main-blue items-center justify-between">
            <p class="font-semibold mx-5" x-data="{ show: true }">Filtros avanzados</p>
            <div class="">
                <svg aria-hidden="true" data-prefix="fas" data-icon="filter" class="w-5 svg-inline--fa fa-filter fa-w-16" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M487.976 0H24.028C2.71 0-8.047 25.866 7.058 40.971L192 225.941V432c0 7.831 3.821 15.17 10.237 19.662l80 55.98C298.02 518.69 320 507.493 320 487.98V225.941l184.947-184.97C520.021 25.896 509.338 0 487.976 0z"/>
                </svg>
            </div>
        </div>



    </div>

    <div class="bg-white my-10 text-sm">
        <h1>Filtros</h1>
        <form action="" method="POST" >

            <div class="row flex flex-wrap">
                <div class="p-5 w-4/12">
                    <span>{{$experience}}</span>
                    <label for="" class="text-main-blue block font-semibold px-5">Experiencia</label>
                    <select wire:model="experience"  class="rounded-full border border-gray-200 w-full px-5  focus:outline-none h-9 text-sm"
                        name="experience" id="">
                        <option value="Estudiante">Estudiante</option>
                        <option value="Graduado">Graduado</option>
                        <option value="1er año">1er año</option>
                        <option value="2do año">2do año</option>
                    </select>
                </div>
                <div class="p-5 w-4/12">
                    <label for="" class="text-base text-main-blue block font-semibold px-5">Contratacion</label>
                    <select class="rounded-full border border-gray-200 w-full px-5  focus:outline-none h-9 text-sm"
                    name="hiring" id="">
                        <option value="Permanente">Permanente</option>
                        <option value="Temporario">Temporario</option>
                        <option value="Por proyecto">Por proyecto</option>
                        <option value="Becario">Becario</option>
                    </select>
                </div>
                <div class="p-5 w-4/12">
                    <label for="" class="text-base text-main-blue block font-semibold px-5">Disponibilidad</label>
                    <select class="rounded-full border border-gray-200 w-full px-5  focus:outline-none h-9 text-sm"
                        name="available" id="">
                        <option value="Tiempo completo">Tiempo completo</option>
                        <option value="Medio tiempo">Medio tiempo</option>
                    </select>
                </div>
            </div>
            <div class="flex justify-end p-5">

                <button class="bg-main-blue text-sm text-white rounded-full px-5 py2">Buscar</button>
            </div>
        </form>
    </div>

    <div class="flex justify-between mt-5 items-center">

        {{ $vacancies->links() }}
        {{-- {{$vacancies->links()}} --}}
        {{-- <div class="flex h-12 font-medium rounded-full justify-around w-4/12">

            <div class="bg-lime text-white w-12 border md:flex justify-center items-center hidden  cursor-pointer leading-5 transition duration-150 ease-in  rounded-full  ">1</div>
            <div class="w-12 border md:flex justify-center items-center hidden  cursor-pointer leading-5 transition duration-150 ease-in  rounded-full  ">2</div>
            <div class="w-12 border md:flex justify-center items-center hidden  cursor-pointer leading-5 transition duration-150 ease-in  rounded-full  ">3</div>
            <div class="w-12 border md:flex justify-center items-center hidden  cursor-pointer leading-5 transition duration-150 ease-in  rounded-full  ">...</div>
            <div class="w-12 border md:flex justify-center items-center hidden  cursor-pointer leading-5 transition duration-150 ease-in  rounded-full  ">14</div>
            <div class="w-12 border md:flex justify-center items-center hidden  cursor-pointer leading-5 transition duration-150 ease-in  rounded-full  ">15</div>

        </div> --}}
    </div>

    <div class="content flex flex-wrap">
        @foreach ($vacancies as $vacancy)
        <a href="{{route('vacancies.show',$vacancy->id)}}" class="card w-56 bg-white space-x-2 mx-1 text-gray-700 justify-center mt-5 cursor-pointer">

            {{-- @if (isset($vacancy->recruiter->user->logo))
                @else

                @endif --}}
                {{-- <img class="h-16 mt-5 mx-auto" src="{{asset('storage/'.$vacancy->recruiter->enterprise->user->photo->path)}}" alt="logo"> --}}
            {{-- <img class="h-16 mt-5 mx-auto" src="{{asset('img/logos/logo.png')}}" alt="ft"> --}}


            <div class="my-5">
                @if ($vacancy->recruiter->belong_enterprise)
                <h1 class="text-center font-semibold">{{$vacancy->recruiter->enterprise->name}}</h1>
                @else
                    <h1 class="text-center font-semibold">{{$vacancy->recruiter->fullname}}</h1>
                @endif
                <div class="flex  justify-center">
                    <svg aria-hidden="true" data-prefix="fas" data-icon="map-marker-alt" class="h-4 svg-inline--fa fa-map-marker-alt fa-w-12" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"><path fill="currentColor" d="M172.268 501.67C26.97 291.031 0 269.413 0 192 0 85.961 85.961 0 192 0s192 85.961 192 192c0 77.413-26.97 99.031-172.268 309.67-9.535 13.774-29.93 13.773-39.464 0zM192 272c44.183 0 80-35.817 80-80s-35.817-80-80-80-80 35.817-80 80 35.817 80 80 80z"/></svg>
                    <p class="text-xs mx-1">{{$vacancy->city->name}}</p>
                </div>
            </div>

            <div class="my-5 mx-auto text-center">
                <h2 class="text-xl text-main-blue font-semibold">{{$vacancy->subcategory->category->name}}</h2>
                <p class="text-xs">{{$vacancy->subcategory->name}}</p>
            </div>

            <div class="flex  justify-center text-xs items-center my-10">
                <svg aria-hidden="true" data-prefix="fas" data-icon="calendar-alt" class="h-4 svg-inline--fa fa-calendar-alt fa-w-14" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M0 464c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48V192H0v272zm320-196c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40c0 6.6-5.4 12-12 12h-40c-6.6 0-12-5.4-12-12v-40zm0 128c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40c0 6.6-5.4 12-12 12h-40c-6.6 0-12-5.4-12-12v-40zM192 268c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40c0 6.6-5.4 12-12 12h-40c-6.6 0-12-5.4-12-12v-40zm0 128c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40c0 6.6-5.4 12-12 12h-40c-6.6 0-12-5.4-12-12v-40zM64 268c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40c0 6.6-5.4 12-12 12H76c-6.6 0-12-5.4-12-12v-40zm0 128c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40c0 6.6-5.4 12-12 12H76c-6.6 0-12-5.4-12-12v-40zM400 64h-48V16c0-8.8-7.2-16-16-16h-32c-8.8 0-16 7.2-16 16v48H160V16c0-8.8-7.2-16-16-16h-32c-8.8 0-16 7.2-16 16v48H48C21.5 64 0 85.5 0 112v48h448v-48c0-26.5-21.5-48-48-48z"/></svg>
                <p class="mx-1">{{$vacancy->expired_at->format('d-m-Y')}}</p>
            </div>
        </a>
        @endforeach
    </div>



</div>
@endsection
