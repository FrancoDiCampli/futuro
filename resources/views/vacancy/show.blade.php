@extends('layouts.main')

@section('content')
@if($alert)
<div class="flex items-center justify-between p-5 text-white alert bg-main-blue h-18">
    <div class="flex">
        <p>¡Completa tu perfil y participa en la vacantes!</p>

        <a href="{{route('students.edit',user()->profile->id)}}" class="flex items-center mx-10 text-sm">Editar Perfil
            <svg aria-hidden="true" data-prefix="fas" data-icon="arrow-right" class="h-4 mx-2 svg-inline--fa fa-arrow-right fa-w-14" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="m190.5 66.9 22.2-22.2c9.4-9.4 24.6-9.4 33.9 0L441 239c9.4 9.4 9.4 24.6 0 33.9L246.6 467.3c-9.4 9.4-24.6 9.4-33.9 0l-22.2-22.2c-9.5-9.5-9.3-25 .4-34.3L311.4 296H24c-13.3 0-24-10.7-24-24v-32c0-13.3 10.7-24 24-24h287.4L190.9 101.2c-9.8-9.3-10-24.8-.4-34.3z"/></svg>
        </a>
    </div>

    <button class="">
        <svg aria-hidden="true" data-prefix="fas" data-icon="times" class="h-4 svg-inline--fa fa-times fa-w-11" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 352 512"><path fill="currentColor" d="m242.72 256 100.07-100.07c12.28-12.28 12.28-32.19 0-44.48l-22.24-22.24c-12.28-12.28-32.19-12.28-44.48 0L176 189.28 75.93 89.21c-12.28-12.28-32.19-12.28-44.48 0L9.21 111.45c-12.28 12.28-12.28 32.19 0 44.48L109.28 256 9.21 356.07c-12.28 12.28-12.28 32.19 0 44.48l22.24 22.24c12.28 12.28 32.2 12.28 44.48 0L176 322.72l100.07 100.07c12.28 12.28 32.2 12.28 44.48 0l22.24-22.24c12.28-12.28 12.28-32.19 0-44.48L242.72 256z"/></svg>
    </button>

