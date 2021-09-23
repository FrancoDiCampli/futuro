@extends('layouts.main')

@section('content')

<div class="w-10/12 mx-auto text-gray-700">
    <a class="text-xs text-main-blue font-semibold" href="{{route('vacancies.index')}}">Regresar</a>
    <div>
        <h1 class="text-4xl text-main-blue">{{$vacancy->title}}</h1>
    </div>
    <div class="flex items-center text-gray-700 my-5 text-sm">
        <svg aria-hidden="true" data-prefix="fas" data-icon="briefcase" class="h-5 svg-inline--fa fa-briefcase fa-w-16" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M320 336c0 8.84-7.16 16-16 16h-96c-8.84 0-16-7.16-16-16v-48H0v144c0 25.6 22.4 48 48 48h416c25.6 0 48-22.4 48-48V288H320v48zm144-208h-80V80c0-25.6-22.4-48-48-48H176c-25.6 0-48 22.4-48 48v48H48c-25.6 0-48 22.4-48 48v80h512v-80c0-25.6-22.4-48-48-48zm-144 0H192V96h128v32z"/></svg>
        <p class="mx-2">{{$vacancy->subcategory->category->name}} | {{$vacancy->subcategory->name}}</p>
    </div>
    <div class="flex items-center  my-5 text-sm">
        <svg aria-hidden="true" data-prefix="fas" data-icon="map-marker-alt" class="h-5 svg-inline--fa fa-map-marker-alt fa-w-12" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"><path fill="currentColor" d="M172.268 501.67C26.97 291.031 0 269.413 0 192 0 85.961 85.961 0 192 0s192 85.961 192 192c0 77.413-26.97 99.031-172.268 309.67-9.535 13.774-29.93 13.773-39.464 0zM192 272c44.183 0 80-35.817 80-80s-35.817-80-80-80-80 35.817-80 80 35.817 80 80 80z"/></svg>
        <p class="mx-2">{{$vacancy->city->name}}, {{$vacancy->city->state->name}}</p>
    </div>
    <h2 class="text-2xl font-bold">${{$vacancy->pretended}}</h2>

    <div class="container flex">
        <div class="content w-8/12 bg-white">
           <div class="paragraph p-5">
               <p class="text-base text-main-blue font-medium">¿De qué trata y qué vas a estar haciendo?</p>
               <p class="my-5">{{$vacancy->description}}</p>
           </div>

           <div class="paragraph p-5">
                <p class="text-base text-main-blue font-medium">¿Cómo es el candidato ideal para esta vacante?</p>
                <p class="my-5">{{$vacancy->looking_for}}</p>
            </div>

            {{-- Requisitos  --}}
            <div class="paragraph p-5 ">
                <p class="text-base text-main-blue font-medium">Requisitos</p>

                <div class="flex flex-wrap text-xs">
                    <div class="flex items-start w-4/12 my-5">
                        <svg aria-hidden="true" data-prefix="fas" data-icon="circle" class="m-1 h-2 text-lime svg-inline--fa fa-circle fa-w-16" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8z"/></svg>
                        <div>
                            <p>Experiencia</p>
                            <p class="font-semibold">Recien egresado</p>
                        </div>
                    </div>

                    <div class="flex items-start w-4/12 my-5">
                        <svg aria-hidden="true" data-prefix="fas" data-icon="circle" class="m-1 h-2 text-lime svg-inline--fa fa-circle fa-w-16" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8z"/></svg>
                        <div>
                            <p>Contratation</p>
                            <p class="font-semibold">{{$vacancy->hiring}}</p>
                        </div>
                    </div>

                    <div class="flex items-start w-4/12 my-5">
                        <svg aria-hidden="true" data-prefix="fas" data-icon="circle" class="m-1 h-2 text-lime svg-inline--fa fa-circle fa-w-16" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8z"/></svg>
                        <div>
                            <p>Disponibilidad</p>
                            <p class="font-semibold">{{$vacancy->available}}</p>
                        </div>
                    </div>

                    <div class="flex items-start w-4/12 my-5">
                        <svg aria-hidden="true" data-prefix="fas" data-icon="circle" class="m-1 h-2 text-lime svg-inline--fa fa-circle fa-w-16" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8z"/></svg>
                        <div>
                            <p>Horario</p>
                            <p class="font-semibold">{{$vacancy->schedule}}</p>
                        </div>
                    </div>

                </div>


            </div>

            {{-- Habilidades  --}}
            <div class="paragraph p-5">
                <p class="text-base text-main-blue font-medium">Habilidades destacadas</p>

                <div class="flex flex-wrap text-xs">
                    @foreach ($vacancy->skills as $skill)

                    <div class="flex items-start w-4/12 px-5">
                        <svg aria-hidden="true" data-prefix="fas" data-icon="circle" class="m-1 h-2 text-lime svg-inline--fa fa-circle fa-w-16" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8z"/></svg>
                        <div>
                            <p>{{$skill}}</p>
                        </div>
                    </div>
                    @endforeach

                </div>


            </div>
        </div>

        <div class="aside w-4/12 ">
            <div class="card bg-white items-center text-center mx-5">
                <div class="logo pt-2">
                    <img class="h-16 mx-auto" src="{{asset('img/logos/logo.png')}}" alt="">
                </div>
                <div class="my-5">
                    <h1 class="text-center font-semibold">{{$vacancy->recruiter->name}}</h1>
                    <div class="flex  justify-center">
                        <svg aria-hidden="true" data-prefix="fas" data-icon="map-marker-alt" class="h-4 svg-inline--fa fa-map-marker-alt fa-w-12" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"><path fill="currentColor" d="M172.268 501.67C26.97 291.031 0 269.413 0 192 0 85.961 85.961 0 192 0s192 85.961 192 192c0 77.413-26.97 99.031-172.268 309.67-9.535 13.774-29.93 13.773-39.464 0zM192 272c44.183 0 80-35.817 80-80s-35.817-80-80-80-80 35.817-80 80 35.817 80 80 80z"/></svg>
                        <p class="text-xs mx-1">{{$vacancy->city->name}}</p>
                    </div>
                </div>
                <div class="my-5">
                    <h2 class="text-xl text-main-blue font-semibold">{{$vacancy->subcategory->category->name}}</h2>
                    <p class="text-xs">{{$vacancy->subcategory->name}}</p>
                </div>

                <div class="flex  justify-center items-center my-5 bg-lime text-white px-5 py-2 w-8/12 mx-auto rounded-full">
                   <p class="bg-white text-gray-700 rounded-full px-1 mx-2">10</p><p class="font-semibold">Vacantes</p>
                </div>

                <div class="py-2">
                    <a href="#" class="flex  justify-center text-xs items-center text-main-blue font-semibold">Ver vacantes
                    <svg aria-hidden="true" data-prefix="fas" data-icon="arrow-right" class="h-4 block svg-inline--fa fa-arrow-right fa-w-14" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="m190.5 66.9 22.2-22.2c9.4-9.4 24.6-9.4 33.9 0L441 239c9.4 9.4 9.4 24.6 0 33.9L246.6 467.3c-9.4 9.4-24.6 9.4-33.9 0l-22.2-22.2c-9.5-9.5-9.3-25 .4-34.3L311.4 296H24c-13.3 0-24-10.7-24-24v-32c0-13.3 10.7-24 24-24h287.4L190.9 101.2c-9.8-9.3-10-24.8-.4-34.3z"/></svg>
                    </a>
                 </div>
            </div>
            <form action="{{route('postulation')}}" method="POST">
                @csrf
                <input type="hidden" name="vacancy_id" value="{{$vacancy->id}}">
                <button type="submit" class="flex items-center w-10/12 mx-auto justify-center text-center bg-main-blue text-white m-5 rounded-full py-2">
                    <p>Postularme</p>
                    <svg aria-hidden="true" data-prefix="fas" data-icon="arrow-up" class="h-4 svg-inline--fa fa-arrow-up fa-w-14" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="m34.9 289.5-22.2-22.2c-9.4-9.4-9.4-24.6 0-33.9L207 39c9.4-9.4 24.6-9.4 33.9 0l194.3 194.3c9.4 9.4 9.4 24.6 0 33.9L413 289.4c-9.5 9.5-25 9.3-34.3-.4L264 168.6V456c0 13.3-10.7 24-24 24h-32c-13.3 0-24-10.7-24-24V168.6L69.2 289.1c-9.3 9.8-24.8 10-34.3.4z"/></svg>

                </button>


            </form>
            <div class="flex items-center w-10/12 mx-auto justify-center">
                <div class="bg-white px-5 py-2 rounded-full w-10/12 border border-main-blue mx-5 text-center">
                    Compartir
                </div>
                <div class="bg-white px-4 py-2 rounded-full align-middle ">...</div>
            </div>

        </div>
    </div>

</div>
@endsection
