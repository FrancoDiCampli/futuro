<div class="flex flex-wrap justify-center p-5 row">

    <select class="w-8/12 text-base border border-gray-200 rounded-full focus:outline-none"
         name="enterprise_id"
    >
        <option value="">Seleccione una empresa </option>

        @foreach ($enterprises as $enterprise)
            <option value="{{$enterprise->id}}" >{{$enterprise->name}}</option>
        @endforeach

    </select>
    <span class="text-sm text-red-500 bg-white "> @error('enterprise_id'){{ $message }}@enderror</span>
    <button type="button" onclick="Livewire.emit('openModal', 'store-enterprise')">Cree una empresa</button>
</div>
