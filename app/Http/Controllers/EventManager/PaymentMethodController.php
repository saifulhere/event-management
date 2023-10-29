<?php

namespace App\Http\Controllers\EventManager;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PaymentMethod;

class PaymentMethodController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    
    public function index ()
    {
        $paymentMethods  = PaymentMethod::all();
        return view('Admin.EventManager.PaymentMethod.all-payment-method', compact('paymentMethods'));
    }

    public function create ()
    {
        return view('Admin.EventManager.PaymentMethod.create-payment-method');
    }

    public function store(Request $request)
    {
        $request->validate([
            'payment_method'    => 'required'
        ]);

        PaymentMethod::create([
            'payment_method'    => strip_tags($request->payment_method)
        ]);

        return redirect()->back()->with('status', 'Payment Method Added Successfully');
    }

    public function edit ()
    {
        //
    }
}
