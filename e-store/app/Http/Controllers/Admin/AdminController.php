<?php

namespace App\Http\Controllers\Admin;
use App\Models\Company;
use App\Models\Category;
use App\Models\Product;
use Dotenv\Validator as DotenvValidator;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Validator;
class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() //
    {
        return view('admin.layout');
    }

    public function addcompany()    //
    {
        return view('admin.add-comany');
    }

    public function storecompany(Request $request)  //
    {
        $request->validate([

            'company_name' => 'required|unique:companies,company_name',

            'company_address' => 'required',
         ]);

         $company=Company::create($request->all());
         return redirect()->back()->with(['success'=>'add company done']);

    }
    public function companydistroy($id)
    {
        $comany=Company::findOrfail($id);
        $comany->delete();
        return redirect()->back()->with('success', 'company deleted successfully.');
    }

    public function companyupdate($id)
    {
        $company = Company::findOrfail($id);
        return view('admin.update-company',compact('company'));
    }


    public function addcategory()
    {
        $company=Company::all();
        return view('admin.add-category',compact('company'));
    }

    public function storecategory(Request $request)
    {
        $request->validate([

            'name' => 'required|unique:categories,name',
            'Company_id' => 'required',
         ]);

         $category=Category::create($request->all());
         return redirect()->back()->with(['success'=>'add category done']);
    }
    public function categorydistroy($id)
    {
        $category=Category::findOrfail($id);
        $category->delete();
        return redirect()->back()->with('success', 'category deleted successfully.');
    }

    public function categoryupdate($id)
    {
        $category=Category::findOrfail($id);
        $companies = Company::all();
        return view('admin.update-category',compact('category','companies'));
    }

    public function addphone()
    {
        $company=Company::all();
        $category=Category::all();

        return view('admin.add-phone', compact(['company', 'category']));
    }



    public function storephone(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'mobile_name' => 'required',
            'Cpu_spsecfication' => 'required',
            'Gpu_spsecfication' => 'required',
            'battery_spsecfication' => 'required',
            'Front_camera_spsecfication' => 'required',
            'Back_camera_spsecfication' => 'required',
            'Screen_Size' => 'required',
            'Type_of_charge' => 'required',
            'Price' => 'required',
            'imge' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
            'category_id' => 'required|exists:categories,id',
            'Company_id' => 'required|exists:companies,id',

        ]);
        if ($validator->fails()) {
            return redirect()->route('add.phone')->withErrors($validator)->withInput();
        }
        $imageName = null;
        if ($request->hasFile('imge')) {
            $imageName = time().'.'.$request->file('imge')->getClientOriginalExtension();
            $request->imge->move(public_path('imageproduct'), $imageName);
        }
        $product = new Product([
            'mobile_name' => $request->input('mobile_name'),
            'Cpu_spsecfication' => $request->input('Cpu_spsecfication'),
            'Gpu_spsecfication' => $request->input('Gpu_spsecfication'),
            'battery_spsecfication' => $request->input('battery_spsecfication'),
            'Front_camera_spsecfication' => $request->input('Front_camera_spsecfication'),
            'Back_camera_spsecfication' => $request->input('Back_camera_spsecfication'),
            'Screen_Size' => $request->input('Screen_Size'),
            'Type_of_charge' => $request->input('Type_of_charge'),
            'Price' => $request->input('Price'),
            'Company_id' => $request->input('Company_id'),
            'category_id' => $request->input('category_id'),
            'imge' => $imageName,
        ]);
        $product->save();
        return redirect()->route('add.phone')->with('success', 'Product added successfully.');
    }



    public function productdistroy($id)
    {
        $product=Product::findOrfail($id);
        $product->delete();
        return redirect()->back()->with('success', 'product deleted successfully.');
    }


    public function productupdate($id)
    {
        $product=Product::findOrfail($id);
        $company = Company::all();
        $category=Category::all();
        return view('admin.update-product',compact('product','company','category'));
    }


    public function addcsv()
    {
        return view('admin.add-csv-file-product');
    }



    public function storecsv(Request $request)

    {
        $request->validate([

            'csv_file' => 'required|mimes:csv,txt',
        ]);
        $path = $request->file('csv_file')->getRealPath();
        $data = array_map('str_getcsv', file($path));
        $data = array_slice($data, 1);
        foreach ($data as $row) {
            $product = new Product([
                'mobile_name' => $row[0],
                'Cpu_spsecfication' => $row[1],
                'Gpu_spsecfication' => $row[2],
                'battery_spsecfication' => $row[4],
                'Front_camera_spsecfication' => $row[5],
                'Back_camera_spsecfication' => $row[6],
                'Screen_Size' => $row[7],
                'Type_of_charge' => $row[8],
                'Price' => $row[9],
                'Company_id' => $row[10],
                'category_id' => $row[11],
            ]);
            $product->save();
        }
        return redirect()->back()->with('success', 'Products imported successfully.');
    }

    public function main()

    {
        $companies = Company::all();
        $category = Category::with('company')->get();
        $products = Product::with('company','category')->get();
        return view('admin.main', compact('products', 'category','companies'));

    }

    public function updatecate(Request $request,$id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'sometimes|unique:categories,name',
            'Company_id' => 'sometimes|required'
         ]);
         if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
         $category=Category::find($id);
        if ($request->input('name')) {
            $category->name = $request->input('name');
        }
        if ($request->input('Company_id')) {
            $category->Company_id = $request->input('Company_id');
        }
         $category->save();
         return redirect()->back()->with(['success'=>'updtae category done']);
    }

    public function updatecomp(Request $request,$id)
    {
        $validator = Validator::make($request->all(), [
            'company_name' => 'sometimes|unique:categories,name',
            'company_address' => 'sometimes|required'
         ]);
         if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
         $company=Company::find($id);
        if ($request->input('company_name')) {
            $company->company_name = $request->input('company_name');
        }
        if ($request->input('company_address')) {
            $company->company_address = $request->input('company_address');
        }
         $company->save();
         return redirect()->back()->with(['success'=>'updtae company done']);
    }

    public function updateprod(Request $request ,$id)
    {
        $validator = Validator::make($request->all(), [
            'mobile_name' => 'required',
            'Cpu_spsecfication' => 'required',
            'Gpu_spsecfication' => 'required',
            'battery_spsecfication' => 'required',
            'Front_camera_spsecfication' => 'required',
            'Back_camera_spsecfication' => 'required',
            'Screen_Size' => 'required',
            'Type_of_charge' => 'required',
            'Price' => 'required',
            'imge' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
            'category_id' => 'required|exists:categories,id',
            'Company_id' => 'required|exists:companies,id',

        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $product = Product::find($id);
            $product->mobile_name = $request->input('mobile_name');
            $product->Cpu_spsecfication = $request->input('Cpu_spsecfication');
            $product->Gpu_spsecfication = $request->input('Gpu_spsecfication');
            $product->battery_spsecfication = $request->input('battery_spsecfication');
            $product->Front_camera_spsecfication = $request->input('Front_camera_spsecfication');
            $product->Back_camera_spsecfication = $request->input('Back_camera_spsecfication');
            $product->Screen_Size = $request->input('Screen_Size');
            $product->Type_of_charge = $request->input('Type_of_charge');
            $product->Price = $request->input('Price');
            $product->Company_id = $request->input('Company_id');
            $product->category_id = $request->input('category_id');

        if ($request->hasFile('imge')) {
            $request->validate([
                'imge' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            $imageName = time().'.'.$request->imge->extension();
            $request->imge->move(public_path('imageproduct'), $imageName);
            $product->imge = $imageName;
        }
        $product->save();

        return redirect()->route('add.phone')->with('success', 'Product added successfully.');
    }

}
