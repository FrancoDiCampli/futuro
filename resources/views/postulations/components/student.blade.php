<div class="p-5 paragraph">
    <p class="font-medium text-main-blue">Discurso elevador</p>
    <p class="my-2">{{$postulation->student->speech}}</p>
</div>

<div class="flex">
    <div class="p-5 paragraph">
        <p class="font-medium  text-main-blue">Disponibilidad</p>
        <p class="my-2">{{$postulation->student->available}}</p>
    </div>
    <div class="p-5 paragraph">
        <p class="font-medium  text-main-blue">Horario de preferencia</p>
        <p class="my-2">{{$postulation->student->preference}}</p>
    </div>
    <div class="p-5 paragraph">
        <p class="font-medium  text-main-blue">Sitio web / enlace</p>
        <p class="my-2">{{$postulation->student->website}}</p>
    </div>
</div>

<div class="p-5 paragraph">
    <p class="font-medium  text-main-blue">Habilidades destacadas</p>
    <div class="flex flex-wrap text-xs">
        @if(isset($postulation->student->skills))
        @foreach ($postulation->student->skills as $skill)

        <div class="flex items-start w-4/12 px-5">
            <svg aria-hidden="true" data-prefix="fas" data-icon="circle" class="h-2 m-1 text-lime svg-inline--fa fa-circle fa-w-16" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8z"/></svg>
            <p class="">{{$skill}}</p>

        </div>
        @endforeach
        @else
            <p>No posee habilidades destacadas</p>
        @endif
    </div>
</div>

<div class="p-5 paragraph">
    <p class="font-medium  text-main-blue">Idiomas</p>
    <div class="flex flex-wrap text-xs">
        @foreach ($postulation->student->languages as $language)

        <div class="flex items-start w-4/12 px-5">
            <svg aria-hidden="true" data-prefix="fas" data-icon="circle" class="h-2 m-1 text-lime svg-inline--fa fa-circle fa-w-16" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8z"/></svg>
            <p class="">{{$language->name}}</p>
            <p>Nivel: {{$language->pivot->level}}</p>

        </div>
        @endforeach
    </div>
</div>
<div class="p-5 paragraph">
    <p class="font-medium text-main-blue">Cursos adicionales y certificaciones</p>
    <p class="my-2">{{$postulation->student->courses}}</p>
</div>

<div class="p-5 paragraph">
    <p class="font-medium text-main-blue">Hobbies</p>
    <p class="my-2">{{$postulation->student->hobbies}}</p>
</div>

<div class="p-5 paragraph">
    <p class="font-medium  text-main-blue">Software</p>
    <div class="flex flex-wrap text-xs">
        @foreach ($postulation->student->softwares as $software)

        <div class="flex items-start w-4/12 px-5">
            <svg aria-hidden="true" data-prefix="fas" data-icon="circle" class="h-2 m-1 text-lime svg-inline--fa fa-circle fa-w-16" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8z"/></svg>
            <p class="">{{$software->name}}</p>
            <p> Nivel: {{$software->pivot->level}}</p>

        </div>
        @endforeach
    </div>
</div>
