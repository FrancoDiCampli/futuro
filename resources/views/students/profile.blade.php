@extends('layouts.main')

@section('content')

<div class="w-10/12 mx-auto text-gray-700">


    <img class="h-24 rounded-full shadow-md my-5" src="{{asset('assets/001 - Home/foto-mauricio.png')}}" alt="">
    <h1 class="text-2xl text-main-blue">{{$student->first_name}} {{$student->last_name}}</h1>

    <div class="flex  justify-start items-center my-2">
        <svg aria-hidden="true" data-prefix="fas" data-icon="calendar-alt" class="h-4 svg-inline--fa fa-calendar-alt fa-w-14" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M0 464c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48V192H0v272zm320-196c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40c0 6.6-5.4 12-12 12h-40c-6.6 0-12-5.4-12-12v-40zm0 128c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40c0 6.6-5.4 12-12 12h-40c-6.6 0-12-5.4-12-12v-40zM192 268c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40c0 6.6-5.4 12-12 12h-40c-6.6 0-12-5.4-12-12v-40zm0 128c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40c0 6.6-5.4 12-12 12h-40c-6.6 0-12-5.4-12-12v-40zM64 268c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40c0 6.6-5.4 12-12 12H76c-6.6 0-12-5.4-12-12v-40zm0 128c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40c0 6.6-5.4 12-12 12H76c-6.6 0-12-5.4-12-12v-40zM400 64h-48V16c0-8.8-7.2-16-16-16h-32c-8.8 0-16 7.2-16 16v48H160V16c0-8.8-7.2-16-16-16h-32c-8.8 0-16 7.2-16 16v48H48C21.5 64 0 85.5 0 112v48h448v-48c0-26.5-21.5-48-48-48z"/></svg>
        <p class="text-xs mx-1">{{$student->birthdate->format('d M Y')}}</p>
    </div>
    <div class="flex  justify-start items-center my-2">
        <svg aria-hidden="true" data-prefix="fas" data-icon="map-marker-alt" class="h-4 svg-inline--fa fa-map-marker-alt fa-w-12" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"><path fill="currentColor" d="M172.268 501.67C26.97 291.031 0 269.413 0 192 0 85.961 85.961 0 192 0s192 85.961 192 192c0 77.413-26.97 99.031-172.268 309.67-9.535 13.774-29.93 13.773-39.464 0zM192 272c44.183 0 80-35.817 80-80s-35.817-80-80-80-80 35.817-80 80 35.817 80 80 80z"/></svg>
        <p class="text-xs mx-1">{{$student->city->name}}</p>
    </div>

    <div class="flex  justify-start items-center my-2">
        <svg aria-hidden="true" data-prefix="fas" data-icon="graduation-cap" class="h-4 svg-inline--fa fa-graduation-cap fa-w-20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"><path fill="currentColor" d="M622.34 153.2 343.4 67.5c-15.2-4.67-31.6-4.67-46.79 0L17.66 153.2c-23.54 7.23-23.54 38.36 0 45.59l48.63 14.94c-10.67 13.19-17.23 29.28-17.88 46.9C38.78 266.15 32 276.11 32 288c0 10.78 5.68 19.85 13.86 25.65L20.33 428.53C18.11 438.52 25.71 448 35.94 448h56.11c10.24 0 17.84-9.48 15.62-19.47L82.14 313.65C90.32 307.85 96 298.78 96 288c0-11.57-6.47-21.25-15.66-26.87.76-15.02 8.44-28.3 20.69-36.72L296.6 284.5c9.06 2.78 26.44 6.25 46.79 0l278.95-85.7c23.55-7.24 23.55-38.36 0-45.6zM352.79 315.09c-28.53 8.76-52.84 3.92-65.59 0l-145.02-44.55L128 384c0 35.35 85.96 64 192 64s192-28.65 192-64l-14.18-113.47-145.03 44.56z"/></svg>
        <p class="text-xs mx-1">{{$student->experience}}</p>
    </div>
    <div>
        <h1 class="font-semibold text-2xl my-10" >{{$student->title}}</h1>
    </div>

    <div class="container flex mt-10 text-gray-600 text-xs">
        <div class="content w-8/12"
            x-data="{ width: '50' }"
            x-init="$watch('width', value => { if (value > 100) { width = 100 } if (value == 0) { width = 10 } })">
             <!-- Start Regular with text version -->
             <div
             class="bg-blue-200 rounded-full h-5 my-5"
             role="progressbar"
             :aria-valuenow="width"
             aria-valuemin="0"
             aria-valuemax="100"
             >
             <div
                 class="bg-main-blue rounded-full h-5 text-center text-white text-sm transition "
                 :style="`width: ${width}%; transition: width 2s;`"
                 x-text="`${width}% perfil completado`"
                 >
             </div>
         </div>
         <!-- End Regular with text version -->

            <div x-data="setup()">
                <ul class="flex justify-start items-center text-xs">
                    <template x-for="(tab, index) in tabs" :key="index">
                        <li class="cursor-pointer bg-white rounded-full px-5 py-2 mx-5"
                            :class="activeTab===index ? 'text-white bg-main-blue ' : ''" @click="activeTab = index"
                            x-text="tab"></li>
                    </template>
                </ul>

                <div class="mx-auto bg-white my-5">
                    <div x-show="activeTab===0">@include('students.components.show.personal')</div>
                    <div x-show="activeTab===1">@include('students.components.show.education')</div>
                    <div x-show="activeTab===2">@include('students.components.show.experience')</div>
                    <div x-show="activeTab===3">Content 4</div>
                </div>
            </div>
        </div>
        <div class="aside w-4/12 text-sm">
            <div class="bg-white mx-5 mt-14 p-5">
                <p class="font-bold">Postuaciones</p>

                <div class="flex  justify-center items-center my-5 bg-lime text-white px-5 py-2 w-8/12 mx-auto rounded-full">
                    <p class="bg-white text-gray-700 rounded-full px-1 mx-2 ">{{count($postulations->byStatus('new'))}}</p><p class="font-semibold">Activas</p>
                </div>
                <div class="flex  justify-center items-center my-5 bg-red-500 text-white px-5 py-2 w-8/12 mx-auto rounded-full">
                    <p class="bg-white text-gray-700 rounded-full px-1 mx-2 ">{{count($postulations->byStatus('rejected'))}}</p><p class="font-semibold">Rechazadas</p>
                </div>
            </div>

            <a href="{{route('students.edit',$student)}}" class="flex items-center w-10/12 mx-auto justify-center text-center bg-main-blue text-white m-5 rounded-full py-2">
                Editar Perfil
            </a>
            {{-- <form action="{{route('students.edit',$student)}}" method="POST">
                @csrf

                <input type="hidden" value="final" name="status">
                <button type="submit" class="flex items-center w-10/12 mx-auto justify-center text-center bg-main-blue text-white m-5 rounded-full py-2">
                    <p class="font-semibold">Editar Perfil</p>
                    <svg aria-hidden="true" data-prefix="fas" data-icon="arrow-up" class="h-4 svg-inline--fa fa-arrow-up fa-w-14" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="m34.9 289.5-22.2-22.2c-9.4-9.4-9.4-24.6 0-33.9L207 39c9.4-9.4 24.6-9.4 33.9 0l194.3 194.3c9.4 9.4 9.4 24.6 0 33.9L413 289.4c-9.5 9.5-25 9.3-34.3-.4L264 168.6V456c0 13.3-10.7 24-24 24h-32c-13.3 0-24-10.7-24-24V168.6L69.2 289.1c-9.3 9.8-24.8 10-34.3.4z"/></svg>

                </button>


            </form> --}}


        </div>
    </div>
</div>

@push('scripts')
<script>
	function setup() {
    return {
      activeTab: 0,
      tabs: [
          "Perfil",
          "Educacion",
          "Experiencia",
          "Psicometrico",
      ]
    };
  };
</script>
@endpush
@endsection
