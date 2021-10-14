<?php

namespace App\Http\Controllers;




use Openpay;
use App\Models\Recruiter;
use Illuminate\Http\Request;
use App\Http\Traits\FileTrait;
use App\Models\Transaction;
use App\Models\Vacancy;
use Perafan\CashierOpenpay\Card;
use Perafan\CashierOpenpay\Openpay\Card as OpenpayCard;
use Perafan\CashierOpenpay\Openpay\Customer as OpenpayCustomer;

class TestController extends Controller
{
    use FileTrait;

    public function test(){


        $charge_data = [
            'source_id' => 'kbenpwfd2fuo139tcavx',
            'method' => 'card',
            'currency' => 'MXN',
            'description' => 'Cargo inicial a mi merchant',
            'order_id' => 'oid-00070',
            'device_session_id' => 'kR1MiQhz2otdIuUlQkbEyitIqVMiI16f',
        ];

        $openpay_charge = user()->profile->charge(100, $charge_data);
       return  $openpay_charge->id;

        $vacancy = Vacancy::first();
        $trans = Transaction::create([
            'movable_type'=>'App\Models\Vacancy',
            'movable_id'=>$vacancy->id,
            'gateway'=>'openpay',
            'user_id'=>user()->id,
            'amount'=>100,
            'payload'=>json_encode($openpay_charge),
        ]);

        return 'done';
        // $cards = Card::where('recruiter_id',user()->profile->id)->get();

        // $cards = $cards->asOpenpayCard();
        // dd($cards);

        // $cards = Card::where('recruiter_id',user()->profile->id)->get();

        // $cards = $cards->map(function($card) {
        //     return $card->asOpenpayCard();
        // });
        // return view('test.test',compact('cards'));
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



        $openpay = Openpay::getInstance(config('cashier_openpay.id'), config('cashier_openpay.private_key'), 'MX');


        if(isset(user()->profile->openpay_id)){

            $customer = $openpay->customers->get(user()->profile->openpay_id);
        }else{
            $recruiter = Recruiter::find(user()->profile->id);
            $data = [
                'name' => $recruiter->first_name,
                'last_name' => $recruiter->last_name,
                'email' => user()->email,
                'phone_number' => '4421112233',
                'address' => [
                    'line1' =>  'Uquiza',
                    'line2' => 165,
                    'line3' => '',
                    'postal_code' => $recruiter->city->zip_code,
                    'state' => $recruiter->city->state->name,
                    'city' => $recruiter->city->name,
                    'country_code' => 'MX'
                ]
            ];

            $customer = $recruiter->createAsOpenpayCustomer($data);
        }


        $card_data = [
            'holder_name' => $request->holder_name,
            'card_number' => $request->card_number,
            'cvv2' => $request->cvv2,
            'expiration_month' => $request->expiration_month,
            'expiration_year' => $request->expiration_year,
            'token_id' => $request->k8q8r0ynn8esftsjomhi,
            'device_session_id' => $request->deviceIdHiddenFieldName,
        ];

              // with address

        $address_data = [
            'line1' => $customer->line1,
            'line2' => $customer->line2,
            'line3' =>$customer->line3,
            'postal_code' => $customer->postal_code,
            'state' => $customer->state,
            'city' => $customer->city,
            'country_code' => 'MX'
        ];
        // $card = $customer->cards->add($card_data);
        user()->profile->addCard($card_data,$address_data);



        return 'done';
    }


    public function pay($plan,$card){




    }

    public function openpayForm(){

        return view('test.openpay');
    }

}
