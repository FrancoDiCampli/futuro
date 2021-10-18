@extends('layouts.main')

@section('content')

<div class="w-10/12 mx-auto text-gray-700">

    <a class="text-xs font-semibold text-main-blue" href="">Regresar</a>
    <img class="h-24 my-5 rounded-full shadow-md" src="{{asset('assets/001 - Home/foto-eduardo.png')}}" alt="">
    <h1 class="text-2xl text-main-blue">{{$postulation->student->first_name}} {{$postulation->student->last_name}}</h1>

    <div class="flex items-center justify-start my-2">
        <svg aria-hidden="true" data-prefix="fas" data-icon="calendar-alt" class="h-4 svg-inline--fa fa-calendar-alt fa-w-14" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M0 464c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48V192H0v272zm320-196c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40c0 6.6-5.4 12-12 12h-40c-6.6 0-12-5.4-12-12v-40zm0 128c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40c0 6.6-5.4 12-12 12h-40c-6.6 0-12-5.4-12-12v-40zM192 268c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40c0 6.6-5.4 12-12 12h-40c-6.6 0-12-5.4-12-12v-40zm0 128c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40c0 6.6-5.4 12-12 12h-40c-6.6 0-12-5.4-12-12v-40zM64 268c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40c0 6.6-5.4 12-12 12H76c-6.6 0-12-5.4-12-12v-40zm0 128c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40c0 6.6-5.4 12-12 12H76c-6.6 0-12-5.4-12-12v-40zM400 64h-48V16c0-8.8-7.2-16-16-16h-32c-8.8 0-16 7.2-16 16v48H160V16c0-8.8-7.2-16-16-16h-32c-8.8 0-16 7.2-16 16v48H48C21.5 64 0 85.5 0 112v48h448v-48c0-26.5-21.5-48-48-48z"/></svg>
        <p class="mx-1 text-xs">{{$postulation->student->birthdate->format('d M Y')}}</p>
    </div>
    <div class="flex items-center justify-start my-2">
        <svg aria-hidden="true" data-prefix="fas" data-icon="map-marker-alt" class="h-4 svg-inline--fa fa-map-marker-alt fa-w-12" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"><path fill="currentColor" d="M172.268 501.67C26.97 291.031 0 269.413 0 192 0 85.961 85.961 0 192 0s192 85.961 192 192c0 77.413-26.97 99.031-172.268 309.67-9.535 13.774-29.93 13.773-39.464 0zM192 272c44.183 0 80-35.817 80-80s-35.817-80-80-80-80 35.817-80 80 35.817 80 80 80z"/></svg>
        <p class="mx-1 text-xs">{{$postulation->student->city->name}}</p>
    </div>

    <div class="flex items-center justify-start my-2">
        <svg aria-hidden="true" data-prefix="fas" data-icon="graduation-cap" class="h-4 svg-inline--fa fa-graduation-cap fa-w-20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"><path fill="currentColor" d="M622.34 153.2 343.4 67.5c-15.2-4.67-31.6-4.67-46.79 0L17.66 153.2c-23.54 7.23-23.54 38.36 0 45.59l48.63 14.94c-10.67 13.19-17.23 29.28-17.88 46.9C38.78 266.15 32 276.11 32 288c0 10.78 5.68 19.85 13.86 25.65L20.33 428.53C18.11 438.52 25.71 448 35.94 448h56.11c10.24 0 17.84-9.48 15.62-19.47L82.14 313.65C90.32 307.85 96 298.78 96 288c0-11.57-6.47-21.25-15.66-26.87.76-15.02 8.44-28.3 20.69-36.72L296.6 284.5c9.06 2.78 26.44 6.25 46.79 0l278.95-85.7c23.55-7.24 23.55-38.36 0-45.6zM352.79 315.09c-28.53 8.76-52.84 3.92-65.59 0l-145.02-44.55L128 384c0 35.35 85.96 64 192 64s192-28.65 192-64l-14.18-113.47-145.03 44.56z"/></svg>
        <p class="mx-1 text-xs">{{$postulation->student->experience}}</p>
    </div>
    <div>
        <h1 class="my-10 text-2xl font-semibold" >{{$postulation->student->title}}</h1>
    </div>

    <div class="container flex mt-10 text-xs text-gray-600">
        <div class="w-8/12 content">
            <div x-data="setup()">
                <ul class="flex items-center justify-start text-xs">
                    <template x-for="(tab, index) in tabs" :key="index">
                        <li class="px-5 py-2 mx-5 bg-white rounded-full cursor-pointer"
                            :class="activeTab===index ? 'text-white bg-main-blue ' : ''" @click="activeTab = index"
                            x-text="tab"></li>
                    </template>
                </ul>

                <div class="mx-auto my-5 bg-white">
                    <div x-show="activeTab===0">@include('postulations.components.student')</div>
                    <div x-show="activeTab===1">@include('postulations.components.education')</div>
                    <div x-show="activeTab===2">Content 3</div>
                    <div x-show="activeTab===3">Content 4</div>
                </div>
            </div>
        </div>
        <div class="w-4/12 text-sm aside">
            <div class="p-5 mx-5 bg-white mt-14">
                <p class="font-bold">Contacto</p>
                <div class="flex items-center">
                    <svg aria-hidden="true" data-prefix="fas" data-icon="phone" class="h-4 svg-inline--fa fa-phone fa-w-16" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="m493.4 24.6-104-24c-11.3-2.6-22.9 3.3-27.5 13.9l-48 112c-4.2 9.8-1.4 21.3 6.9 28l60.6 49.6c-36 76.7-98.9 140.5-177.2 177.2l-49.6-60.6c-6.8-8.3-18.2-11.1-28-6.9l-112 48C3.9 366.5-2 378.1.6 389.4l24 104C27.1 504.2 36.7 512 48 512c256.1 0 464-207.5 464-464 0-11.2-7.7-20.9-18.6-23.4z"/></svg>
                    <p class="m-2">223123213</p>
                </div>
                <div class="flex items-center">
                    <svg aria-hidden="true" data-prefix="fas" data-icon="envelope" class="h-4 svg-inline--fa fa-envelope fa-w-16" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M502.3 190.8c3.9-3.1 9.7-.2 9.7 4.7V400c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V195.6c0-5 5.7-7.8 9.7-4.7 22.4 17.4 52.1 39.5 154.1 113.6 21.1 15.4 56.7 47.8 92.2 47.6 35.7.3 72-32.8 92.3-47.6 102-74.1 131.6-96.3 154-113.7zM256 320c23.2.4 56.6-29.2 73.4-41.4 132.7-96.3 142.8-104.7 173.4-128.7 5.8-4.5 9.2-11.5 9.2-18.9v-19c0-26.5-21.5-48-48-48H48C21.5 64 0 85.5 0 112v19c0 7.4 3.4 14.3 9.2 18.9 30.6 23.9 40.7 32.4 173.4 128.7 16.8 12.2 50.2 41.8 73.4 41.4z"/></svg>
                    <p class="m-2">juan@mail.com</p>
                </div>
            </div>
            <form action="{{route('update.postulation.status')}}" method="POST">
                @csrf
                <input type="hidden" value="{{$postulation->id}}" name="postulation">
                <input type="hidden" value="final" name="status">
                <button type="submit" class="flex items-center justify-center w-10/12 py-2 m-5 mx-auto text-center text-white rounded-full bg-main-blue">
                    <p class="font-semibold">Mover a finalistas</p>
                    <svg aria-hidden="true" data-prefix="fas" data-icon="arrow-up" class="h-4 svg-inline--fa fa-arrow-up fa-w-14" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="m34.9 289.5-22.2-22.2c-9.4-9.4-9.4-24.6 0-33.9L207 39c9.4-9.4 24.6-9.4 33.9 0l194.3 194.3c9.4 9.4 9.4 24.6 0 33.9L413 289.4c-9.5 9.5-25 9.3-34.3-.4L264 168.6V456c0 13.3-10.7 24-24 24h-32c-13.3 0-24-10.7-24-24V168.6L69.2 289.1c-9.3 9.8-24.8 10-34.3.4z"/></svg>

                </button>


            </form>
            <button  onclick='Livewire.emit("openModal", "store-note",{{ json_encode(["postulation" => $postulation->id]) }})' class="px-5 py-2 font-semibold text-white rounded-full bg-main-blue" >Agregar nota</button>
            <form action="{{route('update.postulation.status')}}" method="POST">
                @csrf
                <input type="hidden" value="{{$postulation->id}}" name="postulation">
                <input type="hidden" value="rejected" name="status">
                <button type="submit" class="flex items-center justify-center w-10/12 py-2 m-5 mx-auto text-center text-red-600 bg-white border border-red-500 rounded-full">
                    <p class="font-semibold">Descartar</p>

                </button>


            </form>

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
