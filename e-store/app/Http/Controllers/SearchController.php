<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Company;
use App\Models\Category;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function result(Request $request)
    {
            $request->validate([

                'quiry' => 'required',
            ]);
            $search = $request->input('quiry');
            $products = Product::where('mobile_name', 'like', "%$search%")->get();

            return view('web.search', compact('products'));

    }
    public function filter()
    {
        $company=Company::all();
        $category=Category::all();
        return view ('web.filter',compact('company','category'));
    }
    public function respone(Request $request)
     {
        $products = Product::query();
            if ($request->has('company')) {
                $products = $products->where('Company_id', $request->input('company'));
            }
            if ($request->has('category')) {
                $products = $products->where('category_id', $request->input('category'));
            }
            $products = $products->get();
            return view('web.search', compact('products'));
     }

}
