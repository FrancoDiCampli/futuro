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
            <p class="font-semibold mx-5">Filtros avanzados</p>
            <div class="">
                <svg aria-hidden="true" data-prefix="fas" data-icon="filter" class="w-5 svg-inline--fa fa-filter fa-w-16" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M487.976 0H24.028C2.71 0-8.047 25.866 7.058 40.971L192 225.941V432c0 7.831 3.821 15.17 10.237 19.662l80 55.98C298.02 518.69 320 507.493 320 487.98V225.941l184.947-184.97C520.021 25.896 509.338 0 487.976 0z"/>
                </svg>
            </div>
        </div>
    </div>

    <div class="flex justify-between mt-5 items-center">
        <p class="">Mostrando 20 de 285</p>
        <div class="flex h-12 font-medium rounded-full justify-around w-4/12">
            <div class="bg-lime text-white w-12 border md:flex justify-center items-center hidden  cursor-pointer leading-5 transition duration-150 ease-in  rounded-full  ">1</div>
            <div class="w-12 border md:flex justify-center items-center hidden  cursor-pointer leading-5 transition duration-150 ease-in  rounded-full  ">2</div>
            <div class="w-12 border md:flex justify-center items-center hidden  cursor-pointer leading-5 transition duration-150 ease-in  rounded-full  ">3</div>
            <div class="w-12 border md:flex justify-center items-center hidden  cursor-pointer leading-5 transition duration-150 ease-in  rounded-full  ">...</div>
            <div class="w-12 border md:flex justify-center items-center hidden  cursor-pointer leading-5 transition duration-150 ease-in  rounded-full  ">14</div>
            <div class="w-12 border md:flex justify-center items-center hidden  cursor-pointer leading-5 transition duration-150 ease-in  rounded-full  ">15</div>

        </div>
    </div>

    <div class="content flex flex-wrap">
        <div class="w-10/12">

            @foreach ($enterprises as $enterprise)
                <div class="card bg-white items-center text-center mx-5 mb-10 p-5 w-4/12">
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

            @endforeach
        </div>
    </div>



</div>
@endsection
