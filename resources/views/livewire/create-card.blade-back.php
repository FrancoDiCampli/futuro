<div class="form">
    <div class="title">
        <div class="text-center text-white bg-main-blue">
            <h1 class="py-5 text-2xl font-medium">Crear <span class="font-semibold">tarjeta</span></h1>
            <p class="w-6/12 py-5 mx-auto text-sm">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam dolor enim, lacinia et sem et, rhoncus pharetra orci.</p>
        </div>

    </div>


    <div class="bg-white form">
        <form id="processCard" name="processCard">
        <div class="flex flex-wrap row">
            <div class="w-full p-5">
                <label for="" class="block px-5 text-base font-semibold text-main-blue">Nombre</label>
                <input class="w-full px-5 text-base border border-gray-200 rounded-full"
                   wire:model="holder_name" data-openpay-card="holder_name"
                    type="text">
            </div>
        </div>

        <div class="flex flex-wrap row">
            <div class="w-full p-5">
                <label for="" class="block px-5 text-base font-semibold text-main-blue">Card Number</label>
                <input class="w-full px-5 text-base border border-gray-200 rounded-full"
                   wire:model="card_number" data-openpay-card="card_number"
                    type="text">
            </div>
        </div>

        <div class="flex flex-wrap row">
            <div class="w-4/12 p-5">
                <label for="" class="block px-5 text-base font-semibold text-main-blue">Exp Year</label>
                <input class="w-full px-5 text-base border border-gray-200 rounded-full"
                   wire:model="expiration_year" data-openpay-card="expiration_year"
                    type="text">
            </div>
            <div class="w-4/12 p-5">
                <label for="" class="block px-5 text-base font-semibold text-main-blue">Exp Month</label>
                <input class="w-full px-5 text-base border border-gray-200 rounded-full"
                   wire:model="expiration_month" data-openpay-card="expiration_month"
                    type="text">
            </div>
            <div class="w-4/12 p-5">
                <label for="" class="block px-5 text-base font-semibold text-main-blue">CCV</label>
                <input class="w-full px-5 text-base border border-gray-200 rounded-full"
                   wire:model="cvv2" data-openpay-card="cvv2"
                    type="text">
            </div>
        </div>

        <div class="flex flex-wrap row">
            <div class="w-6/12 p-5">
                <label for="" class="block px-5 text-base font-semibold text-main-blue">Calle</label>
                <input class="w-full px-5 text-base border border-gray-200 rounded-full"
               wire:model="line1" data-openpay-card-address="line1"
                    type="text">
            </div>
            <div class="w-3/12 p-5">
                <label for="" class="block px-5 text-base font-semibold text-main-blue">Altura</label>
                <input class="w-full px-5 text-base border border-gray-200 rounded-full"
               wire:model="line2" data-openpay-card-address="line2"
                    type="text">
            </div>
            <div class="w-3/12 p-5">
                <label for="" class="block px-5 text-base font-semibold text-main-blue">References</label>
                <input class="w-full px-5 text-base border border-gray-200 rounded-full"
                ata-openpay-card-address="line3"
                    type="text">
            </div>
        </div>

        <div class="flex flex-wrap row">
            <div class="w-4/12 p-5">
                <label for="" class="block px-5 text-base font-semibold text-main-blue">Estado</label>
                <input class="w-full px-5 text-base border border-gray-200 rounded-full"
               wire:model="state" data-openpay-card-address="state"
                    type="text">
            </div>
            <div class="w-4/12 p-5">
                <label for="" class="block px-5 text-base font-semibold text-main-blue">Ciudad</label>
                <input class="w-full px-5 text-base border border-gray-200 rounded-full"
               wire:model="city" data-openpay-card-address="city"
                    type="text">
            </div>
            <div class="w-4/12 p-5">
                <label for="" class="block px-5 text-base font-semibold text-main-blue">CP</label>
                <input class="w-full px-5 text-base border border-gray-200 rounded-full"
               wire:model="postal_code" data-openpay-card-address="postal_code"
                    type="text">
            </div>
            <input type="text"wire:model="country_code" data-openpay-card-address="country_code" value="MX" class="hidden">
        </div>

        <div class="flex justify-center ">
            <button wire:click='cancel' type="button" class="px-5 py-2 m-10 border rounded-full">Cancelar</button>
            <input wire:click='saveCard' class="px-5 py-2 m-10 border rounded-full" id="makeRequestCard" type="button" value="Make Card">
        </div>

        </form>
    </div>

</div>
