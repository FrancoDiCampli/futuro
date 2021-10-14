<?php

namespace App\Http\Traits;

use Illuminate\Support\Arr;


trait Transactionable
{

    //Generar transaccion para metodo de pago con tarjeta
    public function chargeCard($charge){

        // $charge =  $charge['charges'][0];
        return $this->moves()->create([
            'user_id'       => user()->id,
            'gateway'       => 'openpay',
            'charge_id'     => Arr::get($charge, 'id'),
            'amount'        => Arr::get($charge, 'amount'),
            'description'   => Arr::get($charge, 'description'),
            'reference'     => Arr::get($charge, 'reference'),
            'status'        => Arr::get($charge, 'status'),
            'error_code'    => Arr::get($charge, 'failure_code'),
            'payload'       => $charge,
        ]);

    }



}
