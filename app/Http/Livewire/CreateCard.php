<?php

namespace App\Http\Livewire;

use App\Models\Card;
use App\Models\Recruiter;
use Openpay;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class CreateCard extends ModalComponent
{
    public $holder_name, $card_number,$cvv2 ,$expiration_month,$expiration_year,$line1,$line2,$line3;
    public $postal_code ,$state ,$city,$country_code;
    public $card;

    public function getCard(){
        $this->card =Card::where('recruiter_id',user()->profile->id)->fisrt();
    }

    public function render()
    {
        return view('livewire.create-card');
    }

    public function cancel(){

        $this->closeModal();
    }

    public function saveCard(){


        // $openpay = Openpay::getInstance('mixpezoggumvqp6xxdbt', 'sk_7fb349013cdc430da524e573cfe1dc1d', 'MX');
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
                    'line1' =>  $this->line1,
                    'line2' => $this->line2,
                    'line3' =>  $this->line3,
                    'postal_code' => $recruiter->city->zip_code,
                    'state' => $recruiter->city->state->name,
                    'city' => $recruiter->city->name,
                    'country_code' => 'MX'
                ]
            ];

            $customer = $recruiter->createAsOpenpayCustomer($data);
        }


        $card_data = [
            'holder_name' => $this->holder_name,
            'card_number' => $this->card_number,
            'cvv2' => $this->cvv2,
            'expiration_month' => $this->expiration_month,
            'expiration_year' => $this->expiration_year
        ];

              // with address

        $address_data = [
            'line1' => $this->line1,
            'line2' => $this->line2,
            'line3' =>$this->line3,
            'postal_code' => $this->postal_code,
            'state' => $this->state,
            'city' => $this->city,
            'country_code' => 'MX'
        ];
        $card = $customer->cards->add($card_data, $address_data);
        user()->profile->addCard($card_data, $address_data);

        $this->closeModal();
    }


}
