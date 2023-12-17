<?php

namespace App\Services;

use Karim007\LaravelBkashTokenize\Facade\BkashPaymentTokenize;
use Karim007\LaravelBkashTokenize\Facade\BkashRefundTokenize;
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

                return redirect()->away($response['bkashURL']);

            }else{

                return redirect()->back()->with('error-alert2', $response['statusMessage']);
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

        $failure = BkashPaymentTokenize::failure($response['statusMessage']);

        dd($failure);

    }


    public static function cancelPayment($request)
    {
        $bookEvent = BookEvent::where('payment_id' , $request->paymentID)->first();

        if ($bookEvent) {

            $bookEvent->update([
                'payment_status' => 'Cancel!'
            ]);

            return BkashPaymentTokenize::cancel('Your payment is canceled');
        } 

    }

    public static function failurePayment($request)
    {
        $bookEvent = BookEvent::where('payment_id' , $request->paymentID)->first();

        if ($bookEvent) {

            $bookEvent->update([
                'payment_status' => 'Failure'
            ]);

            return BkashPaymentTokenize::failure('Your transaction is failed');

        } 

    }

    public function searchTrnx($trxID)
    {
        return BkashPaymentTokenize::searchTransaction($trxID);
    }


    // public function refund(Request $request)
    // {
    //     $paymentID='Your payment id';
    //     $trxID='your transaction no';
    //     $amount=5;
    //     $reason='this is test reason';
    //     $sku='abc';
    //     //response
    //     return BkashRefundTokenize::refund($paymentID,$trxID,$amount,$reason,$sku);
    //     //return BkashRefundTokenize::refund($paymentID,$trxID,$amount,$reason,$sku, 1); //last parameter is your account number for multi account its like, 1,2,3,4,cont..
    // }
    // public function refundStatus(Request $request)
    // {
    //     $paymentID='Your payment id';
    //     $trxID='your transaction no';
    //     return BkashRefundTokenize::refundStatus($paymentID,$trxID);
    //     //return BkashRefundTokenize::refundStatus($paymentID,$trxID, 1); //last parameter is your account number for multi account its like, 1,2,3,4,cont..
    // }


}
