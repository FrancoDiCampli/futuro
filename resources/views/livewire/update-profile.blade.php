@extends('layouts.main')

@section('content')

<div class="w-10/12 mx-auto">


    <div class="title">
        <div class="text-center text-white bg-main-blue">
            <h1 class="py-5 text-2xl font-medium">Editar perfil <span class="font-semibold">estudiante {{$student->first_name}}</span></h1>
            <p class="w-6/12 py-5 mx-auto text-sm">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam dolor enim, lacinia et sem et, rhoncus pharetra orci.</p>
        </div>
        {{-- <pre>{{$validatedData}}</pre> --}}
    </div>

    <div class="main-content">
        <div class="flex justify-center w-10/12 mx-auto content">

            <div class="w-full wizard">
                <div class="flex justify-center my-5 wizard-menu">
                    <a href="#step-1" type="button"
                        class="mx-5 rounded-full px-5 py-2  {{ $currentStep != 1 ? 'bg-main-blue text-white' : 'bg-white text-gray-700' }}">Perfil</a>
                    <a href="#step-2" type="button"
                        class="mx-5 rounded-full px-5 py-2  {{ $currentStep != 2 ? 'bg-main-blue text-white' : 'bg-white text-gray-700' }}">Educacion</a>
                        <a href="#step-2" type="button"
                        class="mx-5 rounded-full px-5 py-2  {{ $currentStep != 3 ? 'bg-main-blue text-white' : 'bg-white text-gray-700' }}">Experiencia</a>
                    <a href="#step-4" type="button"
                        class="mx-5 rounded-full px-5 py-2  {{ $currentStep != 4 ? 'bg-main-blue text-white' : 'bg-white text-gray-700' }}">Psicometrica</a>

                </div>
                <p>Paso {{ $currentStep}}</p>
                <div class="mx-auto bg-white wizard-content">

                        <div class="row {{ $currentStep != 1 ? 'hidden' : '' }}" id="step-1">
                            <div class="flex flex-wrap px-5 row">
                                <div class="w-6/12 px-5 py-5">
                                    <label for="" class="block px-5 text-sm font-semibold text-main-blue">Nombre*</label>
                                    <input class="rounded-full border border-gray-200 text-sm w-full px-5
                                        @error('first_name') border-red-500 @enderror"
                                        type="text" placeholder="Nombre"  name="first_name"
                                        wire:model.defer="first_name" >
                                   <span class="text-xs text-red-500 "> @error('first_name'){{ $message }}@enderror</span>
                                </div>
                                <div class="w-6/12 px-5 py-5">
                                    <label for="" class="block px-5 text-sm font-semibold text-main-blue">Apellido*</label>
                                    <input class="rounded-full border border-gray-200 text-sm w-full px-5 @error('last_name') border-red-500 @enderror"
                                        type="text" placeholder="Apellido"  name="last_name"
                                        wire:model.defer="last_name">
                                    <span class="text-xs text-red-500 ">@error('last_name'){{ $message }}@enderror</span>
                                </div>
                            </div>


                            <button type="button" wire:click="firstSubmit">Next</button>
                        </div>

                        <div class="row {{ $currentStep != 2 ? 'hidden' : '' }}" id="step-2">
                            Step 2
                        </div>

                        <div class="row {{ $currentStep != 3 ? 'hidden' : '' }}" id="step-3">
                            Step 3
                        </div>
                        <div class="row {{ $currentStep != 4 ? 'hidden' : '' }}" id="step-4">
                            Step 4
                        </div>

                </div>

            </div>
        </div>
    </div>
</div>
@endsection
