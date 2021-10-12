<form action="{{route('update.student.education',$student)}}" method="POST">
    @method('PUT')
    @csrf
<div class="flex flex-wrap px-5 row">
    <div class="w-6/12 px-5 py-5">
        <label for="" class="block px-5 text-base font-semibold text-main-blue">Categoria</label>
        <select class="w-full px-5 text-base border border-gray-200 rounded-full focus:outline-none" name="category_id" id="">
            @foreach ($categories as $category)
            @if(isset($student->subcategory_id))
            <option value="{{ $category->id }}" {{ ( $category->id == $student->subcategory->category->id) ? 'selected' : '' }}> {{ $category->name }} </option>
            @else
            <option value="{{ $category->id }}" > {{ $category->name }} </option>
            @endif
            @endforeach
        </select>
    </div>

    <div class="w-6/12 px-5 py-5">
        <label for="" class="block px-5 text-base font-semibold text-main-blue">Subcategoria</label>
        <select class="w-full px-5 text-base border border-gray-200 rounded-full focus:outline-none" name="subcategory_id" id="">
            @foreach ($subcategories as $subcategory)
            @if(isset($student->subcategory_id))
            <option value="{{ $subcategory->id }}" {{ ( $subcategory->id == $student->subcategory->id) ? 'selected' : '' }}> {{ $subcategory->name }} </option>
            @else
            <option value="{{ $subcategory->id }}" > {{ $subcategory->name }} </option>

            @endif
            @endforeach
        </select>
        @error('subcategory_id')<span class="text-xs text-red-500 ">{{ $message }}</span>@enderror
    </div>
</div>


<div class="px-10 py-5 ">
    <label for="" class="block px-5 text-base font-semibold text-main-blue">Experiencia</label>
    <select class="w-full px-5 text-base border border-gray-200 rounded-full focus:outline-none"
        name="experience" id="">
        <option value="Estudiante" {{($student->experience ==='Estudiante') ? 'selected' : ''}}> Estudiante </option>
        <option value="Graduado" {{($student->experience ==='Graduado') ? 'selected' : ''}}> Graduado </option>
        <option value="1er año" {{($student->experience ==='1er año') ? 'selected' : ''}}> 1er año </option>
        <option value="2do año" {{($student->experience ==='2do año') ? 'selected' : ''}}> 2do año </option>

    </select>
</div>

<div class="flex flex-wrap px-5 row">
    <div class="w-6/12 px-5 py-5">
        <label for="" class="block px-5 text-base font-semibold text-main-blue">Universidad</label>
        <input class="rounded-full border border-gray-200 text-base w-full px-5 @error('university') border-red-500 @enderror" type="text" placeholder="Universidad"  name="university" id="university" value="{{$student->university }}">
        @error('university')<span class="text-xs text-red-500 ">{{ $message }}</span>@enderror
    </div>
    <div class="w-4/12 px-5 py-5">
        <label for="" class="block px-5 text-base font-semibold text-main-blue">Graduado</label>

        <input type="date" class="rounded-full border border-gray-200 text-base w-full px-5 @error('graduated_at') border-red-500 @enderror"    name="graduated_at"
        id="graduated_at" value="{{$student->graduated_at ? $student->graduated_at->format('Y-m-d') : null}}">
        <span class="text-xs text-red-500 ">@error('graduated_at'){{ $message }}@enderror</span>
    </div>
    <div class="w-2/12 px-5 py-5">
        <label for="" class="block px-5 text-base font-semibold text-main-blue">Promedio</label>
        <input class="rounded-full border border-gray-200 text-base w-full px-5 @error('average') border-red-500 @enderror" type="text"   name="average" id="average" value="{{ $student->average }}">
        @error('average')<span class="text-xs text-red-500 ">{{ $message }}</span>@enderror
    </div>
</div>



<div class="px-5 py-5 row">
    <label for="" class="block px-5 text-base font-semibold text-main-blue">Cursos adicionales y certificaciones</label>
    <textarea class="border border-gray-200 text-base w-full px-5 focus:outline-none @error('courses') border-red-500 @enderror" name="courses" id="" cols="30" rows="5" placeholder="Cursos">
        {{$student->courses}}
    </textarea>
    @error('courses')<span class="text-xs text-red-500 ">{{$message}}</span>@enderror
</div>

<div class="px-5 py-5 row">
    <label for="" class="block px-5 text-base font-semibold text-main-blue">Habilidades destacadas</label>

    <div class="flex flex-wrap">
        @foreach ($skills as $skill)
        <div class="flex items-start w-3/12 px-2 my-5">

            <input type="checkbox" class="mt-1 border-gray-200 rounded-sm focus:outline-none"
            @php
                $checked= null;
                if(isset($student->skills)) $checked =  array_search($skill, $student->skills) ;
            @endphp
                {{ ( $checked) ? 'checked' : '' }}
                name="skills[]"
                value="{{$skill}}">
            <label class="block mx-2 font-semibold text-gray-400">{{$skill}}</label>
        </div>
        @endforeach
    </div>
</div>
<div class="flex justify-center">

    <button type="submit" class="px-5 py-2 text-white rounded-full bg-main-blue">Guardar</button>
</div>
</form>
