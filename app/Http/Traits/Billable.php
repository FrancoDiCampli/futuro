<?php

namespace App\Traits;

use App\Billing\ConektaGateway;
use App\Models\Card;
use App\Models\Subscription;
use Illuminate\Support\Arr;
use Illuminate\Support\Carbon;

trait Billable
{
    public $amount;
    public $installments;
    /**
     * Set the user current payment method.
     *
     * @param string $token
     *
     * @return App\Models\User
     */
    public function setPaymentMethod($token)
    {
        $conekta = ConektaGateway::make()->setToken($token);

        if (strpos($token, 'src_') !== false) {
            return $this;
        }

        if (is_null(user()->gateway_customer_id)) {
            $customer = $conekta->createCustomer($this);

            user()->update([
                'gateway_customer_id' => $customer->id,
            ]);

        } else {
            $conekta->deleteCustomerCard($this);
            user()->cards()->delete();

            $customer = $conekta->createCustomerCard();
        }

        $card = $customer->payment_sources[0];

        user()->cards()->create([
            'token'           => $card->id,
            'brand'           => $card->brand,
            'gateway'           => 'conekta',
            'last_four'       => $card->last4,
            'expiration_date' => Carbon::parse($card->exp_year.'-'.$card->exp_month.'-01'),
        ]);

        return $this;
    }

    public function charge($amount, $itemName)
    {
        $conekta = ConektaGateway::make()->setUser($this);
        $order = $conekta->createOrder($amount, $itemName);
        return $charge = $order['charges'][0];
    }

    public function chargeWithInstallments($amount, $itemName,$installments)
    {
        $order = new ConektaGateway;
        $order = $order->createOrderWithInstallments($amount, $itemName,$installments);
        // return $charge = $order['charges'][0];
        return $order;
    }

    public function hasCard()
    {
        return $this->card()->exists();
    }

    public function card()
    {
        return $this->hasOne(Card::class);
    }

    public function subscription()
    {
        return $this->hasOne(Subscription::class)->whereNull('canceled_at');
    }


}
