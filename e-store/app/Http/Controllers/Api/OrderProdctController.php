<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Couppon;
use App\Models\Order;
use App\Models\PivotOrderProduct;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderProdctController extends Controller
{

    // OrderController.php
    public function createOrder(Request $request)
    {
        /*

        the form of array like this ::
            [
                 { "price": "12", "quantity": "2", "id": "1" },
                 { "price": "15", "quantity": "3", "id": "2" }
            ]

        */

        try {
            $cartItems = json_decode($request->getContent(), true);

            $totalPrice = 0;

            if (is_array($cartItems)) {
                foreach ($cartItems as $cartItem) {
                    $totalPrice += $cartItem["price"] * $cartItem["quantity"];
                }
            }
            $order = Order::create([
                'user_id' => Auth::user()->id,
                'total_price' => $totalPrice,
            ]);
            $order_id = $order->id;
            foreach ($cartItems as $cartItem) {
                PivotOrderProduct::create([
                    "product_id" => $cartItem["id"],
                    "quantity" => $cartItem["quantity"],
                    "order_id" => $order_id
                ]);
            }

            return response()->json( $order_id, 200);

            // print_r($request->cartItems);

          /*/  $str_json = json_encode($request->cartItems); //array to json string conversion

            $cartItems = json_decode($str_json, true);

            if ($request->cartItems) {

                $totalPrice = 0;
                $cartCount = 0;
                if (is_iterable($cartItems)) {
                    foreach ($cartItems as $cartItem) {
                        $totalPrice += $cartItem["price"] + $cartItem["quantity"];
                        $cartCount += $cartItem["quantity"];
                // $cartCount = 0;
                if (is_iterable($cartItems)) {
                    foreach ($cartItems as $cartItem) {
                        $totalPrice += $cartItem["price"] * $cartItem["quantity"];
                        // $cartCount += $cartItem["quantity"];
                    };
                }
                $order = Order::create([
                    'user_id' => Auth::user()->id,
                    'total_price' => $totalPrice,
                ]);

                $order_id = $order->id;
                if (is_iterable($cartItems)) {
                    foreach ($cartItems as $cartItem) {
                        PivotOrderProduct::create([
                            "product_id" => $cartItem["id"],
                            "quantity" => $cartItem["quantity"],
                            "order_id" => $order_id
                        ]);
                    }
                }
                return response()->json($order_id, 200);
            } else {
                return response()->json(false, 201);
            }*/
        } catch (\Exception $e) {
            print($e);
            return response()->json('there a problem recheck the data you send');
        }
    }


    public function index()
    {
        $orders = Order::with('user')->get();
        // var_dump($orders);
        $ordersInfo = $orders->map(function ($order) {
            return [
                'order_id' => $order->id,
                'total_price' => $order->total_price,
                'date' => $order->created_at,
                'user_name' => $order->user->name,
                // Add other order information...
            ];
        });

        return response()->json($ordersInfo);
    }

    public function show($id)
    {
        $order = Order::with('user')->find($id);

        if (!$order) {
            return response()->json(['message' => 'order not found'], 404);
        }
        return response()->json([
            'order_id' => $order->id,
            'total_price' => $order->total_price,
            'date' => $order->created_at,
            'user_name' => $order->user->name,

        ]);
    }

    public function destroy(string $id)
    {
        $order = order::find($id);
        if (!$order) {
            return response()->json(['message' => 'order not found'], 404);
        }

        $order->delete();

        return response()->json(['message' => 'order deleted successfully'], 200);
    }

    public function getOrdersInTimeRange(Request $request)
    {
        $startDate = $request->input('start_date'); // Format: 'YYYY-MM-DD'
        $endDate = $request->input('end_date'); // Format: 'YYYY-MM-DD'

        $startDateTime = Carbon::parse($startDate)->startOfDay();
        $endDateTime = Carbon::parse($endDate)->endOfDay();

        $orders = Order::whereBetween('created_at', [$startDateTime, $endDateTime])->get();

        return response()->json($orders);
    }
}
