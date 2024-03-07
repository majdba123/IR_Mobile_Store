<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Routing\Controller;

class CartController extends Controller
{

    public function index()
    {
        if (!session()->has('cart')) {
            $totalPrice = 0;
            return view('web.cart',compact('totalPrice'));
        }
        $products = session()->get('cart');
        $totalPrice = 0;
        foreach ($products as $product) {
            $str1 = $product["price"];
            $str2 =  $product["quantity"];
            $result = $str1 * $str2;
            $totalPrice =$totalPrice + $result;
        };
        return view('web.cart',compact('totalPrice'));
    }
    public function addProducttoCart(Request $request , $id)
    {
        $product = Product::findOrFail($id);
        $cart = session()->get('cart', []);
        if(isset($cart[$id])) {
            $cart[$id]=["quantity" => $request->quantity];
        } else {
            $cart[$id] = [
                "id"=>$id,
                "name" => $product->mobile_name,
                "quantity" => $request->quantity,
                "price" => $product->Price,
                "Company_id" => $product->Company_id,
                "category_id" => $product->category_id
            ];
        }
        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Product has been added to cart!');
    }

    public function updateCart(Request $request ,$id)
    {
            $x= $request->quantity;
            $cart = session()->get('cart');
            $cart[$id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            return redirect()->back()->with('success', 'Product has been update quantity!');

    }


    public function deletecart(Request $request)
    {
        if($request->id) {
            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            return redirect()->back()->with('success', 'Product has been deleted!');
        }
    }




}
