<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\PaymentIntent;

class PaymentController extends Controller
{
    public function payment(Request $request)
    {
        $validatedData = $request->validate([
            'order_id' => 'required',
            'user_id' => 'required',
            'stripe_payment_id' => 'required',
        ]);

        $pay = Payment::create($validatedData);
        // try {
        //     Stripe::setApiKey(config('services.stripe.secret'));

        //     $paymentIntent = PaymentIntent::create([
        //         'amount' => $request->amount,
        //         'currency' => $request->currency,
        //     ]);

        return response()->json($pay, 201);
        // } catch (\Exception $e) {
        //     return response()->json(['error' => $e->getMessage()], 500);
        // }
    }
}
