<div>


<div class="w-10/12 mx-auto">

    @if (session()->has('message'))
        <div id="alert" class="relative px-6 py-4 mb-4 text-white bg-green-500 border-0 rounded">
            <span class="inline-block mr-8 align-middle">
                {{ session('message') }}
            </span>
            <button class="absolute top-0 right-0 mt-4 mr-6 text-2xl font-semibold leading-none bg-transparent outline-none focus:outline-none" onclick="document.getElementById('alert').remove();">
                <span>×</span>
            </button>
        </div>
    @endif

    <div class="title">
        <div class="text-center text-white bg-main-blue">
            <h1 class="py-5 text-2xl font-medium">Crear <span class="font-semibold">vacante</span></h1>
            <p class="w-6/12 py-5 mx-auto text-sm">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam dolor enim, lacinia et sem et, rhoncus pharetra orci.</p>

            <div class="flex items-center justify-center w-6/12 py-6 mx-auto text-center" x-data>
                <div>
                    <p class="">Información</p>
                    <p x-show="$wire.informationActive" class="border-b-4 border-lime"></p>
                </div>
                <p class="mx-2"> - </p>
                <div>
                    <p class="">Plan</p>
                    <p x-show="$wire.planActive" class="border-b-4 border-lime"></p>
                </div>
                {{-- <p class="border-b-4 border-lime">Plan</p> --}}
            </div>
        </div>

    </div>

    <div class="bg-white form">

    @if ($currentStep == 1)
    <form  wire:submit.prevent="store" class="py-2 mb-10">
        @csrf
        {{-- <input type="text" wire:model="country" value="1" hidden> --}}
        {{-- Titulo --}}
        <div class="px-10 py-5 row">
            <label for="" class="block px-5 text-base font-semibold text-main-blue">Titulo*</label>
            <input class="rounded-full border border-gray-200 text-base w-full px-5 @error('title') border-red-500 @enderror"
                type="text" placeholder="Titulo"  wire:model="title" id="title" >
            @error('title')<span class="text-xs text-red-500 ">{{ $message }}</span>@enderror
        </div>
        {{-- Categoria y sub  --}}
        <div class="flex flex-wrap row">
            <div class="w-6/12 px-10 py-5">
                <label for="" class="block px-5 text-base font-semibold text-main-blue">Categoria*</label>
                <select class="rounded-full border border-gray-200 text-base w-full px-5 focus:outline-none @error('category_id') border-red-500 @enderror"
                    wire:model="category" id="">
                    <option value="">Selecione una categoria</option>
                    @foreach ($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>
                @error('category_id')<span class="text-xs text-red-500 ">{{ $message }}</span>@enderror
            </div>
            <div class="w-6/12 px-10 py-5">
                <label for="" class="block px-5 text-base font-semibold text-main-blue">Subcategoria*</label>
                <select class="rounded-full border border-gray-200 text-base w-full px-5 focus:outline-none @error('subcategory_id') border-red-500 @enderror"
                    wire:model="subcategory_id" id="">
                    @if (count($subcategories)>0)
                            <option value="">Selecione una subcategoria</option>
                        @foreach ($subcategories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    @else

                    @endif

                </select>
                @error('subcategory_id')<span class="text-xs text-red-500 ">{{ $message }}</span>@enderror
            </div>
        </div>

        <div class="px-10 py-5 row">
            <label for="" class="block px-5 text-base font-semibold text-main-blue">Breve Descripcion*</label>
            <textarea class="border border-gray-200 text-base w-full px-5 focus:outline-none @error('description') border-red-500 @enderror"
                wire:model="description" id="" cols="30" rows="5" placeholder="¿De qué trata y qué vas a estar haciendo?">
            </textarea>
            @error('description')<span class="text-xs text-red-500 ">{{$message}}</span>@enderror

        </div>

        <div class="px-10 py-5 row">
            <label for="" class="block px-5 text-base font-semibold text-main-blue">Candidato ideal</label>

            <textarea class="border border-gray-200 text-base w-full px-5 focus:outline-none @error('looking_for') border-red-500 @enderror"
                wire:model="looking_for" id="" cols="30" rows="5" placeholder="¿Cómo es el candidato ideal para esta vacante?">

            </textarea>
            @error('looking_for')<span class="text-xs text-red-500 ">{{$message}}</span>@enderror

        </div>

        {{-- Pais Estado --}}
        <div class="flex flex-wrap row">

            <div class="w-6/12 px-10 py-5">
                <label for="" class="block px-5 text-base font-semibold text-main-blue">Estado</label>
                <select class="rounded-full border border-gray-200 text-base w-full px-5 focus:outline-none @error('state_id') border-red-500 @enderror"
                    wire:model="state" id="">
                    <option value="">Seleccione un estado</option>
                    @foreach ($states as $state)
                        <option value="{{$state->id}}">{{$state->name}}</option>
                    @endforeach
                </select>
                @error('state_id')<span class="text-xs text-red-500 ">{{$message}}</span>@enderror
            </div>

            <div class="w-6/12 px-10 py-5">
                <label for="" class="block px-5 text-base font-semibold text-main-blue">Ciudad</label>
                <select class="rounded-full border border-gray-200 text-base w-full px-5 focus:outline-none @error('city_id') border-red-500 @enderror" wire:model="city_id" id="">

                    @if (count($cities)>0)
                        <option value="">Selecione una subcategoria</option>
                        @foreach ($cities as $city)
                            <option value="{{$city->id}}">{{$city->name}}</option>
                        @endforeach
                    @else

                    @endif
                </select>
                @error('city_id')<span class="text-xs text-red-500 ">{{$message}}</span>@enderror
            </div>
        </div>

        {{-- Expreciencia contratacion --}}
        <div class="flex flex-wrap row">
            <div class="w-6/12 px-10 py-5">
                <label for="" class="block px-5 text-base font-semibold text-main-blue">Experiencia</label>
                <select class="rounded-full border border-gray-200 text-base w-full px-5 focus:outline-none @error('experience') border-red-500 @enderror" wire:model="experience" id="">
                    <option value="Estudiante">Estudiante</option>
                    <option value="Graduado">Graduado</option>
                    <option value="1er año">1er año</option>
                    <option value="2do año">2do año</option>
                </select>
                @error('experience')<span class="text-xs text-red-500 ">{{$message}}</span>@enderror
            </div>
            <div class="w-6/12 px-10 py-5">
                <label for="" class="block px-5 text-base font-semibold text-main-blue">Contratacion</label>
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
        <div class="flex flex-wrap row">
            <div class="w-6/12 px-10 py-5">
                <label for="" class="block px-5 text-base font-semibold text-main-blue">Disponibilidad</label>
                <select class="rounded-full border border-gray-200 text-base w-full px-5 focus:outline-none @error('available') border-red-500 @enderror"
                wire:model="available" id="">
                    <option value="Tiempo completo">Tiempo completo</option>
                    <option value="Medio tiempo">Medio tiempo</option>
                </select>
                @error('available')<span class="text-xs text-red-500 ">{{$message}}</span>@enderror
            </div>

            <div class="w-6/12 px-10 py-5">
                <label for="" class="block px-5 text-base font-semibold text-main-blue">Horario de preferiencia</label>
                <select class="rounded-full border border-gray-200 text-base w-full px-5 focus:outline-none @error('schedule') border-red-500 @enderror" wire:model="schedule" id="">
                    <option value="Mañana">Mañana</option>
                    <option value="Tarde">Tarde</option>
                    <option value="Sin preferencia">Sin preferencia</option>
                </select>
                @error('schedule')<span class="text-xs text-red-500 ">{{$message}}</span>@enderror
            </div>
        </div>

        {{-- Remunerado salario --}}
        <div class="flex flex-wrap row">
            <div class="w-6/12 px-10 py-5">
                <label for="" class="block px-5 text-base font-semibold text-main-blue">Remunerado</label>
                <select class="rounded-full border border-gray-200 text-base w-full px-5 focus:outline-none @error('paid') border-red-500 @enderror"
                wire:model="paid" id="">
                    <option value="0">Yes</option>
                    <option value="1">No</option>
                </select>
                @error('paid')<span class="text-xs text-red-500 ">{{$message}}</span>@enderror
            </div>

            <div class="w-6/12 px-10 py-5">
                <label for="" class="block px-5 text-base font-semibold text-main-blue">Rango de salario mensua</label>
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
        <div class="px-10 py-5 row">
            <label for="" class="block px-5 text-base font-semibold text-main-blue">Habilidades destacadas</label>

            <div class="flex flex-wrap">
                @foreach ($skills as $skill)
                <div class="flex items-start w-3/12 px-2 my-5">
                    <input type="checkbox" class="rounded-sm border-gray-200 mt-1 focus:outline-none @error('skills_selected') border-red-500 @enderror"
                    wire:model="skills_selected"
                        value="{{$skill}}">
                    <label class="block mx-2 font-semibold text-gray-400">{{$skill}}</label>
                </div>
                @endforeach
            </div>
            @error('skills_selected')<span class="text-xs text-red-500 ">{{$message}}</span>@enderror
        </div>

        {{-- Mostrar en perfil de empresa --}}
        <div class="px-10 py-5 row">
            <label for="" class="block px-5 text-base font-semibold text-main-blue">¿Mostrar vacante en perfil de la empresa?</label>
            <div class="flex flex-wrap">
                <div class="flex items-start w-3/12 px-2 my-5">
                    <input type="checkbox" class="rounded-sm border-gray-200 mt-1 focus:outline-none @error('enterprise') border-red-500 @enderror" wire:model="enterprise" >
                    <label class="block mx-2 font-semibold text-gray-400">Mostrar?</label>
                    @error('enterprise')<span class="text-xs text-red-500 ">{{$message}}</span>@enderror
                </div>

                <div class="flex items-start w-3/12 px-2 my-5">
                    <input type="checkbox" class="rounded-sm border-gray-200 mt-1 focus:outline-none @error('visible') border-red-500 @enderror" wire:model="visible" >
                    <label class="block mx-2 font-semibold text-gray-400">Visible?</label>
                    @error('visible')<span class="text-xs text-red-500 ">{{$message}}</span>@enderror
                </div>
            </div>
        </div>

        <div class="flex justify-center">
            @if ($currentStep == 1)
            <button type="submit" class="px-5 py-2 font-semibold text-white rounded-full bg-main-blue" wire:click="increaseStep()">Siguiente</button>
            @endif
            @if ($currentStep == 2)
            <button type="button" class="px-5 py-2 mr-4 font-semibold text-gray-700 bg-white border-2 rounded-full border-main-blue" wire:click="decreaseStep()">Regresar</button>
            <button type="submit" class="px-5 py-2 font-semibold text-white rounded-full bg-main-blue">Publicar</button>
            @endif
        </div>

    </form>
    @endif

    @if ($currentStep == 2)
    <div>
        <form wire:submit.prevent="payment" class="py-2 mb-10">
            <div class="flex justify-center">
                @if ($currentStep == 2)
                <button type="button" class="px-5 py-2 mr-4 font-semibold text-gray-700 bg-white border-2 rounded-full border-main-blue" wire:click="decreaseStep()">Regresar</button>
                @endif
                @if ($currentStep == 2)
                <button type="submit" class="px-5 py-2 font-semibold text-white rounded-full bg-main-blue">Publicar</button>
                @endif
            </div>
        </form>
    </div>
    @endif

    </div>


</div>

</div>
