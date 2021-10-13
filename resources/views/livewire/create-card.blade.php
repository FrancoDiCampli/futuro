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
                    data-openpay-card="holder_name"
                    type="text">
            </div>
        </div>

        <div class="flex flex-wrap row">
            <div class="w-full p-5">
                <label for="" class="block px-5 text-base font-semibold text-main-blue">Card Number</label>
                <input class="w-full px-5 text-base border border-gray-200 rounded-full"
                    data-openpay-card="card_number"
                    type="text">
            </div>
        </div>

        <div class="flex justify-center ">
            <button wire:click='cancel' type="button" class="px-5 py-2 m-10 border rounded-full">Cancelar</button>
            <input class="px-5 py-2 m-10 border rounded-full" id="makeRequestCard" type="button" value="Make Card">
        </div>

        </form>
    </div>


</div>
