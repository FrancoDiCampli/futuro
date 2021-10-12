<div class="flex flex-wrap justify-center p-5 row">
    <select class="w-8/12 text-base border border-gray-200 rounded-full focus:outline-none"
    >
        <option value="0">Seleccione una empresa</option>

        @foreach ($enterprises as $index=>$enterprise)
            <option wire::model="enterprises.{{ $index }}.name" >{{$enterprise->name}}</option>
        @endforeach

    </select>
    <button type="button" onclick="Livewire.emit('openModal', 'store-enterprise')">Cree una empresa</button>
</div>
