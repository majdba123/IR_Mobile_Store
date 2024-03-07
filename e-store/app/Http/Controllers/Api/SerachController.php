<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class SerachController extends Controller
{
    public function searchByName(Request $request)
    {
        $searchTerm = $request->input('mobile_name');

        $products = Product::where('mobile_name', 'like', "%$searchTerm%")->get();

        return response()->json($products);
    }

    public function searchByPrice(Request $request)
    {
        $minPrice = $request->input('min_price');
        $maxPrice = $request->input('max_price');

        $products = Product::whereBetween('price', [$minPrice, $maxPrice])->get();

        return response()->json($products);
    }

    public function searchByCategory(Request $request)
    {
        $category = $request->input('category');
        $productName = $request->input('product');
        $products = Product::where('mobile_name', 'like', "%$productName%")
            ->whereHas('category', function ($query) use ($category) {
                $query->where('name', $category);
            })->get();

        return response()->json($products);
    }

    public function searchByCompany(Request $request)
    {
        $companyName = $request->input('company');
        $productName = $request->input('product');
        // print($companyName);
        $products = Product::where('mobile_name', 'like', "%$productName%")
            ->whereHas('company', function ($query) use ($companyName) {
                $query->where('company_name', $companyName);
            })->get();

        return response()->json($products);
    }
}
