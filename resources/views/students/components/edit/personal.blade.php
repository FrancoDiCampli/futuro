<form action="{{route('update.student.profile',$student)}}" method="POST">
    @method('PUT')
    @csrf

<div class="flex flex-wrap px-5 row">
    <div class="w-6/12 px-5 py-5">
        <label for="" class="block px-5 text-base font-semibold text-main-blue">Nombre</label>
        <input class="rounded-full border border-gray-200 text-base w-full px-5 @error('first_name') border-red-500 @enderror" type="text" placeholder="Nombre"  name="first_name" id="first_name" value="{{ $student->first_name}}">
        @error('first_name')<span class="text-xs text-red-500 ">{{ $message }}</span>@enderror
    </div>
    <div class="w-6/12 px-5 py-5">
        <label for="" class="block px-5 text-base font-semibold text-main-blue">Apellido</label>
        <input class="rounded-full border border-gray-200 text-base w-full px-5 @error('last_name') border-red-500 @enderror" type="text" placeholder="Apellido"  name="last_name" id="last_name" value="{{ $student->last_name}}">
        @error('last_name')<span class="text-xs text-red-500 ">{{ $message }}</span>@enderror
    </div>
</div>


<div class="px-10 py-5 row">
    <label for="" class="block px-5 text-base font-semibold text-main-blue">Titulo</label>
    <input class="rounded-full border border-gray-200 text-base w-full px-5 @error('title') border-red-500 @enderror" type="text" placeholder="Titulo"  name="title" id="title" value="{{ $student->title}}">
    @error('title')<span class="text-xs text-red-500 ">{{ $message }}</span>@enderror
</div>

<div class="px-10 py-5 row">
    <label for="" class="block px-5 text-base font-semibold text-main-blue">Discuro</label>
    <textarea class="border border-gray-200 text-base w-full px-5 focus:outline-none @error('speech') border-red-500 @enderror"
        name="speech" id="" cols="30" rows="5" >
        {{ $student->speech}}
    </textarea>
    @error('speech')<span class="text-xs text-red-500 ">{{$message}}</span>@enderror

</div>

<div class="flex flex-wrap row">

    <div class="w-6/12 px-10 py-5">
        <label for="" class="block px-5 text-base font-semibold text-main-blue">Estado</label>
        <select class="w-full px-5 text-base border border-gray-200 rounded-full focus:outline-none" name="state_id" id="">
            @foreach ($states as $state)
                <option value="{{$state->id}}">{{$state->name}}</option>
            @endforeach
        </select>
    </div>

    <div class="w-6/12 px-10 py-5">
        <label for="" class="block px-5 text-base font-semibold text-main-blue">Ciudad</label>
        <select class="w-full px-5 text-base border border-gray-200 rounded-full focus:outline-none "
            name="city_id" id="">
                <option value="">Seleccione una ciudad</option>
            @foreach ($cities as $city)
                @if ($city->id == $student->city_id)

                <option value="{{$city->id}}" selected> {{$city->name}} </option>
                @else
                <option value="{{$city->id}}" > {{$city->name}} </option>

                @endif

            @endforeach
        </select>
        @error('city_id')<span class="text-xs text-red-500 ">{{$message}}</span>@enderror
    </div>
</div>

{{-- Disponibilidad horario preferencia --}}
<div class="flex flex-wrap row">
    <div class="w-6/12 px-10 py-5">
        <label for="" class="block px-5 text-base font-semibold text-main-blue">Disponibilidad</label>
        <select class="w-full px-5 text-base border border-gray-200 rounded-full focus:outline-none"
            name="available" id="">
            <option value="Tiempo completo" {{($student->available ==='Tiempo completo') ? 'selected' : ''}}> Tiempo completo </option>
            <option value="Medio tiempo" {{($student->available ==='Medio tiempo') ? 'selected' : ''}}> Medio tiempo </option>

        </select>
    </div>
    <div class="w-6/12 px-10 py-5">
        <label for="" class="block px-5 text-base font-semibold text-main-blue">Horario de preferiencia</label>
        <select class="w-full px-5 text-base border border-gray-200 rounded-full focus:outline-none"
            name="preference" id="">
            <option value="">Seleccione una opcion</option>
            <option value="Mañana" {{($student->preference ==='Mañana') ? 'selected' : ''}}> Mañana </option>
            <option value="Tarde" {{($student->preference ==='Tarde') ? 'selected' : ''}}> Tarde </option>
            <option value="Sin preferencia" {{($student->preference ==='Sin preferencia') ? 'selected' : ''}}> Sin preferencia </option>


        </select>
    </div>
