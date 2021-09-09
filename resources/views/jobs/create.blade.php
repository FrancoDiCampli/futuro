@extends('layouts.main')

@section('content')

<div class="w-10/12 mx-auto">


    <div class="title">
        <div class="bg-main-blue text-white text-center">
            <h1 class="text-2xl font-medium py-5">Crear <span class="font-semibold">vacante</span></h1>
            <p class="text-sm w-6/12 mx-auto py-5">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam dolor enim, lacinia et sem et, rhoncus pharetra orci.</p>
        </div>

    </div>

    <div class="form bg-white">

    <form  action="{{route('jobs.store')}}" method="POST" class="mb-10 py-2">
        @csrf
        <input type="text" name="country" value="1" hidden>
        {{-- Titulo --}}
        <div class="row px-10 py-5">
            <label for="" class="text-base text-main-blue block font-semibold px-5">Titulo</label>
            <input class="rounded-full border border-gray-200 text-base w-full px-5 @error('title') border-red-500 @enderror" type="text" placeholder="Titulo"  name="title" id="title" value="{{ old('title') }}">
            @error('title')<span class="text-xs text-red-500 ">{{ $message }}</span>@enderror
        </div>

        {{-- Categoria y sub  --}}
        <div class="row flex flex-wrap">
            <div class="px-10 py-5 w-6/12">
                <label for="" class="text-base text-main-blue block font-semibold px-5">Categoria</label>
                <select class="rounded-full border border-gray-200 text-base w-full px-5 focus:outline-none" name="category_id" id="">
                    @foreach ($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="px-10 py-5 w-6/12">
                <label for="" class="text-base text-main-blue block font-semibold px-5">Subcategoria</label>
                <select class="rounded-full border border-gray-200 text-base w-full px-5 focus:outline-none" name="subcategory_id" id="">
                    @foreach ($subcategories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="row px-10 py-5">
            <label for="" class="text-base text-main-blue block font-semibold px-5">Breve Descripcion</label>
            <textarea class="border border-gray-200 text-base w-full px-5 focus:outline-none @error('description') border-red-500 @enderror" name="description" id="" cols="30" rows="5" placeholder="¿De qué trata y qué vas a estar haciendo?"></textarea>
            @error('description')<span class="text-xs text-red-500 ">{{$message}}</span>@enderror

        </div>

        <div class="row px-10 py-5">
            <label for="" class="text-base text-main-blue block font-semibold px-5">Candidato ideal</label>
            <textarea class="border border-gray-200 text-base w-full px-5 focus:outline-none @error('description') border-red-500 @enderror" name="looking_for" id="" cols="30" rows="5" placeholder="¿Cómo es el candidato ideal para esta vacante?"></textarea>
            @error('looking_for')<span class="text-xs text-red-500 ">{{$message}}</span>@enderror

        </div>

        {{-- Pais Estado --}}
        <div class="row flex flex-wrap">

            <div class="px-10 py-5 w-6/12">
                <label for="" class="text-base text-main-blue block font-semibold px-5">Estado</label>
                <select class="rounded-full border border-gray-200 text-base w-full px-5 focus:outline-none" name="state_id" id="">
                    @foreach ($states as $state)
                        <option value="{{$state->id}}">{{$state->name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="px-10 py-5 w-6/12">
                <label for="" class="text-base text-main-blue block font-semibold px-5">Ciudad</label>
                <select class="rounded-full border border-gray-200 text-base w-full px-5 focus:outline-none" name="city_id" id="">
                    @foreach ($cities as $city)
                        <option value="{{$city->id}}">{{$city->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>

        {{-- Expreciencia contratacion --}}
        <div class="row flex flex-wrap">
            <div class="px-10 py-5 w-6/12">
                <label for="" class="text-base text-main-blue block font-semibold px-5">Experiencia</label>
                <select class="rounded-full border border-gray-200 text-base w-full px-5 focus:outline-none" name="experience" id="">
                    <option value="Estudiante">Student</option>
                    <option value="Graduated">Graduated</option>
                    <option value="first_year">First year</option>
                    <option value="second_year">Second Year</option>
                </select>
            </div>
            <div class="px-10 py-5 w-6/12">
                <label for="" class="text-base text-main-blue block font-semibold px-5">Contratacion</label>
                <select class="rounded-full border border-gray-200 text-base w-full px-5 focus:outline-none" name="hiring" id="">
                    <option value="permanente">Permanent</option>
                    <option value="temporary">Temporary</option>
                    <option value="by_proyect">By Proyect</option>
                    <option value="scholar">Scholar</option>
                </select>
            </div>
        </div>

        {{-- Disponibilidad horario preferencia --}}
        <div class="row flex flex-wrap">
            <div class="px-10 py-5 w-6/12">
                <label for="" class="text-base text-main-blue block font-semibold px-5">Disponibilidad</label>
                <select class="rounded-full border border-gray-200 text-base w-full px-5 focus:outline-none"
                    name="available" id="">
                    <option value="full_time">Full time</option>
                    <option value="half_time">Half time</option>
                </select>
            </div>
            <div class="px-10 py-5 w-6/12">
                <label for="" class="text-base text-main-blue block font-semibold px-5">Horario de preferiencia</label>
                <select class="rounded-full border border-gray-200 text-base w-full px-5 focus:outline-none" name="schedule" id="">
                    <option value="morning">Morning</option>
                    <option value="afternoon">Aftenoon</option>
                    <option value="no_preference">No preference</option>
                </select>
            </div>
        </div>

        {{-- Remunerado salario --}}
        <div class="row flex flex-wrap">
            <div class="px-10 py-5 w-6/12">
                <label for="" class="text-base text-main-blue block font-semibold px-5">Remunerado</label>
                <select class="rounded-full border border-gray-200 text-base w-full px-5 focus:outline-none"
                    name="paid" id="">
                    <option value="0">Yes</option>
                    <option value="1">No</option>
                </select>
            </div>
            <div class="px-10 py-5 w-6/12">
                <label for="" class="text-base text-main-blue block font-semibold px-5">Rango de salario mensua</label>
                <select class="rounded-full border border-gray-200 text-base w-full px-5 focus:outline-none"
                    name="pretended" id="">
                    <option value="100">0-100</option>
                    <option value="500">100-500</option>
                    <option value="1000">500-1000</option>
                </select>
            </div>
        </div>

        {{-- Habilidades destacadas  --}}
        <div class="row px-10 py-5">
            <label for="" class="text-base text-main-blue block font-semibold px-5">Habilidades destacadas</label>

            <div class="flex flex-wrap">
                @foreach ($skills as $skill)
                <div class="w-3/12 px-2 flex items-start my-5">
                    <input type="checkbox" class="rounded-sm border-gray-200 mt-1 focus:outline-none"
                        name="skills[]"
                        value="{{$skill}}">
                    <label class="block font-semibold text-gray-400 mx-2">{{$skill}}</label>
                </div>
                @endforeach
            </div>

        </div>

        {{-- Mostrar en perfil de empresa --}}
        <div class="row px-10 py-5">
            <label for="" class="text-base text-main-blue block font-semibold px-5">¿Mostrar vacante en perfil de la empresa?</label>
            <div class="flex flex-wrap">
                <div class="w-3/12 px-2 flex items-start my-5">
                    <input type="checkbox" class="rounded-sm border-gray-200 mt-1 focus:outline-none" name="enterprise" >
                    <label class="block font-semibold text-gray-400 mx-2">Mostrar?</label>
                </div>

                <div class="w-3/12 px-2 flex items-start my-5">
                    <input type="checkbox" class="rounded-sm border-gray-200 mt-1 focus:outline-none" name="visible" >
                    <label class="block font-semibold text-gray-400 mx-2">Visible?</label>
                </div>
            </div>
        </div>

        <div class="flex justify-center">
            <button type="submit" class="bg-main-blue text-white font-semibold px-5 py-2 rounded-full">Siguiente</button>
        </div>

    </form>

    </div>


</div>
@endsection
