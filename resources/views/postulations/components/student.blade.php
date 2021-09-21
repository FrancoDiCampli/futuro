<div class="paragraph p-5">
    <p class="text-main-blue font-medium">Discurso elevador</p>
    <p class="my-2">{{$postulation->student->speech}}</p>
</div>

<div class="flex">
    <div class="paragraph p-5">
        <p class=" text-main-blue font-medium">Disponibilidad</p>
        <p class="my-2">{{$postulation->student->available}}</p>
    </div>
    <div class="paragraph p-5">
        <p class=" text-main-blue font-medium">Horario de preferencia</p>
        <p class="my-2">{{$postulation->student->preference}}</p>
    </div>
    <div class="paragraph p-5">
        <p class=" text-main-blue font-medium">Sitio web / enlace</p>
        <p class="my-2">{{$postulation->student->website}}</p>
    </div>
</div>

<div class="paragraph p-5">
    <p class=" text-main-blue font-medium">Habilidades destacadas</p>
    <div class="flex flex-wrap text-xs">
        @foreach ($postulation->student->skills as $skill)

        <div class="flex items-start w-4/12 px-5">
            <svg aria-hidden="true" data-prefix="fas" data-icon="circle" class="m-1 h-2 text-lime svg-inline--fa fa-circle fa-w-16" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8z"/></svg>
            <p class="">{{$postulation->skill}}</p>

        </div>
        @endforeach
    </div>
</div>

<div class="paragraph p-5">
    <p class=" text-main-blue font-medium">Idiomas</p>
    <div class="flex flex-wrap text-xs">
        @foreach ($postulation->student->languages as $language)

        <div class="flex items-start w-4/12 px-5">
            <svg aria-hidden="true" data-prefix="fas" data-icon="circle" class="m-1 h-2 text-lime svg-inline--fa fa-circle fa-w-16" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8z"/></svg>
            <p class="">{{$language->name}}</p>
            <p>Nivel: {{$language->pivot->level}}</p>

        </div>
        @endforeach
    </div>
</div>
<div class="paragraph p-5">
    <p class="text-main-blue font-medium">Cursos adicionales y certificaciones</p>
    <p class="my-2">{{$postulation->student->courses}}</p>
</div>

<div class="paragraph p-5">
    <p class="text-main-blue font-medium">Hobbies</p>
    <p class="my-2">{{$postulation->student->hobbies}}</p>
</div>

<div class="paragraph p-5">
    <p class=" text-main-blue font-medium">Software</p>
    <div class="flex flex-wrap text-xs">
        @foreach ($postulation->student->softwares as $software)

        <div class="flex items-start w-4/12 px-5">
            <svg aria-hidden="true" data-prefix="fas" data-icon="circle" class="m-1 h-2 text-lime svg-inline--fa fa-circle fa-w-16" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8z"/></svg>
            <p class="">{{$software->name}}</p>
            <p> Nivel: {{$software->pivot->level}}</p>

        </div>
        @endforeach
    </div>
</div>
