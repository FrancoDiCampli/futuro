<div>
    <h1 class="text-2xl font-semibold text-main-blue text-center p-5">¿Deseas postularte para esta vacante?{{$vacancy->id}}</h1>
    <div class="flex justify-around items-center p-5">
        <button  wire:click='$emit("closeModal", "studen-postulation")' type="button" class="w-5/12 border text-gray-500 rounded-full px-5 py-2 ">Cancelar</button>
        <button wire:click='Livewire.emit("savePostulation", "student-postulation",{{json_encode(['vacancy'=>$vacancy->id])}}}})' type="button" class="w-5/12 bg-main-blue text-white rounded-full px-5 py-2 ">Postularme</button>
        {{-- <form action="{{route('postulation')}}" method="POST" class="w-6/12 mx-5 ">
            @csrf
            <input type="hidden" name="vacancy_id" wire:model="vacancy">
            <button type="submit" class="flex items-center mx-auto w-full justify-center text-center bg-main-blue text-white m-5 rounded-full py-2">
                Postularme
            </button>
        </form> --}}
    </div>

</div>
