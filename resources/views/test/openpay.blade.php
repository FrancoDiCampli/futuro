@extends('layouts.main')

@section('content')
<div class="w-8/12 text-xs form">
    <div class="title">
        <div class="text-center text-white bg-main-blue">
            <h1 class="py-5 text-2xl font-medium">Crear <span class="font-semibold">tarjeta</span></h1>
            <p class="w-6/12 py-5 mx-auto text-sm">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam dolor enim, lacinia et sem et, rhoncus pharetra orci.</p>
        </div>

    </div>

    <div class="bg-white form">
        <form id="processCard" name="processCard" method="POST" action="{{route('save')}}">
            @csrf
            <input type="text" name="token_id" id="token_id">
            <input type="text" name="use_card_points" id="use_card_points" value="false">

            <div class="flex flex-wrap row">
                <div class="w-full p-5">
                    <label for="" class="block px-5 font-semibold text-main-blue">Nombre</label>
                    <input type="text" id="nombre_tarjeta" name="holder_name" minlength="5" maxlength="80"
                    class="w-full px-5 border border-gray-200 rounded-full"
                    placeholder="Como aparece en la tarjeta" autocomplete="off" data-openpay-card="holder_name"
                    pattern="^[a-zA-Z0-9 ]*$" required>

                </div>
            </div>

            <div class="flex flex-wrap row">
                <div class="w-full p-5">
                    <label for="" class="block px-5 font-semibold text-main-blue">Card Number</label>
                    <input class="w-full px-5 border border-gray-200 rounded-full"
                     type="text" id="num_tarjeta" name="card_number"
                    maxlength="30" class="form-control"
                    autocomplete="off" pattern="[0-9]+" data-openpay-card="card_number" required>

                </div>
            </div>

        <div class="flex flex-wrap row">
            <div class="w-4/12 p-5">
                <label for="" class="block px-5 font-semibold text-main-blue">Exp Year</label>

                <input class="w-full px-5 border border-gray-200 rounded-full"
                 type="text" id="anio_tarjeta" name="expiration_year" maxlength="2"
                class="form-control special-size"
                placeholder="Año" data-openpay-card="expiration_year" pattern="[0-9]+"  required>

            </div>
            <div class="w-4/12 p-5">
                <label for="" class="block px-5 font-semibold text-main-blue">Exp Month</label>

                <input type="number" id="mes_tarjeta" name="expiration_month"
                    placeholder="Mes" max="12" step="1"
                    class="w-full px-5 border border-gray-200 rounded-full"
                data-openpay-card="expiration_month"  required>

            </div>
            <div class="w-4/12 p-5">
                <label for="" class="block px-5 font-semibold text-main-blue">CCV</label>
                <input type="text" id="cvv_tarjeta" name="cvv2"
                class="w-full px-5 border border-gray-200 rounded-full" maxlength="3"
                 placeholder="3 dígitos" autocomplete="off"
                 data-openpay-card="cvv2" pattern="[0-9]{3}"  required>
            </div>
        </div>



        <div class="flex justify-center ">
            <button  type="button" class="px-5 py-2 m-10 border rounded-full">Cancelar</button>
            <input type="submit" class="px-5 py-2 m-10 border rounded-full" id="makeRequestCard" value="Make Card">
        </div>

        </form>
    </div>

    @push('scripts')
    <script type="text/javascript"
    src="https://js.openpay.mx/openpay.v1.min.js"></script>
    <script type='text/javascript'
    src="https://js.openpay.mx/openpay-data.v1.min.js"></script>

    <script type="text/javascript">


        document.addEventListener("DOMContentLoaded",function(){
            // const id = {{ config('cashier_openpay.id')}};
            OpenPay.setId('mixpezoggumvqp6xxdbt');
            OpenPay.setApiKey('pk_8e4900088e244e1fa86a37cded4ad7e7'); //aqui todo OK
            OpenPay.setSandboxMode(true);
            var deviceSessionId = OpenPay.deviceData.setup("processCard", "deviceIdHiddenFieldName");

        });

        let formulario = document.getElementById("processCard").addEventListener("submit", function(event){
            event.preventDefault()
            OpenPay.token.extractFormAndCreate('processCard', success_callbak, error_callbak);

        });

        var success_callbak = function(response) {
            console.log(response)
            var token_id = response.data.id;
            const token_input = document.getElementById('token_id')
            token_input.value = token_id
            // $('#token_id').val(token_id);
            // $('#payment-form').submit();
            document.getElementById("processCard").submit();
        };

        var error_callbak = function(response) {
        var desc = response.data.description != undefined ?
        response.data.description : response.message;
        alert("ERROR [" + response.status + "] " + desc);
        $("#pay-button").prop("disabled", false);
        };


    </script>
    @endpush

</div>
@endsection
