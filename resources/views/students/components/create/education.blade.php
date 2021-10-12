<div class="row flex flex-wrap px-5">
    <div class="px-5 py-5 w-6/12">
        <label for="" class="text-base text-main-blue block font-semibold px-5">Categoria</label>
        <select class="rounded-full border border-gray-200 text-base w-full px-5 focus:outline-none" name="category_id" id="">
            @foreach ($categories as $category)
            <option value="{{ $category->id }}" {{ ( $category->id == $student->subcategory->category->id) ? 'selected' : '' }}> {{ $category->name }} </option>
            @endforeach
        </select>
    </div>

    <div class="px-5 py-5 w-6/12">
        <label for="" class="text-base text-main-blue block font-semibold px-5">Subcategoria</label>
        <select class="rounded-full border border-gray-200 text-base w-full px-5 focus:outline-none" name="category_id" id="">
            @foreach ($subcategories as $subcategory)
            <option value="{{ $subcategory->id }}" {{ ( $subcategory->id == $student->subcategory->id) ? 'selected' : '' }}> {{ $subcategory->name }} </option>
            @endforeach
        </select>
    </div>
</div>


<div class="px-10 py-5 ">
    <label for="" class="text-base text-main-blue block font-semibold px-5">Experiencia</label>
    <select class="rounded-full border border-gray-200 text-base w-full px-5 focus:outline-none"
        name="experience" id="">
        <option value="Estudiante" {{($student->experience ==='Estudiante') ? 'selected' : ''}}> Estudiante </option>
        <option value="Graduado" {{($student->experience ==='Graduado') ? 'selected' : ''}}> Graduado </option>
        <option value="1er año" {{($student->experience ==='1er año') ? 'selected' : ''}}> 1er año </option>
        <option value="2do año" {{($student->experience ==='2do año') ? 'selected' : ''}}> 2do año </option>

    </select>
</div>

<div class="row flex flex-wrap px-5">
    <div class="px-5 py-5 w-6/12">
        <label for="" class="text-base text-main-blue block font-semibold px-5">Universidad</label>
        <input class="rounded-full border border-gray-200 text-base w-full px-5 @error('university') border-red-500 @enderror" type="text" placeholder="Universidad"  name="university" id="university" value="{{$student->university }}">
        @error('university')<span class="text-xs text-red-500 ">{{ $message }}</span>@enderror
    </div>
    <div class="px-5 py-5 w-4/12">
        <label for="" class="text-base text-main-blue block font-semibold px-5">Graduado</label>
        <input type="date" class="rounded-full border border-gray-200 text-base w-full px-5 @error('graduated_at') border-red-500 @enderror"    name="graduated_at" id="graduated_at" value="{{ $student->graduated_at}}">
        @error('graduated_at')<span class="text-xs text-red-500 ">{{ $message }}</span>@enderror
    </div>
    <div class="px-5 py-5 w-2/12">
        <label for="" class="text-base text-main-blue block font-semibold px-5">Promedio</label>
        <input class="rounded-full border border-gray-200 text-base w-full px-5 @error('average') border-red-500 @enderror" type="text"   name="average" id="average" value="{{ $student->average }}">
        @error('average')<span class="text-xs text-red-500 ">{{ $message }}</span>@enderror
    </div>
</div>



<div class="row px-5 py-5">
    <label for="" class="text-base text-main-blue block font-semibold px-5">Cursos adicionales y certificaciones</label>
    <textarea class="border border-gray-200 text-base w-full px-5 focus:outline-none @error('courses') border-red-500 @enderror" name="courses" id="" cols="30" rows="5" placeholder="Cursos">
        {{$student->courses}}
    </textarea>
    @error('courses')<span class="text-xs text-red-500 ">{{$message}}</span>@enderror
</div>

<div class="row px-5 py-5">
    <label for="" class="text-base text-main-blue block font-semibold px-5">Habilidades destacadas</label>

    <div class="flex flex-wrap">
        @foreach ($skills as $skill)
        <div class="w-3/12 px-2 flex items-start my-5">

            <input type="checkbox" class="rounded-sm border-gray-200 mt-1 focus:outline-none"
            @php
                $checked =  array_search($skill, $student->skills);
            @endphp
                {{ ( $checked) ? 'checked' : '' }}
                name="skills[]"
                value="{{$skill}}">
            <label class="block font-semibold text-gray-400 mx-2">{{$skill}}</label>
        </div>
        @endforeach
    </div>
</div>
