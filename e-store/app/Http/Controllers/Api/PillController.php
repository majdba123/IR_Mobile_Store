<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class PillController extends Controller
{
    public function Pill($userId, $orderId)
    {
        $order = Order::with('user', 'products')
            ->where('user_id', $userId)
            ->where('id', $orderId)
            ->first();

        if (!$order) {
            return response()->json(['message' => 'Order not found'], 404);
        }

        $formattedOrder = [
            'order_id' => $order->id,
            'user' => [
                'user_id' => $order->user->id,
                'name' => $order->user->name,
                // Add other user details as needed
            ],
            'total_price' => $order->total_price, // Assuming you have a column for total price in orders table
            'products' => $order->products->map(function ($product) {
                return [
                    'product_id' => $product->id,
                    'name' => $product->mobile_name,
                    'quantity' => $product->pivot->quantity,
                    // Add other product details as needed
                ];
            }),
            // Add other order details as needed
        ];

        return response()->json($formattedOrder);
    }
}
