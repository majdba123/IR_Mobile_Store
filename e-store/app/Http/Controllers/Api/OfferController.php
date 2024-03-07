<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\offer;
use App\Models\Product;
use Illuminate\Http\Request;

class OfferController extends Controller
{
    public function store(Request $request)
    {
        // $product = Product::findOrFail($product_id);

        $validatedData = $request->validate([
            'percent_of_discount' => 'required',
            'expiration_date' => 'required|date', // Add validation for expiration date
            // Other validation rules for the offer
        ]);

        offer::create([
            'percent_of_discount' => $validatedData['percent_of_discount'],
            'expiration_date' => $validatedData['expiration_date'], // Assign expiration date
            // Other offer details
        ]);



        return response()->json(['message' => 'Offer created successfully'], 201);
    }

    public function deleteOffer($offerId)
    {
        $offer = Offer::findOrFail($offerId);
        $offer->delete();

        return response()->json(['message' => 'Offer deleted successfully'], 200);
    }

    public function modifyOffer(Request $request, $offerId)
    {
        $offer = Offer::findOrFail($offerId);

        // Validate request data
        $validatedData = $request->validate([
            'percent_of_discount' => 'required',
            'expiration_date' => 'required|date',
        ]);

        // Update offer details
        if (isset($validatedData['percent_of_discount'])) {
            $offer->percent_of_discount = $validatedData['percent_of_discount'];
        }

        if (isset($validatedData['expiration_date'])) {
            $offer->expiration_date = $validatedData['expiration_date'];
        }

        $offer->save();

        return response()->json(['message' => 'Offer modified successfully'], 200);
    }

    public function allOffers()
    {
        $offers = Offer::all();

        return response()->json($offers, 200);
    }

    public function show_precent_offer($id)
    {
        $offer = offer::where('id', $id)->get('percent_of_discount');


        return response()->json($offer[0], 200);
    }
}
