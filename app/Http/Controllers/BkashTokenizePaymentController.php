<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookEventRequest;
use App\Services\Payments\BkashPayment;
use Illuminate\Http\Request;

class BkashTokenizePaymentController extends Controller
{
    public function index()
    {
        return view('bkashT::bkash-payment');
    }

    public function createPayment(BookEventRequest $request)
    {

        return BkashPayment::createBkashPayment($request);
        
    }


    public function callBack(Request $request)
    {
        return BkashPayment::callback($request);
    }

    public function searchTnx($trxID)
    {
        $bkashPayment = new BkashPayment();

        return $bkashPayment->searchTrnx($trxID);

    }

}
