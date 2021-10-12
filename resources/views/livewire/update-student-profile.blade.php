@extends('layouts.main')

@section('content')

<div class="w-10/12 mx-auto">


    <div class="title">
        <div class="text-center text-white bg-main-blue">
            <h1 class="py-5 text-2xl font-medium">Editar perfil <span class="font-semibold">estudiante</span></h1>
            <p class="w-6/12 py-5 mx-auto text-sm">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam dolor enim, lacinia et sem et, rhoncus pharetra orci.</p>
        </div>
        {{-- <pre>{{$validatedData}}</pre> --}}
    </div>

    <div class="main-content">
        <div class="flex justify-center w-10/12 mx-auto content">

            <div class="w-full wizard">
                <div class="flex justify-center my-5 wizard-menu">
                    <a href="#step-1" type="button" x-on:click
                    class="mx-5 rounded-full px-5 py-2  {{ $currentStep != 1 ? 'bg-main-blue text-white' : 'bg-white text-gray-700' }}">Perfil</a>
                    <a href="#step-2" type="button"
                    class="mx-5 rounded-full px-5 py-2  {{ $currentStep != 2 ? 'bg-main-blue text-white' : 'bg-white text-gray-700' }}">Educacion</a>
                    <a href="#step-3" type="button"
                    class="mx-5 rounded-full px-5 py-2  {{ $currentStep != 3 ? 'bg-main-blue text-white' : 'bg-white text-gray-700' }}">Experience</a>
                    <a href="#step-4" type="button"
                    class="mx-5 rounded-full px-5 py-2  {{ $currentStep != 4 ? 'bg-main-blue text-white' : 'bg-white text-gray-700' }}">Psicometrica</a>

                </div>
                <p>Paso {{ $currentStep}}</p>

                <div class="mx-auto bg-white wizard-content">
                    <form wire:submit.prevent='submitAll' >
                        <div class="row {{ $currentStep != 1 ? 'hidden' : '' }}" id="step-2">
                            @include('livewire.profile.personal')

                            <div class="flex justify-center my-5">

                                <button type="button" wire:click="firstStepSubmit" class="w-32 px-5 py-2 mx-auto text-white rounded-full bg-main-blue">Siguiente</button>
                            </div>

                        </div>
                        <div class="row {{ $currentStep != 2 ? 'hidden' : '' }}" id="step-2">
                            {{-- @include('livewire.profile.education') --}}
                        </div>
                        <div class="row {{ $currentStep != 3 ? 'hidden' : '' }}" id="step-3">
                            {{-- @include('livewire.profile.experience') --}}
                        </div>
                    </form>
                </div>
            </div>

        </div>




    </div>






</div>


@endsection