</div>
@endif
<div class="w-10/12 mx-auto text-gray-700">
    <a class="text-xs font-semibold text-main-blue" href="{{route('vacancies.index')}}">Regresar</a>
    <div>
        <h1 class="text-4xl text-main-blue">{{$vacancy->title}}</h1>

    </div>
    <div class="flex items-center my-5 text-sm text-gray-700">
        <svg aria-hidden="true" data-prefix="fas" data-icon="briefcase" class="h-5 svg-inline--fa fa-briefcase fa-w-16" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M320 336c0 8.84-7.16 16-16 16h-96c-8.84 0-16-7.16-16-16v-48H0v144c0 25.6 22.4 48 48 48h416c25.6 0 48-22.4 48-48V288H320v48zm144-208h-80V80c0-25.6-22.4-48-48-48H176c-25.6 0-48 22.4-48 48v48H48c-25.6 0-48 22.4-48 48v80h512v-80c0-25.6-22.4-48-48-48zm-144 0H192V96h128v32z"/></svg>
        <p class="mx-2">{{$vacancy->subcategory->category->name}} | {{$vacancy->subcategory->name}}</p>
    </div>
    <div class="flex items-center my-5 text-sm">
        <svg aria-hidden="true" data-prefix="fas" data-icon="map-marker-alt" class="h-5 svg-inline--fa fa-map-marker-alt fa-w-12" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"><path fill="currentColor" d="M172.268 501.67C26.97 291.031 0 269.413 0 192 0 85.961 85.961 0 192 0s192 85.961 192 192c0 77.413-26.97 99.031-172.268 309.67-9.535 13.774-29.93 13.773-39.464 0zM192 272c44.183 0 80-35.817 80-80s-35.817-80-80-80-80 35.817-80 80 35.817 80 80 80z"/></svg>
        <p class="mx-2">{{$vacancy->city->name}}, {{$vacancy->city->state->name}}</p>
    </div>
    <h2 class="text-2xl font-bold">${{$vacancy->pretended}}</h2>

    <div class="container flex">
        <div class="w-8/12 bg-white content">
           <div class="p-5 paragraph">
               <p class="text-base font-medium text-main-blue">¿De qué trata y qué vas a estar haciendo?</p>
               <p class="my-5">{{$vacancy->description}}</p>
           </div>

           <div class="p-5 paragraph">
                <p class="text-base font-medium text-main-blue">¿Cómo es el candidato ideal para esta vacante?</p>
                <p class="my-5">{{$vacancy->looking_for}}</p>
            </div>

            {{-- Requisitos  --}}
            <div class="p-5 paragraph ">
                <p class="text-base font-medium text-main-blue">Requisitos</p>

                <div class="flex flex-wrap text-xs">
                    <div class="flex items-start w-4/12 my-5">
                        <svg aria-hidden="true" data-prefix="fas" data-icon="circle" class="h-2 m-1 text-lime svg-inline--fa fa-circle fa-w-16" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8z"/></svg>
                        <div>
                            <p>Experiencia</p>
                            <p class="font-semibold">Recien egresado</p>
                        </div>
                    </div>

                    <div class="flex items-start w-4/12 my-5">
                        <svg aria-hidden="true" data-prefix="fas" data-icon="circle" class="h-2 m-1 text-lime svg-inline--fa fa-circle fa-w-16" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8z"/></svg>
                        <div>
                            <p>Contratation</p>
                            <p class="font-semibold">{{$vacancy->hiring}}</p>
                        </div>
                    </div>

                    <div class="flex items-start w-4/12 my-5">
                        <svg aria-hidden="true" data-prefix="fas" data-icon="circle" class="h-2 m-1 text-lime svg-inline--fa fa-circle fa-w-16" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8z"/></svg>
                        <div>
                            <p>Disponibilidad</p>
                            <p class="font-semibold">{{$vacancy->available}}</p>
                        </div>
                    </div>

                    <div class="flex items-start w-4/12 my-5">
                        <svg aria-hidden="true" data-prefix="fas" data-icon="circle" class="h-2 m-1 text-lime svg-inline--fa fa-circle fa-w-16" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8z"/></svg>
                        <div>
                            <p>Horario</p>
                            <p class="font-semibold">{{$vacancy->schedule}}</p>
                        </div>
                    </div>

                </div>


            </div>

            {{-- Habilidades  --}}
            <div class="p-5 paragraph">
                <p class="text-base font-medium text-main-blue">Habilidades destacadas</p>

                <div class="flex flex-wrap text-xs">
                    @foreach ($vacancy->skills as $skill)

                    <div class="flex items-start w-4/12 px-5">
                        <svg aria-hidden="true" data-prefix="fas" data-icon="circle" class="h-2 m-1 text-lime svg-inline--fa fa-circle fa-w-16" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8z"/></svg>
                        <div>
                            <p>{{$skill}}</p>
                        </div>
                    </div>
                    @endforeach

                </div>


            </div>
        </div>

        <div class="w-4/12 aside ">
            <div class="items-center mx-5 text-center bg-white card">
                <div class="pt-2 logo">
                    <img class="h-16 mx-auto" src="{{asset('img/logos/logo.png')}}" alt="">
                </div>
                <div class="my-5">
                    <h1 class="font-semibold text-center">{{$vacancy->recruiter->name}}</h1>
                    <div class="flex justify-center">
                        <svg aria-hidden="true" data-prefix="fas" data-icon="map-marker-alt" class="h-4 svg-inline--fa fa-map-marker-alt fa-w-12" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"><path fill="currentColor" d="M172.268 501.67C26.97 291.031 0 269.413 0 192 0 85.961 85.961 0 192 0s192 85.961 192 192c0 77.413-26.97 99.031-172.268 309.67-9.535 13.774-29.93 13.773-39.464 0zM192 272c44.183 0 80-35.817 80-80s-35.817-80-80-80-80 35.817-80 80 35.817 80 80 80z"/></svg>
                        <p class="mx-1 text-xs">{{$vacancy->city->name}}</p>
                    </div>
                </div>
                <div class="my-5">
                    <h2 class="text-xl font-semibold text-main-blue">{{$vacancy->subcategory->category->name}}</h2>
                    <p class="text-xs">{{$vacancy->subcategory->name}}</p>
                </div>

                <div class="flex items-center justify-center w-8/12 px-5 py-2 mx-auto my-5 text-white rounded-full bg-lime">
                   <p class="px-1 mx-2 text-gray-700 bg-white rounded-full">10</p><p class="font-semibold">Vacantes</p>
                </div>

                <div class="py-2">
                    <a href="#" class="flex items-center justify-center text-xs font-semibold text-main-blue">Ver vacantes
                    <svg aria-hidden="true" data-prefix="fas" data-icon="arrow-right" class="block h-4 svg-inline--fa fa-arrow-right fa-w-14" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="m190.5 66.9 22.2-22.2c9.4-9.4 24.6-9.4 33.9 0L441 239c9.4 9.4 9.4 24.6 0 33.9L246.6 467.3c-9.4 9.4-24.6 9.4-33.9 0l-22.2-22.2c-9.5-9.5-9.3-25 .4-34.3L311.4 296H24c-13.3 0-24-10.7-24-24v-32c0-13.3 10.7-24 24-24h287.4L190.9 101.2c-9.8-9.3-10-24.8-.4-34.3z"/></svg>
                    </a>
                 </div>
            </div>

            @if (!$alert)

                @if ($show)
                    <div>
                        <button type="button"
                            onclick="Livewire.emit('openModal', 'student-postulation',{{ json_encode(['vacancy' => $vacancy->id]) }})"
                            class="flex items-center justify-center w-10/12 py-2 m-5 mx-auto text-center text-white rounded-full bg-main-blue">Postularme</button>
                    </div>
                @else
                    <div class="flex justify-center ">

                        <a href="" class="px-5 py-2 my-5 text-white rounded-full bg-lime">Postulado</a>
                    </div>
                @endif
            @endif
            <div class="flex items-start justify-center w-10/12 mx-auto mt-5">
                <div x-data="{ social: false }">
                    <button x-on:mouseover="social = true"
                            x-on:mouseleave="social = false"
                            class="w-10/12 px-5 py-2 mx-5 text-center bg-white border rounded-full border-main-blue">
                        Compartir
                    </button>
                    <div x-show="social"
                    x-transition:enter="transition ease-out duration-1500"
                    x-transition:enter-start="transform opacity-0 scale-95"
                    x-transition:enter-end="transform opacity-100 scale-100"
                    x-transition:leave="transition ease-in duration-1300"
                    x-transition:leave-start="transform opacity-100 scale-100"
                    x-transition:leave-end="transform opacity-0 scale-95"
                             class="px-3 py-2 mt-2 bg-white rounded-full">
                        <div    x-on:mouseover="social = true"
                                x-on:mouseleave="social = false" class="top-0 z-10 flex items-center justify-between w-32 h-12 buttons">

                            <a href="{{$socials['twitter']}}" target="_blank">
                                <svg aria-hidden="true" data-prefix="fab" data-icon="twitter"
                                    class="h-4 svg-inline--fa fa-twitter fa-w-16" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M459.37 151.716c.325 4.548.325 9.097.325 13.645 0 138.72-105.583 298.558-298.558 298.558-59.452 0-114.68-17.219-161.137-47.106 8.447.974 16.568 1.299 25.34 1.299 49.055 0 94.213-16.568 130.274-44.832-46.132-.975-84.792-31.188-98.112-72.772 6.498.974 12.995 1.624 19.818 1.624 9.421 0 18.843-1.3 27.614-3.573-48.081-9.747-84.143-51.98-84.143-102.985v-1.299c13.969 7.797 30.214 12.67 47.431 13.319-28.264-18.843-46.781-51.005-46.781-87.391 0-19.492 5.197-37.36 14.294-52.954 51.655 63.675 129.3 105.258 216.365 109.807-1.624-7.797-2.599-15.918-2.599-24.04 0-57.828 46.782-104.934 104.934-104.934 30.213 0 57.502 12.67 76.67 33.137 23.715-4.548 46.456-13.32 66.599-25.34-7.798 24.366-24.366 44.833-46.132 57.827 21.117-2.273 41.584-8.122 60.426-16.243-14.292 20.791-32.161 39.308-52.628 54.253z"/></svg>
                            </a>

                            <a href="{{$socials['facebook']}}" target="_blank">
                                <svg aria-hidden="true" data-prefix="fab" data-icon="facebook-f" class="h-4 svg-inline--fa fa-facebook-f fa-w-10" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><path fill="currentColor" d="m279.14 288 14.22-92.66h-88.91v-60.13c0-25.35 12.42-50.06 52.24-50.06h40.42V6.26S260.43 0 225.36 0c-73.22 0-121.08 44.38-121.08 124.72v70.62H22.89V288h81.39v224h100.17V288z"/></svg>
                            </a>
                            <a href="{{$socials['linkedin']}}" target="_blank">
                                <svg aria-hidden="true" data-prefix="fab" data-icon="linkedin-in" class="h-4 svg-inline--fa fa-linkedin-in fa-w-14" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M100.28 448H7.4V148.9h92.88zM53.79 108.1C24.09 108.1 0 83.5 0 53.8a53.79 53.79 0 0 1 107.58 0c0 29.7-24.1 54.3-53.79 54.3zM447.9 448h-92.68V302.4c0-34.7-.7-79.2-48.29-79.2-48.29 0-55.69 37.7-55.69 76.7V448h-92.78V148.9h89.08v40.8h1.3c12.4-23.5 42.69-48.3 87.88-48.3 94 0 111.28 61.9 111.28 142.3V448z"/></svg>
                            </a>
                            <a href="{{$socials['telegram']}}" target="_blank">
                                <svg aria-hidden="true" data-prefix="fab" data-icon="telegram-plane" class="h-4 svg-inline--fa fa-telegram-plane fa-w-14" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="m446.7 98.6-67.6 318.8c-5.1 22.5-18.4 28.1-37.3 17.5l-103-75.9-49.7 47.8c-5.5 5.5-10.1 10.1-20.7 10.1l7.4-104.9 190.9-172.5c8.3-7.4-1.8-11.5-12.9-4.1L117.8 284 16.2 252.2c-22.1-6.9-22.5-22.1 4.6-32.7L418.2 66.4c18.4-6.9 34.5 4.1 28.5 32.2z"/></svg>
                            </a>
                            <a href="{{$socials['whatsapp']}}" target="_blank">
                                <svg aria-hidden="true" data-prefix="fab" data-icon="whatsapp" class="h-4 svg-inline--fa fa-whatsapp fa-w-14" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M380.9 97.1C339 55.1 283.2 32 223.9 32c-122.4 0-222 99.6-222 222 0 39.1 10.2 77.3 29.6 111L0 480l117.7-30.9c32.4 17.7 68.9 27 106.1 27h.1c122.3 0 224.1-99.6 224.1-222 0-59.3-25.2-115-67.1-157zm-157 341.6c-33.2 0-65.7-8.9-94-25.7l-6.7-4-69.8 18.3L72 359.2l-4.4-7c-18.5-29.4-28.2-63.3-28.2-98.2 0-101.7 82.8-184.5 184.6-184.5 49.3 0 95.6 19.2 130.4 54.1 34.8 34.9 56.2 81.2 56.1 130.5 0 101.8-84.9 184.6-186.6 184.6zm101.2-138.2c-5.5-2.8-32.8-16.2-37.9-18-5.1-1.9-8.8-2.8-12.5 2.8-3.7 5.6-14.3 18-17.6 21.8-3.2 3.7-6.5 4.2-12 1.4-32.6-16.3-54-29.1-75.5-66-5.7-9.8 5.7-9.1 16.3-30.3 1.8-3.7.9-6.9-.5-9.7-1.4-2.8-12.5-30.1-17.1-41.2-4.5-10.8-9.1-9.3-12.5-9.5-3.2-.2-6.9-.2-10.6-.2-3.7 0-9.7 1.4-14.8 6.9-5.1 5.6-19.4 19-19.4 46.3 0 27.3 19.9 53.7 22.6 57.4 2.8 3.7 39.1 59.7 94.8 83.8 35.2 15.2 49 16.5 66.6 13.9 10.7-1.6 32.8-13.4 37.4-26.4 4.6-13 4.6-24.1 3.2-26.4-1.3-2.5-5-3.9-10.5-6.6z"/></svg>
                            </a>

                        </div>

                    </div>
                </div>

                <div x-data="{ open: false }">
                    <button
                        x-on:mouseover="open = true"
                        x-on:mouseleave="open = false" class="px-4 py-2 align-middle bg-white rounded-full ">...</button>
                    <div x-show="open"
                            x-transition:enter="transition ease-out duration-1500"
                            x-transition:enter-start="transform opacity-0 scale-95"
                            x-transition:enter-end="transform opacity-100 scale-100"
                            x-transition:leave="transition ease-in duration-1300"
                            x-transition:leave-start="transform opacity-100 scale-100"
                            x-transition:leave-end="transform opacity-0 scale-95"
                        class="relative">
                        <button
                            x-on:mouseover="open = true"
                            x-on:mouseleave="open = false"
                            class="absolute top-0 left-0 z-10 h-12 px-3 py-2 mt-2 text-sm text-red-500 bg-white rounded-full">
                            Reportar
                        </button>
                    </div>
                </div>
            </div>

        </div>
    </div>

</div>
@endsection
