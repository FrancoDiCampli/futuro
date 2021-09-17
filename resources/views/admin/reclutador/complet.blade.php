@extends('layouts.main')

@section('content')

<div class="w-10/12 mx-auto">


    <div class="title">
        <div class="bg-main-blue text-white text-center">
            <h1 class="text-2xl font-medium py-5">Crear <span class="font-semibold">reclutador</span></h1>
            <p class="text-sm w-6/12 mx-auto py-5">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam dolor enim, lacinia et sem et, rhoncus pharetra orci.</p>
        </div>

        <form action="{{route('recruiters.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div x-data="{ show: false }" class="">
                <div class="w-3/12 px-2 flex items-start my-5">
                    <input type="checkbox"  @click="show = !show" class="rounded-sm border-gray-200 mt-1 focus:outline-none">
                    <label class="block font-semibold text-gray-400 mx-2">Pertenece a una empresa?</label>
                </div>

                <select class="rounded-full border border-gray-200 text-base w-full focus:outline-none"
                        name="enterprise_id" id="">
                    @foreach ($enterprises as $enterprise)
                        <option value="{{$enterprise->id}}">{{$enterprise->name}}</option>
                    @endforeach
                </select>

                <button x-show="!show"  onclick="Livewire.emit('openModal', 'store-enterprise')" class="bg-main-blue text-white font-semibold px-5 py-2 rounded-full" >Agregar su empresa</button>

            </div>
            <div class="row flex flex-wrap">
                <select class="rounded-full border border-gray-200 text-base w-full focus:outline-none"
                    name="enterprise_id" id="">
                    @foreach ($enterprises as $enterprise)
                        <option value="{{$enterprise->id}}">{{$enterprise->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="row flex flex-wrap">
                <div class="px-10 py-5 w-6/12">
                    <label for="" class="text-base text-main-blue block font-semibold px-5">Nombre</label>
                    <input class="rounded-full border border-gray-200 text-base w-full px-5
                        @error('first_name') border-red-500 @enderror" type="text" placeholder="Nombres"  name="first_name" id="first_name" value="{{ old('first_name') }}">
                        @error('first_name')<span class="text-xs text-red-500 ">{{ $message }}</span>@enderror
                </div>

                <div class="px-10 py-5 w-6/12">
                    <label for="" class="text-base text-main-blue block font-semibold px-5">Apellido</label>
                    <input class="rounded-full border border-gray-200 text-base w-full px-5
                        @error('last_name') border-red-500 @enderror" type="text" placeholder="Nombres"  name="last_name" id="last_name" value="{{ old('last_name') }}">
                        @error('last_name')<span class="text-xs text-red-500 ">{{ $message }}</span>@enderror
                </div>
            </div>

            <div class="row flex flex-wrap">
                <div class="px-10 py-5 w-6/12">
                    <label for="" class="text-base text-main-blue block font-semibold px-5">Telefono</label>
                    <input class="rounded-full border border-gray-200 text-base w-full px-5
                        @error('phone') border-red-500 @enderror" type="text" placeholder="Telefono"  name="phone" id="phone" value="{{ old('phone') }}">
                        @error('phone')<span class="text-xs text-red-500 ">{{ $message }}</span>@enderror
                </div>

                <div class="px-10 py-5 w-6/12">
                    <label
                    class="w-64 flex flex-col items-center px-4 py-6 bg-white rounded-md shadow-md tracking-wide uppercase border border-blue cursor-pointer hover:bg-main-blue hover:text-white text-main-blue ease-linear transition-all duration-150">
                    <svg aria-hidden="true" data-prefix="fas" data-icon="cloud-upload-alt" class="h-6 svg-inline--fa fa-cloud-upload-alt fa-w-20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"><path fill="currentColor" d="M537.6 226.6c4.1-10.7 6.4-22.4 6.4-34.6 0-53-43-96-96-96-19.7 0-38.1 6-53.3 16.2C367 64.2 315.3 32 256 32c-88.4 0-160 71.6-160 160 0 2.7.1 5.4.2 8.1C40.2 219.8 0 273.2 0 336c0 79.5 64.5 144 144 144h368c70.7 0 128-57.3 128-128 0-61.9-44-113.6-102.4-125.4zM393.4 288H328v112c0 8.8-7.2 16-16 16h-48c-8.8 0-16-7.2-16-16V288h-65.4c-14.3 0-21.4-17.2-11.3-27.3l105.4-105.4c6.2-6.2 16.4-6.2 22.6 0l105.4 105.4c10.1 10.1 2.9 27.3-11.3 27.3z"/></svg>
                    <span class="mt-2 text-base leading-normal">Select a file</span>
                    <input type='file' class="hidden" name="avatar" />
                  </label>
                </div>
            </div>

            <div class="flex justify-center">
                <button type="submit" class="bg-main-blue text-white font-semibold px-5 py-2 rounded-full">Siguiente</button>
            </div>

        </form>
    </div>

</div>
@endsection
