<form wire:submit.prevent="submit" method="POST">

    <div class="row flex flex-wrap ">
        <div class="px-5 py-5 w-6/12">
            <label for="" class="text-base text-main-blue block font-semibold px-5">Compañía / Institución</label>
            <input wire:model="company"  class="rounded-full border border-gray-200 text-base w-full px-5 @error('company') border-red-500 @enderror" type="text" placeholder="Nombre"  name="company" id="company" value="{{ old('company')}}">
            @error('company')<span class="text-xs text-red-500 ">{{ $message }}</span>@enderror
        </div>
        <div class="px-5 py-5 w-6/12">
            <label for="" class="text-base text-main-blue block font-semibold px-5">Puesto / Rol</label>
            <input wire:model="position" class="rounded-full border border-gray-200 text-base w-full px-5 @error('position') border-red-500 @enderror" type="text" placeholder="Apellido"  name="position" id="position" value="{{ old('position')}}">
            @error('position')<span class="text-xs text-red-500 ">{{ $message }}</span>@enderror
        </div>
    </div>

    <div class="row flex flex-wrap">
        <div class="px-5 py-5 w-6/12">
            <label for="" class="text-base text-main-blue block font-semibold px-5">Fecha de inicio</label>
            <input wire:model="started_at" class="rounded-full border border-gray-200 text-base w-full px-5 @error('started_at') border-red-500 @enderror" type="date" name="started_at" id="started_at" value="{{ old('started_at') }}">
            @error('started_at')<span class="text-xs text-red-500 ">{{ $message }}</span>@enderror
        </div>
        <div class="px-5 py-5 w-6/12">
            <label for="" class="text-base text-main-blue block font-semibold px-5">Fecha de fin</label>
            <input wire:model="end_at" class="rounded-full border border-gray-200 text-base w-full px-5 @error('end_at') border-red-500 @enderror" type="date" name="end_at" id="end_at" value="{{ old('end_at') }}">
            @error('end_at')<span class="text-xs text-red-500 ">{{ $message }}</span>@enderror
        </div>
    </div>

    <div class="row flex flex-wrap">
        <div class="px-5 py-5 w-6/12">
            <label for="" class="text-base text-main-blue block font-semibold px-5">Ciudad</label>
            <select  wire:model="city_id" class="rounded-full border border-gray-200 text-base w-full px-5 focus:outline-none" name="city_id" id="">
                @foreach ($cities as $city)
                    <option value="{{$city->id}}">{{$city->name}}</option>
                @endforeach
            </select>
        </div>


        <div class="px-5 py-5 w-6/12">
            <label for="" class="text-base text-main-blue block font-semibold px-5">Trabajo actual</label>
            <div class="px-2 flex items-start my-5">
                <input  wire:model="actual" type="checkbox" name="actual" class="rounded-sm border-gray-200 mt-1 focus:outline-none">
                <label class="block font-semibold text-gray-400 m-1">Es mi trabajo actual</label>
            </div>
        </div>
    </div>

    <div class="row px-5 py-5">
        <label for="" class="text-base text-main-blue block font-semibold px-5">Breve descripción</label>
        <textarea  wire:model="description" class="border border-gray-200 text-base w-full px-5 focus:outline-none @error('description') border-red-500 @enderror" name="description" id="" cols="30" rows="5" placeholder="Breve descripcion ">

        </textarea>
        @error('description')<span class="text-xs text-red-500 ">{{$message}}</span>@enderror
    </div>

    <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
        <button type="submit" class="text-main-blue text-sm ">
            Agregar Nuevo
        </button>
    </div>

</form>
