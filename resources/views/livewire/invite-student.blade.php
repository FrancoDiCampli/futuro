<div class="p-10">
    <h1 class="text-2xl font-semibold text-main-blue text-center my-5">Selecciona una vacante</h1>
    <div class="row flex flex-wrap my-5">
        <select wire:model="vacancy_id" class="rounded-full border border-gray-200 text-base w-full px-5 focus:outline-none" name="vacancy_id" id="">
            @foreach ($vacancies as $vacancy)
                <option value="{{$vacancy->id}}">{{$vacancy->title}}</option>
            @endforeach
        </select>
    </div>

    <div class="row flex flex-wrap my-5 justify-between items-center">

        <button  wire:click="$emit('closeModal', 'invite-student')" type="button" class="border text-gray-500 font-semibold px-5 py-2 rounded-full">Cancelar</button>
        {{-- <button   wire:click="$emit('saveInvitation', 'invite-student')"  type="button" class="bg-main-blue text-white font-semibold px-5 py-2 rounded-full">Enviar invitación</button> --}}
        <button  wire:click="saveInvitation"  type="button" class="bg-main-blue text-white font-semibold px-5 py-2 rounded-full">Enviar invitación</button>
    </div>


</div>
