<?php

namespace App\Services;

use Karim007\LaravelBkashTokenize\Facade\BkashPaymentTokenize;
use App\Models\BookEvent;

class Payment
{
    protected $result = [];

    public static function tokenizePayment($data)
    {
        $request_data_json = json_encode($data);
        $response = BkashPaymentTokenize::cPayment($request_data_json);

        if(isset($response['bkashURL'])){

            $bookEvent = BookEvent::create([
                'event_id' => $data['event_id'],
                'guest_id' => $data['guest_id'],
                'name' => $data['name'],
                'email' => $data['email'],
                'phone' => $data['phone'],
                'number_of_people' => $data['number_of_people'],
                'payment_status' => 'pending',
                'payment_method' => 'Bkash',
                'payment_id' => $response['paymentID'],
                'amount' => $data['amount']
            ]);

            if($bookEvent->save()){

                return $response ;

            }else{

                return redirect()->back();
            }
        }
    }

    public static function paymentExecution($request)
    {
        $response = BkashPaymentTokenize::executePayment($request->paymentID);

        if (!$response){

            $response = BkashPaymentTokenize::queryPayment($request->paymentID);
        }

        if (isset($response['statusCode']) && $response['statusCode'] == "0000" && $response['transactionStatus'] == "Completed") {

            $bookEvent = BookEvent::where('payment_id' , $request->paymentID)->first();

            if ($bookEvent) {

                $bookEvent->update([
                    'trxn_id' => $response['trxID'],
                    'payment_status' => 'Completed'
                ]);

            return BkashPaymentTokenize::success('Thank you for your payment', $response['trxID']);

            } 
        }

        return BkashPaymentTokenize::failure($response['statusMessage']);

    }


    public static function paymentCancel()
    {
        return BkashPaymentTokenize::cancel('Your payment is canceled');
    }

    public static function paymentFailure()
    {
        return BkashPaymentTokenize::failure('Your transaction is failed');
    }

    public static function paymentSearch($trxID)
    {
        return BkashPaymentTokenize::searchTransaction($trxID);
    }


}
