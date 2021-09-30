<div>
    <h1 class="text-2xl font-semibold text-main-blue text-center p-5">¿Deseas postularte para esta vacante?</h1>

    <div class="flex justify-around items-center p-5">
        <button  wire:click='$emit("closeModal", "studen-postulation")' type="button" class="w-5/12 border text-gray-500 rounded-full px-5 py-2 ">Cancelar</button>
        <button wire:click="savePostulation" type="button" class="w-5/12 bg-main-blue text-white rounded-full px-5 py-2 ">Postularme</button>

    </div>

</div>
