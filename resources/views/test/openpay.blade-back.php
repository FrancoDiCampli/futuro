<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>


</head>
<body>


    <form method="post"  id="payment-form" class="hide-element form-group need-validation" >
        <input type="text" name="token_id" id="token_id">
        <input type="text" name="use_card_points" id="use_card_points" value="false">

        <div class="row">
          <div class="margin-t col-12">
            <h4><b>Aceptamos tarjetas de débito y crédito</b></h4>
          </div>
            <div class="col-4">
              <h6>Tarjetas de crédito</h6>

            </div>
            <div class="col-8">
              <h6>Tarjetas de débito</h6>

            </div>
            <div class="col-12"><br></div>
            <div class="col-6">
              <label>Nombre del titular</label>
              <input type="text" id="nombre_tarjeta" name="nombre_tarjeta" minlength="5" maxlength="400" class="form-control" placeholder="Como aparece en la tarjeta" autocomplete="off" data-openpay-card="holder_name" pattern="^[a-zA-Z0-9 ]*$" required>
              <div class="valid-feedback">Correcto.</div>
              <div class="invalid-feedback">Este dato es obligatorio. Min 5, Max 50 letras. No utilizar (*%/$+-.,').</div>
            </div>
            <div class="col-6">
              <label>Número de tarjeta</label>
              <input type="text" id="num_tarjeta" name="num_tarjeta" maxlength="30" class="form-control" autocomplete="off" pattern="[0-9]+"data-openpay-card="card_number" required="">
              <div class="valid-feedback">Correcto.</div>
              <div class="invalid-feedback">Ingresa un número de cuenta correcto, sin letras y sin espacios.</div>
            </div>
            <div class="col-12"><br></div>
            <div class="col-6">
              <label>Fecha de expiración</label><br>
              <input type="number" id="mes_tarjeta" name="mes_tarjeta" placeholder="Mes" max="12" step="1" class="form-control special-size rigth-marg" data-openpay-card="expiration_month"  required=""><input type="text" id="anio_tarjeta" name="anio_tarjeta" maxlength="2" class="form-control special-size" placeholder="Año" data-openpay-card="expiration_year" pattern="[0-9]+"  required="">
              <div class="valid-feedback">Correcto.</div>
              <div class="invalid-feedback">Ingresa un mes o año de vencimiento correcto, solo dos números para mes o año ej: 02/20 - 01/23 - 04/21.</div>
            </div>
            <div class="col-6">
              <label>Código de seguridad</label><br>
              <input type="text" id="cvv_tarjeta" name="cvv_tarjeta" class="form-control special-size rigth-marg" maxlength="3" placeholder="3 dígitos" autocomplete="off" data-openpay-card="cvv2" pattern="[0-9]{3}"  required="">

               <div class="valid-feedback">Correcto.</div>
              <div class="invalid-feedback">Ingresa un CVV correcto.</div>

            </div>
            <div class="col-12"><br></div>
            <div class="col-1"></div>
            <div class="col-5">
              <small><b>Transacciones realizadas vía:</b></small>

            </div>
            <div class="col-6">
              <table style="width:100%">
              <tr>

                <th class="secure-text"><small> Tus pagos se realizan de forma segura con encriptación de 256 bits.</small></th>
              </tr>
            </table>

            </div>



        </div>
        <input type="submit" value="Go">
    </form>
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
            var deviceSessionId = OpenPay.deviceData.setup("payment-form", "deviceIdHiddenFieldName");

        });

        document.getElementById("payment-form").addEventListener("submit", function(event){
            event.preventDefault()
            OpenPay.token.extractFormAndCreate('payment-form', success_callbak, error_callbak);

        });

         var success_callbak = function(response) {
             console.log(response)
            var token_id = response.data.id;
            const token_input = document.getElementById('token_id')
            token_input.value = token_id
            // $('#token_id').val(token_id);
            // $('#payment-form').submit();
        };

        var error_callbak = function(response) {
        var desc = response.data.description != undefined ?
        response.data.description : response.message;
        alert("ERROR [" + response.status + "] " + desc);
        $("#pay-button").prop("disabled", false);
        };




        function formPay(){
            var holder_name = $('#nombre_tarjeta').val();
            var card_number = $('#num_tarjeta').val();
            var expiration_month = $('#mes_tarjeta').val();
            var expiration_year = $('#anio_tarjeta').val();
            var cvv  = $('#cvv_tarjeta').val();

            var address = orderDelivery.direccion + " " + orderDelivery.cp;

            var deviceIdHiddenFieldName  = $('#deviceIdHiddenFieldName').val();

            /*AQUI HAGO EL TOKEN EN JS - Se activa success_callback y al ejecutarse esa function
            se asigna el token_id al INPUT OCULTO, pero a mi no me devuelve nada*/
            OpenPay.token.extractFormAndCreate('payment-form', success_callbak, error_callbak);


        //AQUI OBTENGO YO EL TOKEN_ID para mandarlo por POST con AJAX
        var token_id  = $('#token_id').val();

        var formData = new FormData();
        formData.append('phone_number',orderDelivery.telefono);
        formData.append('holder_name',holder_name);
        formData.append('card_number',card_number);
        formData.append('expiration_month',expiration_month);
        formData.append('expiration_year',expiration_year);
        formData.append('cvv',cvv);
        formData.append('address',address);
        formData.append('amount',orderDelivery.total);
        formData.append('email',orderDelivery.correo);
        formData.append('token_id',token_id);
        formData.append('deviceIdHiddenFieldName',deviceIdHiddenFieldName);

        formData.append('function',"addPay");

            console.log(formData)

    }
    </script>
</body>
</html>
