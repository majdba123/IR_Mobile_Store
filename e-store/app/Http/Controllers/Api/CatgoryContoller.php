<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CatgoryContoller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        return response()->json($categories, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function create(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:categories,name',
            'company_id' => 'required',
            // Add other validation rules for your fields
        ]);

        $category = Category::create($validatedData);

        return response()->json($category, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $category = Category::find($id);
        if (!$category) {
            return response()->json(['message' => 'Category not found'], 404);
        }
        return response()->json($category, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $Category = Category::find($request->id);
        if (!$Category) {
            return response()->json(['error' => 'Category not found'], 404);
        }
        $this->validate($request, [
            'name' => 'required',
            'company_id' => 'required',
            // Add validation rules for other fields
        ]);
        $Category->update($request->all());
        return response()->json($Category, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $Category = Category::find($request->id);
        if (!$Category) {
            return response()->json(['error' => 'Category not found'], 404);
        }

        $Category->delete();
        return response()->json(['message' => 'Category deleted successfully'], 200);
    }
    public function getCategoryProducts($categoryId)
    {
        $category = Category::find($categoryId);

        if (!$category) {
            return response()->json(['error' => 'Category not found'], 404);
        }

        $products = $category->product; //  'products' is the relationship method in Category model

        return response()->json($products);
    }
}
