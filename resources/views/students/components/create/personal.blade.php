<div class="row flex flex-wrap px-5">
    <div class="px-5 py-5 w-6/12">
        <label for="" class="text-sm text-main-blue block font-semibold px-5">Nombre*</label>
        <input class="rounded-full border border-gray-200 text-sm w-full px-5 @error('first_name') border-red-500 @enderror" type="text" placeholder="Nombre"  name="first_name" id="first_name" value="{{ old('first_name') }}">
        @error('first_name')<span class="text-xs text-red-500 ">{{ $message }}</span>@enderror
    </div>
    <div class="px-5 py-5 w-6/12">
        <label for="" class="text-sm text-main-blue block font-semibold px-5">Apellido*</label>
        <input class="rounded-full border border-gray-200 text-sm w-full px-5 @error('last_name') border-red-500 @enderror" type="text" placeholder="Apellido"  name="last_name" id="last_name" value="{{ old('last_name') }}">
        @error('last_name')<span class="text-xs text-red-500 ">{{ $message }}</span>@enderror
    </div>
</div>


<div class="row px-10 py-5">
    <label for="" class="text-sm text-main-blue block font-semibold px-5">Titulo*</label>
    <input class="rounded-full border border-gray-200 text-sm w-full px-5 @error('title') border-red-500 @enderror" type="text" placeholder="Titulo"  name="title" id="title" value="{{ old('title') }}">
    @error('title')<span class="text-xs text-red-500 ">{{ $message }}</span>@enderror
</div>

<div class="row px-10 py-5">
    <label for="" class="text-sm text-main-blue block font-semibold px-5">Discuro</label>
    <textarea class="border border-gray-200 text-sm w-full px-5 focus:outline-none @error('speech') border-red-500 @enderror" name="speech" id="" cols="30" rows="5" placeholder="¿Cómo es el candidato ideal para esta vacante?">
        {{ old('speech') }}
    </textarea>
    @error('speech')<span class="text-xs text-red-500 ">{{$message}}</span>@enderror

</div>

<div class="row flex flex-wrap">

    <div class="px-10 py-5 w-6/12">
        <label for="" class="text-sm text-main-blue block font-semibold px-5">Estado</label>
        <select class="rounded-full border border-gray-200 text-sm w-full px-5 focus:outline-none" name="state_id" id="">
            @foreach ($states as $state)
                <option value="{{$state->id}}">{{$state->name}}</option>
            @endforeach
        </select>
    </div>

    <div class="px-10 py-5 w-6/12">
        <label for="" class="text-sm text-main-blue block font-semibold px-5">Ciudad</label>
        <select class="rounded-full border border-gray-200 text-sm w-full px-5 focus:outline-none" name="city_id" id="">
            @foreach ($cities as $city)
                <option value="{{$city->id}}">{{$city->name}}</option>
            @endforeach
        </select>
    </div>
</div>

{{-- Disponibilidad horario preferencia --}}
<div class="row flex flex-wrap">
    <div class="px-10 py-5 w-6/12">
        <label for="" class="text-sm text-main-blue block font-semibold px-5">Disponibilidad</label>
        <select class="rounded-full border border-gray-200 text-sm w-full px-5 focus:outline-none"
            name="available" id="">
            <option value="Tiempo completo" {{( old('available')  ==='Tiempo completo') ? 'selected' : ''}}> Tiempo completo </option>
            <option value="Medio tiempo" {{(old('available')==='Medio tiempo') ? 'selected' : ''}}> Medio tiempo </option>

        </select>
    </div>
    <div class="px-10 py-5 w-6/12">
        <label for="" class="text-sm text-main-blue block font-semibold px-5">Horario de preferiencia</label>
        <select class="rounded-full border border-gray-200 text-sm w-full px-5 focus:outline-none"
            name="preference" id="">
            <option value="Mañana" {{( old('preference') ==='Mañana') ? 'selected' : ''}}> Mañana </option>
            <option value="Tarde" {{( old('preference') ==='Tarde') ? 'selected' : ''}}> Tarde </option>
            <option value="Sin preferencia" {{( old('preference') ==='Sin preferencia') ? 'selected' : ''}}> Sin preferencia </option>


        </select>
    </div>
</div>
{{-- Fecha de nacimiento --}}
<div class="row flex flex-wrap">
    <div class="px-10 py-5 w-6/12">
        <label for="" class="text-sm text-main-blue block font-semibold px-5">Fecha de Nacimiento*</label>
        <input class="rounded-full border border-gray-200 text-sm w-full px-5 @error('birthdate') border-red-500 @enderror" type="date" name="birthdate" id="birthdate" value="{{ old('birthdate', date('d-m-Y')) }}">
        @error('birthdate')<span class="text-xs text-red-500 ">{{ $message }}</span>@enderror
    </div>

    <div class="px-10 py-5 w-6/12">
        <label for="" class="text-sm text-main-blue block font-semibold px-5">Sitio web</label>
        <input class="rounded-full border border-gray-200 text-sm w-full px-5 @error('website') border-red-500 @enderror" type="text" placeholder="Sitio web"  name="website" id="website"
        value="{{ old('website') }}">
        @error('website')<span class="text-xs text-red-500 ">{{ $message }}</span>@enderror
    </div>

</div>

<div class="row px-10 py-5">
    <label for="" class="text-sm text-main-blue block font-semibold px-5">Hobbies</label>
    <textarea class="border border-gray-200 text-sm w-full px-5 focus:outline-none @error('hobbies') border-red-500 @enderror" name="hobbies" id="" cols="30" rows="5" placeholder="Hobbies">
        {{ old('hobbies') }}
    </textarea>
    @error('hobbies')<span class="text-xs text-red-500 ">{{$message}}</span>@enderror

</div>
{{-- Sitio web y avatar  --}}
<div class="row flex flex-wrap">

    <div class="px-10 py-5 w-6/12 ">
        @if (user()->photo)
            <img src="{{asset('storage/'.user()->photo->path)}}" alt="" class="h-24 mx-auto">
        @else
            <img src="{{asset('storage/avatar/user.png')}}" alt="" class="h-24 mx-auto">
        @endif
        <label
        class="w-64 flex flex-col items-center px-4 py-6 bg-white rounded-md shadow-md tracking-wide uppercase border border-blue cursor-pointer hover:bg-main-blue hover:text-white text-main-blue ease-linear transition-all duration-150">
        <svg aria-hidden="true" data-prefix="fas" data-icon="cloud-upload-alt" class="h-6 svg-inline--fa fa-cloud-upload-alt fa-w-20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"><path fill="currentColor" d="M537.6 226.6c4.1-10.7 6.4-22.4 6.4-34.6 0-53-43-96-96-96-19.7 0-38.1 6-53.3 16.2C367 64.2 315.3 32 256 32c-88.4 0-160 71.6-160 160 0 2.7.1 5.4.2 8.1C40.2 219.8 0 273.2 0 336c0 79.5 64.5 144 144 144h368c70.7 0 128-57.3 128-128 0-61.9-44-113.6-102.4-125.4zM393.4 288H328v112c0 8.8-7.2 16-16 16h-48c-8.8 0-16-7.2-16-16V288h-65.4c-14.3 0-21.4-17.2-11.3-27.3l105.4-105.4c6.2-6.2 16.4-6.2 22.6 0l105.4 105.4c10.1 10.1 2.9 27.3-11.3 27.3z"/></svg>
        <span class="mt-2 text-sm leading-normal">Select a file</span>
        <input type='file' class="hidden" name="avatar" />
      </label>
    </div>
</div>
