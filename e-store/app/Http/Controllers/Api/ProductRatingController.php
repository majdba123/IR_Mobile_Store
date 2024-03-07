<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\RateProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductRatingController extends Controller
{
    public function rateProduct(Request $request)
    {
        $user = auth()->user(); // Assuming you have user authentication

        // print($request->productId);
        // Find the product by ID
        $product = Product::find($request->productId);
        // print($product);
        if (!$product) {
            return response()->json(['message' => 'Product not found'], 404);
        }


        // print(Auth::user()->id);
        print($user->id);
        print($request->productId);
        // Check if the user has already rated the product
        $existingRating = RateProduct::where('user_id', $user->id)
            ->where('product_id', $request->productId)
            ->first();

        if ($existingRating) {
            $existingRating->delete();

            $rating = new RateProduct();
            $rating->user_id = $user->id;
            $rating->product_id = $product->id;
            $rating->number_of_rate_for_product = $request->input('rating');

            $rating->save();

            return response()->json(['message' => 'Product rated successfully'], 200);
        } else {
            // Create a new rating
            $rating = new RateProduct();
            $rating->user_id = $user->id;
            $rating->product_id = $product->id;
            $rating->number_of_rate_for_product = $request->input('rating');

            $rating->save();

            return response()->json(['message' => 'Product rated successfully'], 200);
        }
    }
}
