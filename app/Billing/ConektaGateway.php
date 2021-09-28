<?php

namespace App\Billing;

use Conekta\Plan;
use Conekta\Order;
use Conekta\Charge;
use Conekta\Conekta;
use Conekta\Customer;

class ConektaGateway
{
    protected $user;

    protected $token;
    protected $amount;
    protected $cuotes;



    public function __construct()
    {
        Conekta::setApiKey(config('services.conekta.private_key'));
        $this->setUser();
    }

    public function createCustomer()
    {
        return Customer::create([
            'name'            => $this->user->full_name,
            'email'           => $this->user->email,
            'payment_sources' => [
                [
                    'token_id' => $this->token,
                    'type'     => 'card',
                ],
            ],
        ]);
    }

    /**
     * Updates the customer card.
     *
     * @param App\Models\User $user
     *
     * @return
     */
    public function createCustomerCard()
    {
        $customer = Customer::find($this->user->gateway_customer_id);

        $customer->createPaymentSource([
            'token_id'  => $this->token,
            'type'      => 'card',
        ]);

        return $customer;
    }

    public function deleteCustomerCard()
    {
        $customer = Customer::find($this->user->gateway_customer_id);

        if( isset($customer->payment_sources[0])){
            $customer->payment_sources[0]->delete();
        }

    }

    public function findCustomer($customerId)
    {
        return Customer::find($customerId);
    }



    public function findCharge($chargeId)
    {
        return Charge::find($chargeId);
    }

    public function eventExists($id)
    {
        return !is_null(Conekta_Event::where(['id' => $id]));
    }

    public function createOrder($amount, $itemName)
    {
        return Order::create([
            'currency'      => 'MXN',
            'customer_info' => [
                'customer_id' => $this->user->gateway_customer_id,
            ],
            'line_items'    => [
                [
                    'name'          => $itemName,
                    'unit_price'    => $amount,
                    'quantity'      => 1,
                ],
            ],
            'charges'   => [
                [
                    'payment_method' => [
                        'type' => 'default',
                    ],
                ],
            ],
        ]);
    }

    public function createOrderWithInstallments($amount, $itemName,$installments)
    {
        $payment_method = [
                            'type' => 'default',
                        ];

        if ($installments > 1) {
            $payment_method['monthly_installments'] = $installments;
        }

        try{
            return Order::create([
                'currency'      => 'MXN',
                'customer_info' => [
                    'customer_id' => user()->gateway_customer_id,
                ],
                'line_items'    => [
                    [
                        'name'          => $itemName,
                        'unit_price'    => $amount,
                        'quantity'      => 1,
                    ],
                ],
                'charges'   => [
                    [
                        'payment_method' => $payment_method
                    ],
                ],
            ]);
        } catch (\Conekta\ProcessingError $error){
            return $error->getMessage();
            } catch (\Conekta\ParameterValidationError $error){
                return $error->getMessage();
            } catch (\Conekta\Handler $error){
                return $error->getMessage();
          }

    }

    public function orderDetails($order_id){

        return Order::find($order_id);
    }

    public function setUser()
    {
        $this->user = user();

        return $this;
    }

    public function setToken($token)
    {
        $this->token = $token;

        return $this;
    }

    public static function make()
    {
        return new self();
    }
}
