@extends('layouts.main')

@section('content')

<div class="w-10/12 mx-auto text-sm bg-white">


    <div class="title">
        <div class="text-center text-white bg-main-blue">
            <h1 class="py-5 text-2xl font-medium">Crear <span class="font-semibold">reclutador</span></h1>
            <p class="w-6/12 py-5 mx-auto text-sm">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam dolor enim, lacinia et sem et, rhoncus pharetra orci.</p>
        </div>

        <form action="{{route('recruiters.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            {{-- <div x-data="{ show: false }" class="flex items-center ">
                <div class="flex items-start w-3/12 px-2 my-5">
                    <input type="checkbox" name="belong_enterprise" @click="show = !show" class="mt-1 border-gray-200 rounded-sm focus:outline-none">
                    <label class="block mx-2 font-semibold text-gray-400">Pertenece a una empresa?</label>
                </div>

                <select  x-show="show" class="w-full border border-gray-200 rounded-full focus:outline-none"
                        name="enterprise_id" id="">

                    <option value="0">Seleccione una opcion</option>
                    @foreach ($enterprises as $enterprise)
                        <option value="{{$enterprise->id}}">{{$enterprise->name}}</option>
                    @endforeach
                </select>

                <button x-show="!show"  onclick="Livewire.emit('openModal', 'store-enterprise')" class="px-5 py-2 font-semibold text-white rounded-full bg-main-blue" >Agregar su empresa</button>

            </div> --}}
            @livewire('select-enterprise')
            <div class="flex flex-wrap row">
                <div class="w-6/12 px-10 py-5">
                    <label for="" class="block px-5 font-semibold text-main-blue">Nombre</label>
                    <input class="rounded-full border border-gray-200 w-full px-5
                        @error('first_name') border-red-500 @enderror" type="text"  name="first_name" id="first_name" value="{{ old('first_name') }}">
                       <span class="text-sm text-red-500 bg-white "> @error('first_name'){{ $message }}@enderror</span>
                </div>

                <div class="w-6/12 px-10 py-5">
                    <label for="" class="block px-5 font-semibold text-main-blue">Apellido</label>
                    <input class="rounded-full border border-gray-200 w-full px-5
                        @error('last_name') border-red-500 @enderror" type="text"  name="last_name" id="last_name" value="{{ old('last_name') }}">
                        <span class="text-sm text-red-500 bg-white ">@error('last_name'){{ $message }}@enderror</span>
                </div>
            </div>

            <div class="flex flex-wrap row">
                <div class="w-6/12 px-10 py-5">
                    <label for="" class="block px-5 font-semibold text-main-blue">Telefono</label>
                    <input class="rounded-full border border-gray-200 w-full px-5
                        @error('phone') border-red-500 @enderror" type="text" no"  name="phone" id="phone" value="{{ old('phone') }}">
                       <span class="text-sm text-red-500 bg-white "> @error('phone'){{ $message }}@enderror</span>
                </div>

                <div class="w-6/12 px-10 py-5">
                    <label
                    class="flex flex-col items-center w-64 px-4 py-6 tracking-wide uppercase transition-all duration-150 ease-linear bg-white border rounded-md shadow-md cursor-pointer border-blue hover:bg-main-blue hover:text-white text-main-blue">
                    <svg aria-hidden="true" data-prefix="fas" data-icon="cloud-upload-alt" class="h-6 svg-inline--fa fa-cloud-upload-alt fa-w-20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"><path fill="currentColor" d="M537.6 226.6c4.1-10.7 6.4-22.4 6.4-34.6 0-53-43-96-96-96-19.7 0-38.1 6-53.3 16.2C367 64.2 315.3 32 256 32c-88.4 0-160 71.6-160 160 0 2.7.1 5.4.2 8.1C40.2 219.8 0 273.2 0 336c0 79.5 64.5 144 144 144h368c70.7 0 128-57.3 128-128 0-61.9-44-113.6-102.4-125.4zM393.4 288H328v112c0 8.8-7.2 16-16 16h-48c-8.8 0-16-7.2-16-16V288h-65.4c-14.3 0-21.4-17.2-11.3-27.3l105.4-105.4c6.2-6.2 16.4-6.2 22.6 0l105.4 105.4c10.1 10.1 2.9 27.3-11.3 27.3z"/></svg>
                    <span class="mt-2 leading-normal">Select a file</span>
                    <input type='file' class="hidden" name="avatar" />
                  </label>
                </div>
            </div>

            <div class="flex flex-wrap row">
                <div class="w-6/12 px-10 py-5">
                    <label for="" class="block px-5 font-semibold text-main-blue">Calle</label>
                    <input class="rounded-full border border-gray-200 w-full px-5
                        @error('street_name') border-red-500 @enderror" type="text"   name="street_name" id="street_name" value="{{ old('street_name') }}">
                   <span class="text-sm text-red-500 bg-white "> @error('street_name'){{ $message }}@enderror</span>
                </div>

                <div class="w-2/12 px-10 py-5">
                    <label for="" class="block px-5 font-semibold text-main-blue">Altura</label>
                    <input class="rounded-full border border-gray-200 w-full px-5
                        @error('street_number') border-red-500 @enderror" type="text"   name="street_number" id="street_number" value="{{ old('street_number') }}">
                   <span class="text-sm text-red-500 bg-white "> @error('street_number'){{ $message }}@enderror</span>
                </div>
                <div class="w-4/12 px-10 py-5">
                    <label for="" class="block px-5 font-semibold text-main-blue">Ciudad</label>
                    <select class="w-full px-5 text-sm bg-white border border-gray-200 rounded-full focus:outline-none" name="city_id" id="">
                        @foreach ($cities as $city)
                            <option class="text-sm bg-white" value="{{$city->id}}">{{$city->name}}</option>
                        @endforeach
                    </select>
                    <span class="text-sm text-red-500 bg-white "> @error('city_id'){{ $message }}@enderror</span>
                </div>
            </div>


            <div class="flex justify-center">
                <button type="submit" class="px-5 py-2 font-semibold text-white rounded-full bg-main-blue">Siguiente</button>
            </div>

        </form>
    </div>

</div>
@endsection
