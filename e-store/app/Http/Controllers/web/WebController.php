<?php

namespace App\Http\Controllers\web;
use App\Models\Company;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Routing\Controller;
use Validator;
use Illuminate\Http\Request;

class WebController extends Controller
{
    public function index()
    {
        $product=Product::all();
        return view('web.homepage',compact('product'));
    }

    public function productinfo($id)
    {

        $products=Product::findOrfail($id);
        return view('web.product_info',compact('products'));

    }

    public function company()
    {
        $company=Company::all();
        return view('web.company',compact('company'));

    }

    public function category()
    {
        $category=category::all();
        return view('web.category',compact('category'));

    }

    public function get_product_of_company($id)
    {
        $product = Product::where('company_id', $id)->get();
        return view ('web.product_company',compact('product'));
    }

    public function get_product_of_category($id)
    {
        $product = Product::where('category_id', $id)->get();
        return view ('web.product_category',compact('product'));
    }



}
