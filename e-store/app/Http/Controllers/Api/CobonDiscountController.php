<?php

namespace App\Http\Controllers\Api;

use Carbon\Carbon;

use App\Http\Controllers\Controller;
use App\Models\coupon;
use App\Models\coupon_order;
use App\Models\coupon_orders;
// use App\Models\Couppon;
// use App\Models\couppon_order;
// use App\Models\coupponorder;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CobonDiscountController extends Controller
{
    public function applyDiscount(Request $request)
    {
        // Get the total price from the request
        $totalPrice = $request->input('total_price');

        // Get the coupon code from the request
        $couponCode = $request->input('coupon_code');

        // Find the coupon in the database by the provided code
        $coupon = coupon::where('code', $couponCode)
            ->where('expiration_date', '>=', Carbon::now()) // Check if the coupon is not expired
            ->first();

        if ($coupon) {
            // Check if the user has used this coupon before (assuming $userId holds the user's ID)

            // var_dump($order);
            // print($order);
            $order = Order::where('user_id', Auth::user()->id)
                ->where('total_price', $totalPrice)->pluck('id')->toArray();

            $isUsed = coupon_orders::where('order_id', $order[0])
                ->whereHas('order', function ($query) {
                    $query->where('user_id', Auth::user()->id);
                })
                ->exists();

            // print($isUsed);

            if (!$isUsed) {
                // The coupon is valid and not used by the user

                // Apply the discount to the total price
                // var_dump($order);
                // print($coupon->id);

                $discountedPrice = $totalPrice - ($totalPrice * ($coupon->discount / 100));
                //insert here to couppon order table
                DB::table('coupon_orders')->insert([
                    ['coupon_id' => $coupon->id, 'order_id' => $order[0], 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()]
                ]);

                // Return the discounted price
                return response()->json(['discounted_price' => $discountedPrice]);
            } else {
                return response()->json(['message' => 'Coupon already used by the user']);
            }
        } else {
            return response()->json(['message' => 'Invalid or expired coupon']);
        }
    }


    public function index()
    {
        $coupons = coupon::all();
        return response()->json($coupons);
    }


    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'code' => 'required|unique:coupons',
            'discount' => 'required|numeric',
            'expiration_date' => 'required|date'
        ]);

        $coupon = coupon::create($validatedData);
        return response()->json($coupon, 200);
    }

    public function show($id)
    {
        $coupon = coupon::findOrFail($id);
        return response()->json($coupon);
    }

    public function update_cobon(Request $request, $id)
    {
        $validatedData = $request->validate([
            'code' => 'required',
            'discount' => 'required|numeric',
            'expiration_date' => 'required|date'
        ]);

        $coupon = coupon::findOrFail($id);
        $coupon->update($validatedData);
        return response()->json($coupon, 200);
    }

    public function destroy($id)
    {
        $coupon = coupon::findOrFail($id);
        $coupon->delete();
        return response()->json(['msg=>delete success'], 200);
    }
}
