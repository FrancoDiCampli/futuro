<?php

namespace App\Http\Controllers;


use App\Models\Recruiter;
use Illuminate\Http\Request;
use App\Http\Traits\FileTrait;
use Perafan\CashierOpenpay\Openpay\Customer as OpenpayCustomer;

class TestController extends Controller
{
    use FileTrait;

    public function test(){


        return view('test.test');
    }


    // Crear cliente openpay
    public function crearCLiente(){
        $recruiter = Recruiter::find(1);

        $data = [
            'name' => $recruiter->first_name,
            'last_name' => $recruiter->last_name,
            'email' => user()->email,
            'phone_number' => '4421112233',
            'address' => [
                'line1' => 'Privada Rio No. 12',
                'line2' => 'Co. El Tintero',
                'line3' => '',
                'postal_code' => $recruiter->city->zip_code,
                'state' => $recruiter->city->state->name,
                'city' => $recruiter->city->name,
                'country_code' => 'MX'
            ]
        ];

        $openpay_customer = $recruiter->createAsOpenpayCustomer($data);

        dd($openpay_customer);
    }


    // Borrar cliente en openay
    public function borrarCliente(){

        $recruiter =  Recruiter::first();
        $customer = OpenpayCustomer::find($recruiter->openpay_id);

        $customer->delete();
        return 'done';
    }


    public function agregarCard(){

        $card_data = [
            'holder_name' => 'Teofilo Velazco',
            'card_number' => '4916394462033681',
            'cvv2' => '123',
            'expiration_month' => '12',
            'expiration_year' => '15'
        ];

        $card = $user->addCard($card_data);

        // with token

        $card_data = [
            'token_id' => 'tokgslwpdcrkhlgxqi9a',
            'device_session_id' => '8VIoXj0hN5dswYHQ9X1mVCiB72M7FY9o'
        ];

        $card = $user->addCard($card_data);

        // with address

        $address_data = [
            'line1' => 'Privada Rio No. 12',
            'line2' => 'Co. El Tintero',
            'line3' => '',
            'postal_code' => '76920',
            'state' => 'Querétaro',
            'city' => 'Querétaro.',
            'country_code' => 'MX'
        ];

        $card = $user->addCard($card_data, $address_data);
    }

    public function save(Request $request){


        user()->photo()->make()->upload($request->file('photo'), 'avatar/'.user()->id, 'avatar');



        return 'done';
    }
}
