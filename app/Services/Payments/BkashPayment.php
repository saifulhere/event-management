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

    public static function cancelPayment()
    {
        return parent::paymentCancel();
    }

    public static function failurePayment()
    {
        return parent::paymentFailure();
    }

    public static function searchTrnx($trxID)
    {
        return parent::paymentSearch($trxID);
    }
}