</div>
{{-- Fecha de nacimiento --}}
<div class="flex flex-wrap row">
    <div class="w-6/12 px-10 py-5">
        <label for="" class="block px-5 text-base font-semibold text-main-blue">Fecha de Nacimiento</label>
        <input class="rounded-full border border-gray-200 text-base w-full px-5 @error('birthdate') border-red-500 @enderror" type="date" name="birthdate"
            id="birthdate" value="{{$student->birthdate ? $student->birthdate->format('Y-m-d') : null}}">

        @error('birthdate')<span class="text-xs text-red-500 ">{{ $message }}</span>@enderror
    </div>

    <div class="w-6/12 px-10 py-5">
        <label for="" class="block px-5 text-base font-semibold text-main-blue">Sitio web</label>
        <input class="rounded-full border border-gray-200 text-base w-full px-5 @error('website') border-red-500 @enderror" type="text" placeholder="Sitio web"  name="website" id="website" value="{{ $student->website }}">
        @error('website')<span class="text-xs text-red-500 ">{{ $message }}</span>@enderror
    </div>

</div>

<div class="px-10 py-5 row">
    <label for="" class="block px-5 text-base font-semibold text-main-blue">Hobbies</label>
    <textarea class="border border-gray-200 text-base w-full px-5 focus:outline-none @error('hobbies') border-red-500 @enderror" name="hobbies" id="" cols="30" rows="5" placeholder="Hobbies">
        {{ $student->hobbies}}
    </textarea>
    @error('hobbies')<span class="text-xs text-red-500 ">{{$message}}</span>@enderror

</div>
{{-- Sitio web y avatar  --}}
<div class="flex flex-wrap row">

    <div class="w-6/12 px-10 py-5 ">
        @if(isset(user()->photo->path) )
            <img class="h-12 rounded-full shadow-sm" src="{{asset('storage/'.user()->photo->path) }}" alt="user">
        @else
            <svg aria-hidden="true" data-prefix="fas" data-icon="user" class="h-20 mx-auto rounded-full shadow-sm svg-inline--fa fa-user fa-w-14" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M224 256c70.7 0 128-57.3 128-128S294.7 0 224 0 96 57.3 96 128s57.3 128 128 128zm89.6 32h-16.7c-22.2 10.2-46.9 16-72.9 16s-50.6-5.8-72.9-16h-16.7C60.2 288 0 348.2 0 422.4V464c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48v-41.6c0-74.2-60.2-134.4-134.4-134.4z"/></svg>
        @endif
        <label
        class="flex flex-col items-center w-64 px-4 py-6 tracking-wide uppercase transition-all duration-150 ease-linear bg-white border rounded-md shadow-md cursor-pointer border-blue hover:bg-main-blue hover:text-white text-main-blue">
        <svg aria-hidden="true" data-prefix="fas" data-icon="cloud-upload-alt" class="h-6 svg-inline--fa fa-cloud-upload-alt fa-w-20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"><path fill="currentColor" d="M537.6 226.6c4.1-10.7 6.4-22.4 6.4-34.6 0-53-43-96-96-96-19.7 0-38.1 6-53.3 16.2C367 64.2 315.3 32 256 32c-88.4 0-160 71.6-160 160 0 2.7.1 5.4.2 8.1C40.2 219.8 0 273.2 0 336c0 79.5 64.5 144 144 144h368c70.7 0 128-57.3 128-128 0-61.9-44-113.6-102.4-125.4zM393.4 288H328v112c0 8.8-7.2 16-16 16h-48c-8.8 0-16-7.2-16-16V288h-65.4c-14.3 0-21.4-17.2-11.3-27.3l105.4-105.4c6.2-6.2 16.4-6.2 22.6 0l105.4 105.4c10.1 10.1 2.9 27.3-11.3 27.3z"/></svg>
        <span class="mt-2 text-base leading-normal">Select a file</span>
        <input type='file' class="hidden" name="avatar" />
      </label>
    </div>
</div>
<div class="flex justify-center">

    <button type="submit" class="px-5 py-2 text-white rounded-full bg-main-blue">Guardar</button>
</div>
</form>
