@extends('layouts.main')

@section('content')

<div class="w-10/12 mx-auto text-gray-700">
    <a class="text-xs text-main-blue font-semibold" href="">Regresar</a>
    <div class="flex">
        <h1 class="text-4xl text-main-blue">{{$vacancy->title}}</h1>
        @if ($vacancy->expired == 0)
            <p class="bg-lime text-white px-5 py-2 rounded-full mx-5">Abierta</p>
            @else
            <p class="bg-red-600 text-white px-5 py-2 rounded-full mx-5">Cerrada</p>
        @endif
    </div>
    <div class="flex  justify-start items-center">
        <svg aria-hidden="true" data-prefix="fas" data-icon="map-marker-alt" class="h-4 svg-inline--fa fa-map-marker-alt fa-w-12" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"><path fill="currentColor" d="M172.268 501.67C26.97 291.031 0 269.413 0 192 0 85.961 85.961 0 192 0s192 85.961 192 192c0 77.413-26.97 99.031-172.268 309.67-9.535 13.774-29.93 13.773-39.464 0zM192 272c44.183 0 80-35.817 80-80s-35.817-80-80-80-80 35.817-80 80 35.817 80 80 80z"/></svg>
        <p class="text-xs mx-1">{{$vacancy->city->name}}</p>
    </div>
    <p class="text-xl font-semibold my-5">{{count($vacancy->students)}} <span class="font-normal">Aplicantes</span> </p>

    <div class="mt-5 flex justify-between items-start w-4/12">
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

    <div class="container flex mt-10 text-gray-600 justify-between items-start">
        <div class="content w-8/12">
            <div class="flex justify-start">
                <!--actual component start-->
                <div x-data="setup()">
                    <ul class="flex justify-start items-center text-xs">
                        <template x-for="(tab, index) in tabs" :key="index">
                            <li class="cursor-pointer bg-white rounded-full px-5 py-2 mx-5"
                                :class="activeTab===index ? 'text-white bg-main-blue ' : ''" @click="activeTab = index"
                                x-text="tab"></li>
                        </template>
                    </ul>

                    <div class="text-center mx-auto">
                        <div x-show="activeTab===0" >@include('vacancy.components.all')</div>
                        <div x-show="activeTab===1">@include('vacancy.components.news')</div>
                        <div x-show="activeTab===2">Content 3</div>
                        <div x-show="activeTab===3">Content 4</div>
                    </div>
                </div>
                <!--actual component end-->
            </div>
        </div>
        <div class="aside w-4/12 p-5 mx-auto justify-center flex">
            <button class="bg-white text-gray-800 rounded-full border-2 border-main-blue px-5 py-2">Editar vacante</button>
        </div>
    </div>

</div>

@push('scripts')
<script>
	function setup() {
    return {
      activeTab: 0,
      tabs: [
          "Todos",
          "Nuevos",
          "Descartados",
          "Finalistas",
      ]
    };
  };
</script>
@endpush
@endsection
