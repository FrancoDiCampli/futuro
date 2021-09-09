@extends('layouts.main')

@section('content')
<div class="w-8/12 mx-auto bg-white rounded shadow">
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="mx-16 py-4 px-8 text-black text-xl font-bold border-b border-grey-500">Vacancy Creation</div>
    <form  action="{{route('jobs.store')}}" method="POST">
        @csrf
        <div class="py-4 px-8">
            {{-- Titulo --}}
            <div class="mb-4">
                <label class="block text-grey-darker text-sm font-bold mb-2">Title:</label>
                <input class=" border rounded w-full py-2 px-3 text-grey-darker" type="text"
                name="title" id="title" value="{{ old('title') }}" placeholder="Enter a title">

            </div>

            {{-- Categoria y subcategoria --}}
            <div class="flex justify-center ">
                <div class="mb-4 w-6/12 px-2">
                    <label class="block text-grey-darker text-sm font-bold mb-2">Category</label>
                    <select class=" border rounded w-full py-2 px-3 text-grey-darker" type="text"
                        name="category_id" >
                        @foreach ($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach

                    </select>

                </div>
                <div class="mb-4 w-6/12 px-2">
                    <label class="block text-grey-darker text-sm font-bold mb-2">Subcategory</label>
                    <select class=" border rounded w-full py-2 px-3 text-grey-darker" type="text"
                    name="subcategory_id" >
                    @foreach ($subcategories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach

                </select>
                </div>
            </div>

            {{-- Breve descripcion --}}
            <div class="mb-4">
                <label class="block text-grey-darker text-sm font-bold mb-2">Description</label>
                <textarea class=" border rounded w-full py-2 px-3 text-grey-darker" rows="4" type="text"
                    name="description" value="{{ old('title') }}" id="description" value="" >
                </textarea>
            </div>

            {{-- Candidato ideal  --}}
            <div class="mb-4">
                <label class="block text-grey-darker text-sm font-bold mb-2">Candidate</label>
                <textarea class=" border rounded w-full py-2 px-3 text-grey-darker" rows="4" type="text"
                    name="looking_for" id="looking_for" value="" >
                </textarea>
            </div>

            {{-- Pais Estado --}}
            <div class="flex justify-center ">
                <div class="mb-4 w-6/12 px-2">
                    <label class="block text-grey-darker text-sm font-bold mb-2">Country</label>
                    <select class=" border rounded w-full py-2 px-3 text-grey-darker" type="text"
                        name="country" >
                            <option value="Mexico">Mexico</option>
                    </select>

                </div>
                <div class="mb-4 w-6/12 px-2">
                    <label class="block text-grey-darker text-sm font-bold mb-2">State</label>
                    <select class=" border rounded w-full py-2 px-3 text-grey-darker" type="text"
                    name="city_id" >
                    @foreach ($cities as $state)
                        <option value="{{$state->id}}">{{$state->name}}</option>
                    @endforeach

                </select>
                </div>
            </div>

            {{-- Experiencia y Contratacion --}}
            <div class="flex justify-center ">
                <div class="mb-4 w-6/12 px-2">
                    <label class="block text-grey-darker text-sm font-bold mb-2">Experience</label>
                    <select class=" border rounded w-full py-2 px-3 text-grey-darker" type="text"
                        name="experience" >
                            <option value="Estudiante">Student</option>
                            <option value="Graduated">Graduated</option>
                            <option value="first_year">First year</option>
                            <option value="second_year">Second Year</option>
                    </select>

                </div>
                <div class="mb-4 w-6/12 px-2">
                    <label class="block text-grey-darker text-sm font-bold mb-2">Hiring</label>
                    <select class=" border rounded w-full py-2 px-3 text-grey-darker" type="text"
                    name="hiring" >
                    <option value="permanente">Permanent</option>
                    <option value="temporary">Temporary</option>
                    <option value="by_proyect">By Proyect</option>
                    <option value="scholar">Scholar</option>

                </select>
                </div>
            </div>

            {{-- Available y Schedule --}}
            <div class="flex justify-center ">
                <div class="mb-4 w-6/12 px-2">
                    <label class="block text-grey-darker text-sm font-bold mb-2">Available</label>
                    <select class=" border rounded w-full py-2 px-3 text-grey-darker" type="text"
                        name="available" >
                            <option value="full_time">Full time</option>
                            <option value="half_time">Half time</option>

                    </select>

                </div>
                <div class="mb-4 w-6/12 px-2">
                    <label class="block text-grey-darker text-sm font-bold mb-2">Schedule</label>
                    <select class=" border rounded w-full py-2 px-3 text-grey-darker" type="text"
                    name="schedule" >
                    <option value="morning">Morning</option>
                    <option value="afternoon">Aftenoon</option>
                    <option value="no_preference">No preference</option>
                </select>
                </div>
            </div>

            {{-- Paid and range  --}}
            <div class="flex justify-center ">
                <div class="mb-4 w-6/12 px-2">
                    <label class="block text-grey-darker text-sm font-bold mb-2">Paid</label>
                    <select class=" border rounded w-full py-2 px-3 text-grey-darker" type="text"
                        name="paid" >
                            <option value="yes">Yes</option>
                            <option value="no">No</option>

                    </select>

                </div>
                <div class="mb-4 w-6/12 px-2">
                    <label class="block text-grey-darker text-sm font-bold mb-2">Salary Pretended</label>
                    <select class=" border rounded w-full py-2 px-3 text-grey-darker" type="text"
                    name="schedule" >
                    <option value="100">0-100</option>
                    <option value="500">100-500</option>
                    <option value="1000">500-1000</option>
                </select>
                </div>
            </div>

            <h1>Additional data</h1>
            <div class="flex flex-wrap justify-between">
                <div class="w-3/12 px-2 flex items-center align-middle mx-2">
                    <input type="checkbox"  name="enterprise">
                    <label class="block text-grey-darker text-sm font-bold m-2">Enterprise</label>
                </div>
                <div class="w-3/12 px-2 flex items-center align-middle mx-2">
                    <input type="checkbox" name="visible">
                    <label class="block text-grey-darker text-sm font-bold m-2">Visible</label>
                </div>
            </div>


            <h1 class="text-xl ">Skills</h1>
            <div class="flex flex-wrap justify-between">
                @foreach ($experiences as $experience)
                <div class="w-3/12 px-2 flex items-center align-middle mx-2">
                    <input type="checkbox" value="{{$experience}}" name="skills[]">
                    <label class="block text-grey-darker text-sm font-bold m-2">{{$experience}}</label>
                </div>
                @endforeach
            </div>

            <div class="mb-4">
                <button type="submit"
                    class="mb-2 mx-16 rounded-full py-1 px-24 bg-gradient-to-r from-green-400 to-blue-500 ">
                    Save
                </button>
            </div>
        </div>
    </form>
</div>

@endsection
