{{-- @if($errors->cashier->isNotEmpty())
<div class="relative px-4 py-3 text-red-700 bg-red-100 border border-red-400 rounded" role="alert">
    @foreach ($errors->cashier->keys() as $key)
        <strong class="font-bold">{{ $key }} :</strong> {{ $errors->cashier->get($key)[0] }} <br>
    @endforeach
</div>
@endif --}}


    <div class="w-8/12 mx-auto bg-white content">

        <div class="flex flex-wrap row">
            <div class="w-6/12 px-10 py-5">
                <label for="" class="block px-5 text-base font-semibold text-main-blue">Tipo plan</label>
                <select class="w-full px-5 text-base border border-gray-200 rounded-full focus:outline-none"
                    name="plan" id="" wire:model.defer="plan">
                    <option value="basico" > Basico</option>
                    <option value="premiun" >Premiun </option>

                </select>
                {{-- <input type="text" wire:model="card_id" > --}}
            </div>
        </div>
        <div class="flex flex-wrap row">
            <div class="w-6/12 px-10 py-5">
                <label for="" class="block px-5 text-base font-semibold text-main-blue">Metodo de Pago</label>
            </div>
        </div>

        <div >
            <p>{{$card_id}}</p>
            @foreach ($cards as $key => $card)

                <div class="p-5 row">
                    {{$card->id}}
                <div
                    wire:click="selectedId({{$card->id}})"
                    class="flex items-start justify-between px-5 text-xs border shadow-md card">
                    {{-- <input type="hidden" value="{{$card->id}}" > --}}
                        <img src="{{asset('assets/logo/visa-logo.png')}}" class="w-2/12 p-5" alt="logo">
                        <div class="w-4/12 p-5">
                            <p>{{$card->holder_name}}</p>
                            <p>Termina en {{Str::substr($card->card_number, 12, 16);}}</p>
                            <p>Expira{{$card->expiration_month}}/{{$card->expiration_year}}</p>
                        </div>
                        {{-- <div class="w-6/12 p-5">
                            <p>{{$card->address->line1}} #{{$card->address->line2}}</p>
                            <p>{{$card->address->line3}}{{$card->address->city}}. {{$card->address->state}}. C.P. {{$card->address->postal_code}}</p>
                        </div> --}}
                </div>
                </div>

            @endforeach
        </div>




        <div class="flex justify-end">
            <button type="button"  onclick="Livewire.emit('openModal', 'create-card')" class="text-sm text-right text-main-blue">Utilizar otro método de pago -></button>
        </div>

    </div>
