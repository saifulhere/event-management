<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookEventRequest;
use App\Services\Payments\BkashPayment;
use Illuminate\Http\Request;
use Karim007\LaravelBkashTokenize\Facade\BkashRefundTokenize;

class BkashTokenizePaymentController extends Controller
{
    public function index()
    {
        return view('bkashT::bkash-payment');
    }

    public function createPayment(BookEventRequest $request)
    {

        $response = BkashPayment::createBkashPayment($request);
        
        if(isset($response['bkashURL']))
        {
            return redirect()->away($response['bkashURL']);
        }else{
            return redirect()->back()->with('error-alert2', $response['statusMessage']);
        }
    }


    public function callBack(Request $request)
    {
        if ($request->status == 'success'){

            return BkashPayment::executePayment($request);

        }elseif ($request->status == 'cancel'){

            return BkashPayment::paymentCancel();

        }else{

            return BkashPayment::paymentCancel();

        }
    }

    public function searchTnx($trxID)
    {

        return BkashPayment::searchTrnx($trxID);

    }

    public function refund(Request $request)
    {
        $paymentID='Your payment id';
        $trxID='your transaction no';
        $amount=5;
        $reason='this is test reason';
        $sku='abc';
        //response
        return BkashRefundTokenize::refund($paymentID,$trxID,$amount,$reason,$sku);
        //return BkashRefundTokenize::refund($paymentID,$trxID,$amount,$reason,$sku, 1); //last parameter is your account number for multi account its like, 1,2,3,4,cont..
    }
    public function refundStatus(Request $request)
    {
        $paymentID='Your payment id';
        $trxID='your transaction no';
        return BkashRefundTokenize::refundStatus($paymentID,$trxID);
        //return BkashRefundTokenize::refundStatus($paymentID,$trxID, 1); //last parameter is your account number for multi account its like, 1,2,3,4,cont..
    }
}
