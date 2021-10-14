@extends('layouts.main')


@section('content')

    <div class="h-48 p-10 text-center text-white header bg-main-blue">
       <h1 class="text-2xl font-semibold">Crear vacante</h1>
       <p class="my-5 text-sm">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Autem facere repellat.</p>
    </div>

    <div class="w-8/12 mx-auto bg-white content">
        <div class="flex flex-wrap row">
            <div class="w-6/12 px-10 py-5">
                <label for="" class="block px-5 text-base font-semibold text-main-blue">Tipo plan</label>
                <select class="w-full px-5 text-base border border-gray-200 rounded-full focus:outline-none"
                    name="plan" id="">
                    <option value="basico" > Basico</option>
                    <option value="vip" >VIP </option>

                </select>
            </div>
        </div>

        <div class="flex flex-wrap row">
            <div class="w-6/12 px-10 py-5">
                <label for="" class="block px-5 text-base font-semibold text-main-blue">Metodo de Pago</label>
            </div>
        </div>

        <div class="flex justify-end">
            <button type="button"  onclick="Livewire.emit('openModal', 'create-card')" class="text-sm text-right text-main-blue">Utilizar otro método de pago -></button>
        </div>

    </div>
@endsection
