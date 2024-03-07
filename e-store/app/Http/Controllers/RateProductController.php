<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\RateProduct;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;


class RateProductController extends Controller
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
    public function store(Request $request , $id)
    {
        $user=Auth::id();
        $request->validate( [
            'rating' => 'required|integer|min:1|max:5',
            'review' => 'required|string',
        ]);
        $review = new RateProduct();
        $review->number_of_rate_for_product = $request->input('rating');
        $review->comment = $request->input('review');
        $review->product_id = $id; // assuming product_id is being passed
        $review->user_id = $user;
        $review->save();
        return redirect()->back()->with('success', 'Review added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $review = RateProduct::where('product_id', 'like', "%$id%")->get();
        return view('rating',compact('review'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(RateProduct $rateProduct)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRateProductRequest $request, RateProduct $rateProduct)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RateProduct $rateProduct)
    {
        //
    }
}
