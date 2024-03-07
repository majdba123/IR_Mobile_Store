<?php

namespace App\Http\Controllers\Api;

use App\Models\Product;
use App\Http\Controllers\Controller;
use App\Models\offer;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();

        return response()->json($products, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function create(Request $request)
    {


        $validatedData = $request->validate([
            'mobile_name' => 'required',
            'Cpu_spsecfication' => 'required',
            'Gpu_spsecfication' => 'required',
            'battery_spsecfication' => 'required',
            'Front_camera_spsecfication' => 'required',
            'Back_camera_spsecfication' => 'required',
            'Screen_Size' => 'required',
            'Type_of_charge' => 'required',
            'Price' => 'required',
            'imge' => 'required',
            'category_id' => 'required|exists:categories,id',
            'company_id' => 'required|exists:companies,id',
            'offer_id' => 'nullable|required'
            // Add other validation rules for your fields
        ]);
        if ($request->hasFile('imge')) {
            $image = $request->file('imge');
            $path = base_path() . '\\storage\\app\\public\\images';
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $image->move($path, $filename);
            // print($path);

            $validatedData['imge'] =  $filename;
        }

        $product = Product::create($validatedData);

        return response()->json($product, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::find($id);
        if (!$product) {
            return response()->json(['message' => 'Product not found'], 404);
        }
        // print(asset($product->imge));
        // print('<br>');
        return response()->json($product, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update_product(Request $request)
    {
        $product = Product::find($request->id);
        if (!$product) {
            return response()->json(['message' => 'Product not found'], 404);
        }

        $validatedData = $request->validate([
            'mobile_name' => 'required',
            'Cpu_spsecfication' => 'required',
            'Gpu_spsecfication' => 'required',
            'battery_spsecfication' => 'required',
            'Front_camera_spsecfication' => 'required',
            'Back_camera_spsecfication' => 'required',
            'Screen_Size' => 'required',
            'Type_of_charge' => 'required',
            'Price' => 'required',
            'imge' => 'required',
            'category_id' => 'required|exists:categories,id',
            'company_id' => 'required|exists:companies,id',
            'offer_id' => 'nullable|required|exists:offers,id'
            // Add other validation rules for your fields
        ]);
        if ($request->hasFile('imge')) {
            $image = $request->file('imge');
            $path = base_path() . '\\storage\\app\\public\\images';
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $image->move($path, $filename);

            // print($path);
            $validatedData['imge'] =  $filename;
        }
        $product->update($validatedData);

        return response()->json($product, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $product = Product::find($request->id);
        if (!$product) {
            return response()->json(['message' => 'Product not found'], 404);
        }

        $product->delete();

        return response()->json(['message' => 'Product deleted successfully'], 200);
    }

    public function getImage($image)
    {

        $filePath = storage_path('app\\public\\images\\' . $image);
        // print($filePath);
        if (file_exists($filePath)) {
            return response()->file($filePath);
        }
        return response()->json(['error' => 'Image not found'], 404);
    }




    public function getProductsSortedByLatestTime()
    {
        $products = Product::orderBy('created_at', 'desc')->get();

        return response()->json($products);
    }
}
