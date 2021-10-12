<div class="">
    @foreach ($student->experiences as $experience)


    <div class="p-5 paragraph">
        <p class="text-lg font-medium text-main-blue">{{$experience->company}}</p>
        <p class="text-lg">{{$experience->position}}</p>
        <div class="flex items-center justify-start my-2">
            <svg aria-hidden="true" data-prefix="fas" data-icon="map-marker-alt" class="h-4 svg-inline--fa fa-map-marker-alt fa-w-12" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"><path fill="currentColor" d="M172.268 501.67C26.97 291.031 0 269.413 0 192 0 85.961 85.961 0 192 0s192 85.961 192 192c0 77.413-26.97 99.031-172.268 309.67-9.535 13.774-29.93 13.773-39.464 0zM192 272c44.183 0 80-35.817 80-80s-35.817-80-80-80-80 35.817-80 80 35.817 80 80 80z"/></svg>
            <p class="mx-1 text-xs">{{$experience->city->name}}</p>
        </div>
        <div class="flex items-center justify-start my-2 text-xs">
            <svg aria-hidden="true" data-prefix="fas" data-icon="calendar-alt" class="h-4 svg-inline--fa fa-calendar-alt fa-w-14" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M0 464c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48V192H0v272zm320-196c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40c0 6.6-5.4 12-12 12h-40c-6.6 0-12-5.4-12-12v-40zm0 128c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40c0 6.6-5.4 12-12 12h-40c-6.6 0-12-5.4-12-12v-40zM192 268c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40c0 6.6-5.4 12-12 12h-40c-6.6 0-12-5.4-12-12v-40zm0 128c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40c0 6.6-5.4 12-12 12h-40c-6.6 0-12-5.4-12-12v-40zM64 268c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40c0 6.6-5.4 12-12 12H76c-6.6 0-12-5.4-12-12v-40zm0 128c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40c0 6.6-5.4 12-12 12H76c-6.6 0-12-5.4-12-12v-40zM400 64h-48V16c0-8.8-7.2-16-16-16h-32c-8.8 0-16 7.2-16 16v48H160V16c0-8.8-7.2-16-16-16h-32c-8.8 0-16 7.2-16 16v48H48C21.5 64 0 85.5 0 112v48h448v-48c0-26.5-21.5-48-48-48z"/></svg>
            {{-- <p class="mx-1">{{$vacancy->expired_at->format('d-m-Y')}}</p> --}}
            <p class="mx-1">{{$experience->started_at}}-{{$experience->end_at}}</p>
        </div>
        <p class="my-5">{{$experience->description}}</p>
    </div>
    <hr class="w-11/12 mx-auto">
    @endforeach



{{$msg}}


    <div class="flex flex-wrap row ">
        <div class="w-6/12 px-5 py-5">
            <label for="" class="block px-5 text-base font-semibold text-main-blue">Compañía / Institución</label>
            <input wire:model="company"  class="rounded-full border border-gray-200 text-base w-full px-5 @error('company') border-red-500 @enderror"
                type="text" placeholder="Nombre"  name="company" id="company" >
           <span class="text-xs text-red-500 "> @error('company'){{ $message }}@enderror</span>
        </div>
        <div class="w-6/12 px-5 py-5">
            <label for="" class="block px-5 text-base font-semibold text-main-blue">Puesto / Rol</label>
            <input wire:model="position" class="rounded-full border border-gray-200 text-base w-full px-5 @error('position') border-red-500 @enderror"
                type="text" placeholder="Apellido"  name="position" id="position">
            <span class="text-xs text-red-500 ">@error('position'){{ $message }}@enderror</span>
        </div>
    </div>

    <div class="flex flex-wrap row">
        <div class="w-6/12 px-5 py-5">
            <label for="" class="block px-5 text-base font-semibold text-main-blue">Fecha de inicio</label>
            <input wire:model="started_at" class="rounded-full border border-gray-200 text-base w-full px-5 @error('started_at') border-red-500 @enderror"
                type="date" name="started_at" id="started_at">
            <span class="text-xs text-red-500 ">@error('started_at'){{ $message }}@enderror</span>
        </div>
        <div class="w-6/12 px-5 py-5">
            <label for="" class="block px-5 text-base font-semibold text-main-blue">Fecha de fin</label>
            <input wire:model="end_at" class="rounded-full border border-gray-200 text-base w-full px-5 @error('end_at') border-red-500 @enderror"
                type="date" name="end_at" id="end_at" >
            <span class="text-xs text-red-500 ">@error('end_at'){{ $message }}@enderror</span>
        </div>
    </div>

    <div class="flex flex-wrap row">
        <div class="w-6/12 px-5 py-5">
            <label for="" class="block px-5 text-base font-semibold text-main-blue">Ciudad</label>
            <select  wire:model="city_id" class="w-full px-5 text-base border border-gray-200 rounded-full focus:outline-none" name="city_id" id="">
                <option value="null">Seleccione una ciudad</option>
                @foreach ($cities as $city)
                    <option value="{{$city->id}}">{{$city->name}}</option>
                @endforeach
            </select>
            <span class="text-xs text-red-500 ">@error('city_id'){{ $message }}@enderror</span>
        </div>


        <div class="w-6/12 px-5 py-5">
            <label for="" class="block px-5 text-base font-semibold text-main-blue">Trabajo actual</label>
            <div class="flex items-start px-2 my-5">
                <input  wire:model="actual" type="checkbox" name="actual" class="mt-1 border-gray-200 rounded-sm focus:outline-none">
                <label class="block m-1 font-semibold text-gray-400">Es mi trabajo actual</label>
            </div>
        </div>
    </div>

    <div class="px-5 py-5 row">
        <label for="" class="block px-5 text-base font-semibold text-main-blue">Breve descripción</label>
        <textarea  wire:model="description" class="border border-gray-200 text-base w-full px-5 focus:outline-none @error('description') border-red-500 @enderror"
        name="description" id="" cols="30" rows="5" placeholder="Breve descripcion ">

        </textarea>
        <span class="text-xs text-red-500 ">@error('description'){{$message}}@enderror</span>
    </div>

    <div class="px-4 py-3 text-right bg-gray-50 sm:px-6">
        <button wire:click="submit" type="button" class="text-sm text-main-blue ">
            Agregar Nuevo
        </button>
    </div>


</div>
