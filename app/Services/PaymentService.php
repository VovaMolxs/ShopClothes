<?php

namespace App\Services;
use YooKassa\Client;

class PaymentService
{

    public function getClient() :Client {
        $client = new Client();
        $client->setAuth(config('services.yookassa.shop_id'), config('services.yookassa.secret_key'));

        return $client;
    }
    public function createPayment(float $amount, array $options = []) {
        $client = $this->getClient();
        $payment = $client->createPayment([
           'amount' => [
               'value' => $amount,
               'currency' => 'RUB'
           ],
            'capture' => false,
            'confirmation' => [
                'type' => 'redirect',
                'return_url' => route('payment.index'),

                ],
            'metadata' => [
                'transaction_id' => $options['transaction_id']
            ],

        ], uniqid('', true));

        return $payment->getConfirmation()->getConfirmationUrl();
    }
}
