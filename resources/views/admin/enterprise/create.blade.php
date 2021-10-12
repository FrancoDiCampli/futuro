<div class="w-10/12 mx-auto">


    <div class="title">
        <div class="text-center text-white bg-main-blue">
            <h1 class="py-5 text-2xl font-medium">Crear <span class="font-semibold">empresa</span></h1>
            <p class="w-6/12 py-5 mx-auto text-sm">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam dolor enim, lacinia et sem et, rhoncus pharetra orci.</p>
        </div>

    </div>

    <div class="bg-white form">


        {{-- Nombre --}}
        <div class="px-10 py-5 row">
            <label for="" class="block px-5 text-base font-semibold text-main-blue">Nombre</label>
            <input class="rounded-full border border-gray-200 text-base w-full px-5 @error('name') border-red-500 @enderror" type="text" placeholder="Nombre"  name="name" id="name" value="{{ old('name') }}">
            @error('name')<span class="text-xs text-red-500 ">{{ $message }}</span>@enderror
        </div>

        <div class="flex flex-wrap row">
            <div class="w-6/12 px-10 py-5">
                <label for="" class="block px-5 text-base font-semibold text-main-blue">Ciudad</label>
                <select class="w-full px-5 text-base border border-gray-200 rounded-full focus:outline-none" name="city_id" id="">
                    @foreach ($cities as $city)
                        <option value="{{$city->id}}">{{$city->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="w-6/12 px-10 py-5">

                <label
                class="flex flex-col items-center w-64 px-4 py-6 tracking-wide uppercase transition-all duration-150 ease-linear bg-white border rounded-md shadow-md cursor-pointer border-blue hover:bg-main-blue hover:text-white text-main-blue">
                <svg aria-hidden="true" data-prefix="fas" data-icon="cloud-upload-alt" class="h-6 svg-inline--fa fa-cloud-upload-alt fa-w-20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"><path fill="currentColor" d="M537.6 226.6c4.1-10.7 6.4-22.4 6.4-34.6 0-53-43-96-96-96-19.7 0-38.1 6-53.3 16.2C367 64.2 315.3 32 256 32c-88.4 0-160 71.6-160 160 0 2.7.1 5.4.2 8.1C40.2 219.8 0 273.2 0 336c0 79.5 64.5 144 144 144h368c70.7 0 128-57.3 128-128 0-61.9-44-113.6-102.4-125.4zM393.4 288H328v112c0 8.8-7.2 16-16 16h-48c-8.8 0-16-7.2-16-16V288h-65.4c-14.3 0-21.4-17.2-11.3-27.3l105.4-105.4c6.2-6.2 16.4-6.2 22.6 0l105.4 105.4c10.1 10.1 2.9 27.3-11.3 27.3z"/></svg>
                <span class="mt-2 text-base leading-normal">Select a file</span>
                <input type='file' class="hidden" name="logo" />
              </label>
            </div>
        </div>

        <div class="flex flex-wrap row">
            <div class="w-6/12 px-10 py-5">
                <label for="" class="block px-5 text-base font-semibold text-main-blue">Cantidad de empleados</label>
                <input class="rounded-full border border-gray-200 text-base w-full px-5 @error('employees') border-red-500 @enderror" type="text" placeholder="Cantidad de empleados"  name="employees" id="employees" value="{{ old('employees') }}">
                @error('employees')<span class="text-xs text-red-500 ">{{ $message }}</span>@enderror

            </div>

            <div class="w-6/12 px-10 py-5">
                <label for="" class="block px-5 text-base font-semibold text-main-blue">Sector</label>
                <select class="w-full px-5 text-base border border-gray-200 rounded-full focus:outline-none"
                    name="sector" id="">
                    <option value="transporte">Transporte</option>
                    <option value="quimico">Quimico</option>
                    <option value="textil">Textil</option>
                    <option value="construccion">Construccion</option>
                    <option value="alimentacion">Alimentacion</option>
                    <option value="servicios">Servicios</option>
                    <option value="otros">Otros</option>

                </select>
            </div>

        </div>

        <div class="flex flex-wrap row">

            <div class="w-6/12 px-10 py-5">
                <label for="" class="block px-5 text-base font-semibold text-main-blue">Giro</label>
                <select class="w-full px-5 text-base border border-gray-200 rounded-full focus:outline-none"
                    name="turn" id="">
                    <option value="agropecuarias">agropecuarias</option>
                    <option value="extractoras">extractoras</option>
                    <option value="mayoristas">mayoristas</option>
                    <option value="minoristas">minoristas</option>
                    <option value="otros">Otros</option>

                </select>
            </div>
            <div class="w-6/12 px-10 py-5">
                <label for="" class="block px-5 text-base font-semibold text-main-blue">Sitio web</label>
                <input class="rounded-full border border-gray-200 text-base w-full px-5 @error('website') border-red-500 @enderror" type="text" placeholder="Sitio web"  name="website" id="website" value="{{ old('website') }}">
                @error('website')<span class="text-xs text-red-500 ">{{ $message }}</span>@enderror

            </div>
        </div>

        <div class="px-10 py-5 row">
            <label for="" class="block px-5 text-base font-semibold text-main-blue">Vision</label>
            <textarea class="border border-gray-200 text-base w-full px-5 focus:outline-none @error('vision') border-red-500 @enderror" name="vision" id="" cols="30" rows="5"

            placeholder="¿Por que unirse a nuestra empresa?">{{ old('vision') }}</textarea>
            @error('vision')<span class="text-xs text-red-500 ">{{$message}}</span>@enderror

        </div>

        <div class="px-10 py-5 row">
            <label for="" class="block px-5 text-base font-semibold text-main-blue">Descripcion</label>
            <textarea class="border border-gray-200 text-base w-full px-5 focus:outline-none @error('description') border-red-500 @enderror" name="description" id="" cols="30" rows="5" placeholder="Breve descripcion de la empresa"></textarea>
            @error('description')<span class="text-xs text-red-500 ">{{$message}}</span>@enderror
        </div>

        <div class="flex flex-wrap row">
            <div class="w-6/12 px-10 py-5">
                <label for="" class="block px-5 text-base font-semibold text-main-blue">RFC</label>
                <input class="rounded-full border border-gray-200 text-base w-full px-5 @error('rfc') border-red-500 @enderror"
                    type="text" placeholder="RFC"
                    name="rfc" id="rfc"
                    value="{{ old('rfc') }}">
                    @error('rfc')<span class="text-xs text-red-500 ">{{ $message }}</span>@enderror

            </div>

            <div class="w-6/12 px-10 py-5">
                <label for="" class="block px-5 text-base font-semibold text-main-blue">Razon social</label>
                <input class="rounded-full border border-gray-200 text-base w-full px-5 @error('business_name') border-red-500 @enderror" type="text" placeholder="Sitio web"  name="business_name" id="business_name" value="{{ old('business_name') }}">
                @error('business_name')<span class="text-xs text-red-500 ">{{ $message }}</span>@enderror

            </div>
        </div>


        <div class="flex justify-center">
            <button type="button" class="px-5 py-2 font-semibold text-white rounded-full bg-main-blue">Siguiente</button>
        </div>



    </div>


</div>
