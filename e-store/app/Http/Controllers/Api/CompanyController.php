<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $companies = Company::all();
        return response()->json($companies);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function create(Request $request)
    {

        $validatedData = $request->validate([
            'company_name' => 'required',
            'company_address' => 'required',
            'image' => 'required',
            // Add other validation rules for your fields
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $path = base_path() . '\\storage\\app\\public\\images';
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $image->move($path, $filename);

            $validatedData['image'] =  $filename;
        }
        // var_dump($validatedData);
        $company = Company::create($validatedData);

        return response()->json($company, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $company = Company::find($id);
        if (!$company) {
            return response()->json(['error' => 'Company not found'], 404);
        }
        return response()->json($company);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $company = Company::find($request->id);
        if (!$company) {
            return response()->json(['error' => 'Company not found'], 404);
        }
        $validatedData = $request->validate([
            'company_name' => 'required',
            'company_address' => 'required',
            'image' => 'required',
            // Add other validation rules for your fields
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $path = base_path() . '\\storage\\app\\public\\images';
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $image->move($path, $filename);

            $validatedData['image'] =  $filename;
        }
        $company->update($validatedData);
        return response()->json($company, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $company = Company::find($request->id);
        if (!$company) {
            return response()->json(['error' => 'Company not found'], 404);
        }

        $company->delete();
        return response()->json(['message' => 'Company deleted successfully'], 200);
    }
    public function getCompanyProducts($companyId)
    {
        $company = Company::find($companyId);

        if (!$company) {
            return response()->json(['error' => 'Company not found'], 404);
        }

        $products = $company->product; //  'product' is the relationship method in Company model

        return response()->json($products);
    }
}
