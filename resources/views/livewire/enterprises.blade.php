<div>
    <div class="mb-8">
        <label class="inline-block w-32 font-bold">Empresas:</label>
        <select name="enterprise_id" wire:model="enterprises" class="rounded-full border border-gray-200 text-base w-full focus:outline-none">
            <option value=''>Selecciona una empresa</option>
            @foreach ($enterprises as $enterprise)
                <option value={{ $enterprise->id }}>{{ $enterprise->name }}</option>
            @endforeach
        </select>
    </div>

</div>
