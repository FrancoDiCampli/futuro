<div>


<div class="w-10/12 mx-auto">

    @if (session()->has('message'))
        <div id="alert" class="text-white px-6 py-4 border-0 rounded relative mb-4 bg-green-500">
            <span class="inline-block align-middle mr-8">
                {{ session('message') }}
            </span>
            <button class="absolute bg-transparent text-2xl font-semibold leading-none right-0 top-0 mt-4 mr-6 outline-none focus:outline-none" onclick="document.getElementById('alert').remove();">
                <span>×</span>
            </button>
        </div>
    @endif
    
    <div class="title">
        <div class="bg-main-blue text-white text-center">
            <h1 class="text-2xl font-medium py-5">Crear <span class="font-semibold">vacante</span></h1>
            <p class="text-sm w-6/12 mx-auto py-5">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam dolor enim, lacinia et sem et, rhoncus pharetra orci.</p>

            <div class="flex w-6/12 mx-auto items-center text-center justify-center py-6" x-data>
                <div>
                    <p class="">Información</p>
                    <p x-show="$wire.informationActive" class="border-lime border-b-4"></p>
                </div>
                <p class="mx-2"> - </p>
                <div>
                    <p class="">Plan</p>
                    <p x-show="$wire.planActive" class="border-lime border-b-4"></p>
                </div>                
                {{-- <p class="border-lime border-b-4">Plan</p> --}}
            </div>
        </div>      

    </div>

    <div class="form bg-white">

    @if ($currentStep == 1)
    <form  wire:submit.prevent="store" class="mb-10 py-2">
        @csrf
        {{-- <input type="text" wire:model="country" value="1" hidden> --}}
        {{-- Titulo --}}
        <div class="row px-10 py-5">
            <label for="" class="text-base text-main-blue block font-semibold px-5">Titulo</label>
            <input class="rounded-full border border-gray-200 text-base w-full px-5 @error('title') border-red-500 @enderror" type="text" placeholder="Titulo"  wire:model="title" id="title" value="{{ old('title') }}">
            @error('title')<span class="text-xs text-red-500 ">{{ $message }}</span>@enderror
        </div>
        {{-- Categoria y sub  --}}
        <div class="row flex flex-wrap">
            <div class="px-10 py-5 w-6/12">
                <label for="" class="text-base text-main-blue block font-semibold px-5">Categoria</label>
                <select class="rounded-full border border-gray-200 text-base w-full px-5 focus:outline-none @error('category_id') border-red-500 @enderror"  wire:model="category_id" id="">
                    @foreach ($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>
                @error('category_id')<span class="text-xs text-red-500 ">{{ $message }}</span>@enderror
            </div>
            <div class="px-10 py-5 w-6/12">
                <label for="" class="text-base text-main-blue block font-semibold px-5">Subcategoria</label>
                <select class="rounded-full border border-gray-200 text-base w-full px-5 focus:outline-none @error('subcategory_id') border-red-500 @enderror" wire:model="subcategory_id" id="">
                    @foreach ($subcategories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>
                @error('subcategory_id')<span class="text-xs text-red-500 ">{{ $message }}</span>@enderror
            </div>
        </div>

        <div class="row px-10 py-5">
            <label for="" class="text-base text-main-blue block font-semibold px-5">Breve Descripcion</label>
            <textarea class="border border-gray-200 text-base w-full px-5 focus:outline-none @error('description') border-red-500 @enderror" wire:model="description" id="" cols="30" rows="5" placeholder="¿De qué trata y qué vas a estar haciendo?">
                 Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quos, nisi! Sint animi eveniet a? Harum autem ad doloribus in nisi, incidunt accusantium, maiores, eos facere qui exercitationem dolores! Suscipit, iusto.</textarea>
            @error('description')<span class="text-xs text-red-500 ">{{$message}}</span>@enderror

        </div>

        <div class="row px-10 py-5">
            <label for="" class="text-base text-main-blue block font-semibold px-5">Candidato ideal</label>

            <textarea class="border border-gray-200 text-base w-full px-5 focus:outline-none @error('looking_for') border-red-500 @enderror" wire:model="looking_for" id="" cols="30" rows="5" placeholder="¿Cómo es el candidato ideal para esta vacante?">
                Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quos, nisi! Sint animi eveniet a? Harum autem ad doloribus in nisi, incidunt accusantium, maiores, eos facere qui exercitationem dolores! Suscipit, iusto.</textarea>
            @error('looking_for')<span class="text-xs text-red-500 ">{{$message}}</span>@enderror

        </div>

        {{-- Pais Estado --}}
        <div class="row flex flex-wrap">

            <div class="px-10 py-5 w-6/12">
                <label for="" class="text-base text-main-blue block font-semibold px-5">Estado</label>
                <select class="rounded-full border border-gray-200 text-base w-full px-5 focus:outline-none @error('state_id') border-red-500 @enderror" wire:model="state_id" id="">
                    @foreach ($states as $state)
                        <option value="{{$state->id}}">{{$state->name}}</option>
                    @endforeach
                </select>
                @error('state_id')<span class="text-xs text-red-500 ">{{$message}}</span>@enderror
            </div>

            <div class="px-10 py-5 w-6/12">
                <label for="" class="text-base text-main-blue block font-semibold px-5">Ciudad</label> 
                <select class="rounded-full border border-gray-200 text-base w-full px-5 focus:outline-none @error('city_id') border-red-500 @enderror" wire:model="city_id" id="">
                    @foreach ($cities as $city)
                        <option value="{{$city->id}}">{{$city->name}}</option>
                    @endforeach
                </select>
                @error('city_id')<span class="text-xs text-red-500 ">{{$message}}</span>@enderror
            </div>
        </div>

        {{-- Expreciencia contratacion --}}
        <div class="row flex flex-wrap">
            <div class="px-10 py-5 w-6/12">
                <label for="" class="text-base text-main-blue block font-semibold px-5">Experiencia</label>
                <select class="rounded-full border border-gray-200 text-base w-full px-5 focus:outline-none @error('experience') border-red-500 @enderror" wire:model="experience" id="">
                    <option value="Estudiante">Estudiante</option>
                    <option value="Graduado">Graduado</option>
                    <option value="1er año">1er año</option>
                    <option value="2do año">2do año</option>
                </select>
                @error('experience')<span class="text-xs text-red-500 ">{{$message}}</span>@enderror
            </div>
            <div class="px-10 py-5 w-6/12">
                <label for="" class="text-base text-main-blue block font-semibold px-5">Contratacion</label>
                <select class="rounded-full border border-gray-200 text-base w-full px-5 focus:outline-none @error('hiring') border-red-500 @enderror" wire:model="hiring" id="">
                    <option value="Permanente">Permanente</option>
                    <option value="Temporario">Temporario</option>
                    <option value="Por proyecto">Por proyecto</option>
                    <option value="Becario">Becario</option>
                </select>
                @error('hiring')<span class="text-xs text-red-500 ">{{$message}}</span>@enderror
            </div>
        </div>

        {{-- Disponibilidad horario preferencia --}}
        <div class="row flex flex-wrap">
            <div class="px-10 py-5 w-6/12">
                <label for="" class="text-base text-main-blue block font-semibold px-5">Disponibilidad</label>
                <select class="rounded-full border border-gray-200 text-base w-full px-5 focus:outline-none @error('available') border-red-500 @enderror"
                wire:model="available" id="">
                    <option value="Tiempo completo">Tiempo completo</option>
                    <option value="Medio tiempo">Medio tiempo</option>
                </select>
                @error('available')<span class="text-xs text-red-500 ">{{$message}}</span>@enderror
            </div>

            <div class="px-10 py-5 w-6/12">
                <label for="" class="text-base text-main-blue block font-semibold px-5">Horario de preferiencia</label>
                <select class="rounded-full border border-gray-200 text-base w-full px-5 focus:outline-none @error('schedule') border-red-500 @enderror" wire:model="schedule" id="">
                    <option value="Mañana">Mañana</option>
                    <option value="Tarde">Tarde</option>
                    <option value="Sin preferencia">Sin preferencia</option>
                </select>
                @error('schedule')<span class="text-xs text-red-500 ">{{$message}}</span>@enderror
            </div>
        </div>

        {{-- Remunerado salario --}}
        <div class="row flex flex-wrap">
            <div class="px-10 py-5 w-6/12">
                <label for="" class="text-base text-main-blue block font-semibold px-5">Remunerado</label>
                <select class="rounded-full border border-gray-200 text-base w-full px-5 focus:outline-none @error('paid') border-red-500 @enderror"
                wire:model="paid" id="">
                    <option value="0">Yes</option>
                    <option value="1">No</option>
                </select>
                @error('paid')<span class="text-xs text-red-500 ">{{$message}}</span>@enderror
            </div>

            <div class="px-10 py-5 w-6/12">
                <label for="" class="text-base text-main-blue block font-semibold px-5">Rango de salario mensua</label>
                <select class="rounded-full border border-gray-200 text-base w-full px-5 focus:outline-none @error('pretended') border-red-500 @enderror"
                wire:model="pretended" id="">
                    <option value="100">0-100</option>
                    <option value="500">100-500</option>
                    <option value="1000">500-1000</option>
                </select>
                @error('pretended')<span class="text-xs text-red-500 ">{{$message}}</span>@enderror
            </div>
        </div>

        {{-- Habilidades destacadas  --}}
        <div class="row px-10 py-5">
            <label for="" class="text-base text-main-blue block font-semibold px-5">Habilidades destacadas</label>

            <div class="flex flex-wrap">
                @foreach ($skills as $skill)
                <div class="w-3/12 px-2 flex items-start my-5">
                    <input type="checkbox" class="rounded-sm border-gray-200 mt-1 focus:outline-none @error('skills_selected') border-red-500 @enderror"
                    wire:model="skills_selected"
                        value="{{$skill}}">
                    <label class="block font-semibold text-gray-400 mx-2">{{$skill}}</label>
                </div>
                @endforeach
            </div>
            @error('skills_selected')<span class="text-xs text-red-500 ">{{$message}}</span>@enderror
        </div>

        {{-- Mostrar en perfil de empresa --}}
        <div class="row px-10 py-5">
            <label for="" class="text-base text-main-blue block font-semibold px-5">¿Mostrar vacante en perfil de la empresa?</label>
            <div class="flex flex-wrap">
                <div class="w-3/12 px-2 flex items-start my-5">
                    <input type="checkbox" class="rounded-sm border-gray-200 mt-1 focus:outline-none @error('enterprise') border-red-500 @enderror" wire:model="enterprise" >
                    <label class="block font-semibold text-gray-400 mx-2">Mostrar?</label>
                    @error('enterprise')<span class="text-xs text-red-500 ">{{$message}}</span>@enderror
                </div>

                <div class="w-3/12 px-2 flex items-start my-5">
                    <input type="checkbox" class="rounded-sm border-gray-200 mt-1 focus:outline-none @error('visible') border-red-500 @enderror" wire:model="visible" >
                    <label class="block font-semibold text-gray-400 mx-2">Visible?</label>
                    @error('visible')<span class="text-xs text-red-500 ">{{$message}}</span>@enderror
                </div>
            </div>
        </div>

        <div class="flex justify-center">
            @if ($currentStep == 1)
            <button type="submit" class="bg-main-blue text-white font-semibold px-5 py-2 rounded-full" wire:click="increaseStep()">Siguiente</button>
            @endif
            @if ($currentStep == 2)
            <button type="button" class="bg-white text-gray-700 border-2 border-main-blue font-semibold px-5 py-2 rounded-full mr-4" wire:click="decreaseStep()">Regresar</button>
            <button type="submit" class="bg-main-blue text-white font-semibold px-5 py-2 rounded-full">Publicar</button>
            @endif
        </div>

    </form>
    @endif

    @if ($currentStep == 2)
    <div>
        <form wire:submit.prevent="payment" class="mb-10 py-2">
            <div class="flex justify-center">
                @if ($currentStep == 2)
                <button type="button" class="bg-white text-gray-700 border-2 border-main-blue font-semibold px-5 py-2 rounded-full mr-4" wire:click="decreaseStep()">Regresar</button>
                @endif
                @if ($currentStep == 2)
                <button type="submit" class="bg-main-blue text-white font-semibold px-5 py-2 rounded-full">Publicar</button>
                @endif
            </div>
        </form>
    </div>
    @endif

    </div>


</div>

</div>
