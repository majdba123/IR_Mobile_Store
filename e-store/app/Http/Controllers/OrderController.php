<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use App\Models\PivotOrderProduct;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store()
    {
        // Get the session data that contains the cart items
        $cartItems = session()->get('cart');
        if ($cartItems) {

            $totalPrice = 0;
            foreach ($cartItems as $cartItem) {
                $str1 = $cartItem["price"];
                $str2 =  $cartItem["quantity"];
                $result = $str1 * $str2;
                $totalPrice =$totalPrice + $result;
            };
            $cartCount = 0;

            foreach ($cartItems as $cartItem) {
                    $cartCount += $cartItem["quantity"];
                }

            $order = Order::create([
                    'user_id' => auth()->user()->id,
                    'total_price' => $totalPrice,
                    'count_of_items_in_order'=> $cartCount
            ]);
            session()->forget('cart');
            $order_id = $order->id;
            foreach ($cartItems as $cartItem){
                $PivotOrderProduct=PivotOrderProduct::create([
                    "product_id"=>$cartItem["id"],
                    "quantity"=>$cartItem["quantity"],
                    "order_id"=> $order_id
                ]);
            }

            return redirect()->back()->with('success', 'Order has been placed!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function getOrder()
    {
        $order=Order::all();
        $recordCount = Order::count();
        return view('admin.Orders',compact('order','recordCount'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function getOrder_Product($id)
    {
        $PivotOrderProduct=PivotOrderProduct::where('order_id', $id)->get();


        return view('admin.Products_Of_Order',compact('PivotOrderProduct'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function get_User_Orders()
    {
        $user=Auth::user();
        $order=Order::where('user_id',$user->id)->get();
        $recordCount=$order->count();
        return view ('admin.Orders',compact('order','recordCount'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //
    }
}
