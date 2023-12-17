<?php

namespace App\Services\Payments;

use App\Services\Payment;

class BkashPayment extends Payment
{
    public static function createBkashPayment($request)
    {
        $inv = uniqid();
        $amount = $request->number_of_people * 1 ;

        $data = [
            'event_id' => $request->event_id,
            'guest_id' => $request->guest_id,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'number_of_people' => $request->number_of_people,
            'inv' => $inv,
            'intent' => 'sale',
            'mode' => '0011',
            'currency' => 'BDT',
            'amount' => $amount,
            'merchantInvoiceNumber' => $inv,
            'payerReference' => $inv,
            'callbackURL' => config("bkash.callbackURL")
        ];

        $response = parent::tokenizePayment($data);

        return $response;
    }

    public static function executePayment($request)
    {
        return parent::paymentExecution($request);
    }

    public static function callback($request)
    {
        if ($request->status == 'success'){

            return parent::paymentExecution($request);

        }elseif ($request->status == 'cancel'){

            return parent::cancelPayment($request);

        }else{
            return parent::failurePayment($request);
        }
    }

}
