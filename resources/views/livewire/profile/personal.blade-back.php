<div class="flex flex-wrap px-5 row">
    <div class="w-6/12 px-5 py-5">
        <label for="" class="block px-5 text-sm font-semibold text-main-blue">Nombre*</label>
        <input class="rounded-full border border-gray-200 text-sm w-full px-5 @error('first_name') border-red-500 @enderror"
            type="text" placeholder="Nombre"  name="first_name"
            wire:model.defer="first_name" >
       <span class="text-xs text-red-500 "> @error('first_name'){{ $message }}</span>@enderror
    </div>
    <div class="w-6/12 px-5 py-5">
        <label for="" class="block px-5 text-sm font-semibold text-main-blue">Apellido*</label>
        <input class="rounded-full border border-gray-200 text-sm w-full px-5 @error('last_name') border-red-500 @enderror"
            type="text" placeholder="Apellido"  name="last_name"
            wire:model.defer="last_name">
        <span class="text-xs text-red-500 ">@error('last_name'){{ $message }}</span>@enderror
    </div>
</div>


<div class="px-10 py-5 row">
    <label for="" class="block px-5 text-sm font-semibold text-main-blue">Titulo*</label>
    <input class="rounded-full border border-gray-200 text-sm w-full px-5 @error('title') border-red-500 @enderror"
        type="text" placeholder="Titulo"  name="title"
        wire:model.defer="title">
    <span class="text-xs text-red-500 ">@error('title'){{ $message }}</span>@enderror
</div>

<div class="px-10 py-5 row">
    <label for="" class="block px-5 text-sm font-semibold text-main-blue">Discuro</label>
    <textarea class="border border-gray-200 text-sm w-full px-5 focus:outline-none @error('speech') border-red-500 @enderror"
        name="speech" wire:model.defer="speech" cols="30" rows="5" >

    </textarea>
    <span class="text-xs text-red-500 ">@error('speech'){{$message}}</span>@enderror

</div>

<div class="flex flex-wrap row">

    <div class="w-6/12 px-10 py-5">
        <label for="" class="block px-5 text-sm font-semibold text-main-blue">Estado</label>
        <select class="w-full px-5 text-sm border border-gray-200 rounded-full focus:outline-none"
            name="state_id" wire-model.defer="state_id">
            @foreach ($states as $state)
                <option value="{{$state->id}}">{{$state->name}}</option>
            @endforeach
        </select>
    </div>

    <div class="w-6/12 px-10 py-5">
        <label for="" class="block px-5 text-sm font-semibold text-main-blue">Ciudad</label>
        <select class="w-full px-5 text-sm border border-gray-200 rounded-full focus:outline-none"
            name="city_id" id="">
            @foreach (Config::get('locations.states') as $city)
                <option value="{{$city}}">{{$city}}</option>
            @endforeach
        </select>
    </div>
</div>

{{-- Disponibilidad horario preferencia --}}
<div class="flex flex-wrap row">
    <div class="w-6/12 px-10 py-5">
        <label for="" class="block px-5 text-sm font-semibold text-main-blue">Disponibilidad</label>
        <select class="w-full px-5 text-sm border border-gray-200 rounded-full focus:outline-none"
            name="available" wire:model.defer='available' id="">
            <option value="Tiempo completo"> Tiempo completo </option>
            <option value="Medio tiempo" > Medio tiempo </option>

        </select>
    </div>
    <div class="w-6/12 px-10 py-5">
        <label for="" class="block px-5 text-sm font-semibold text-main-blue">Horario de preferiencia</label>
        <select class="w-full px-5 text-sm border border-gray-200 rounded-full focus:outline-none"
            name="preference" id="" wire:model='preference'>
            <option value="Mañana" > Mañana </option>
            <option value="Tarde"> Tarde </option>
            <option value="Sin preferencia"> Sin preferencia </option>


        </select>
    </div>
</div>
{{-- Fecha de nacimiento --}}
<div class="flex flex-wrap row">
    <div class="w-6/12 px-10 py-5">
        <label for="" class="block px-5 text-sm font-semibold text-main-blue">Fecha de Nacimiento*</label>
        <input class="rounded-full border border-gray-200 text-sm w-full px-5 @error('birthdate') border-red-500 @enderror"
            type="date" name="birthdate" id="birthdate" wire:model.defer='birthdate'>
       <span class="text-xs text-red-500 "> @error('birthdate'){{ $message }}</span>@enderror
    </div>

    <div class="w-6/12 px-10 py-5">
        <label for="" class="block px-5 text-sm font-semibold text-main-blue">Sitio web</label>
        <input class="rounded-full border border-gray-200 text-sm w-full px-5 @error('website') border-red-500 @enderror"
            type="text" wire:model.defer='website' placeholder="Sitio web"  name="website" id="website"
        >
        <span class="text-xs text-red-500 ">@error('website'){{ $message }}</span>@enderror
    </div>

</div>

<div class="px-10 py-5 row">
    <label for="" class="block px-5 text-sm font-semibold text-main-blue">Hobbies</label>
    <textarea class="border border-gray-200 text-sm w-full px-5 focus:outline-none @error('hobbies') border-red-500 @enderror"
        name="hobbies" wire:model.defer='hobbies' id="" cols="30" rows="5" placeholder="Hobbies">

    </textarea>
    <span class="text-xs text-red-500 ">@error('hobbies'){{$message}}</span>@enderror

</div>
{{-- Sitio web y avatar  --}}
<div class="flex flex-wrap row">

    <div class="w-6/12 px-10 py-5 ">
        @if (user()->photo)
            <img src="{{asset('storage/'.user()->photo->path)}}" alt="" class="h-24 mx-auto">
        @else
            <img src="{{asset('storage/avatar/user.png')}}" alt="" class="h-24 mx-auto">
        @endif
        <label
        class="flex flex-col items-center w-64 px-4 py-6 tracking-wide uppercase transition-all duration-150 ease-linear bg-white border rounded-md shadow-md cursor-pointer border-blue hover:bg-main-blue hover:text-white text-main-blue">
        <svg aria-hidden="true" data-prefix="fas" data-icon="cloud-upload-alt" class="h-6 svg-inline--fa fa-cloud-upload-alt fa-w-20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"><path fill="currentColor" d="M537.6 226.6c4.1-10.7 6.4-22.4 6.4-34.6 0-53-43-96-96-96-19.7 0-38.1 6-53.3 16.2C367 64.2 315.3 32 256 32c-88.4 0-160 71.6-160 160 0 2.7.1 5.4.2 8.1C40.2 219.8 0 273.2 0 336c0 79.5 64.5 144 144 144h368c70.7 0 128-57.3 128-128 0-61.9-44-113.6-102.4-125.4zM393.4 288H328v112c0 8.8-7.2 16-16 16h-48c-8.8 0-16-7.2-16-16V288h-65.4c-14.3 0-21.4-17.2-11.3-27.3l105.4-105.4c6.2-6.2 16.4-6.2 22.6 0l105.4 105.4c10.1 10.1 2.9 27.3-11.3 27.3z"/></svg>
        <span class="mt-2 text-sm leading-normal">Select a file</span>
        <input type='file' class="hidden" name="avatar" />
      </label>
    </div>
</div>
