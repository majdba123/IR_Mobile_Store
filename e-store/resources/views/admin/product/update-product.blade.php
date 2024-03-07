@extends('admin.layout')
@section('content')
@if (Session::has('success'))
    <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
        {{ Session::get('success') }}
    </div>
@endif

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form action={{ route('update.product',$product->id) }} method="post" enctype="multipart/form-data"/>
@csrf
@method('Put')
    <div class="mb-3 row">
        <label for="staticEmail" class="col-sm-2 col-form-label">name</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" value ="{{$product->mobile_name}}" name="mobile_name" id="inputPassword">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="staticEmail" class="col-sm-2 col-form-label">Cpu_spsecfication</label>
        <div class="col-sm-10">
            <input type="text" class="form-control"  value="{{ $product->Cpu_spsecfication }}" name="Cpu_spsecfication" id="inputPassword">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="staticEmail" class="col-sm-2 col-form-label">Gpu_spsecfication</label>
        <div class="col-sm-10">
            <input type="text" class="form-control"  value="{{ $product->Gpu_spsecfication }}" name="Gpu_spsecfication" id="inputPassword">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="staticEmail" class="col-sm-2 col-form-label">battery_spsecfication</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" value="{{ $product->battery_spsecfication }}" name="battery_spsecfication" id="inputPassword">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="staticEmail" class="col-sm-2 col-form-label">Front_camera_spsecfication</label>
        <input type="text" class="form-control" value="{{ $product->Front_camera_spsecfication }}" name="Front_camera_spsecfication" id="inputPassword">

        <div class="col-sm-10">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="staticEmail" class="col-sm-2 col-form-label">Back_camera_spsecfication</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" value="{{ $product->Back_camera_spsecfication }}" name="Back_camera_spsecfication" id="inputPassword">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="staticEmail" class="col-sm-2 col-form-label">Screen_Size</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" value="{{ $product->Screen_Size }}"  name="Screen_Size" id="inputPassword">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="staticEmail" class="col-sm-2 col-form-label">Type_of_charge</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" value="{{ $product->Type_of_charge }}" name="Type_of_charge" id="inputPassword">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="staticEmail" class="col-sm-2 col-form-label">Price</label>
        <div class="col-sm-10">
            <input type="text" class="form-control"  value="{{ $product->Price }}" name="Price" id="inputPassword">
        </div>
    </div>

    <div class="mb-3 row">
        <label for="inputPassword" class="col-sm-2 col-form-label">Company</label>
        <div class="col-sm-10">
            <select id="category_id" type="text" class="form-control @error('category_id') is-invalid @enderror" name="Company_id" value="{{ old('Company_id', $product->Company_id) }}" autofocus>
                @foreach($company as $company)
                    <option value="{{ $company->id }}" {{ $company->id == old('Company_id', $product->Company_id) ? 'selected' : '' }}>{{ $company->company_name }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="mb-3 row">
        <label for="inputPassword" class="col-sm-2 col-form-label">Category</label>
        <div class="col-sm-10">
            <select id="category_id" type="text" class="form-control @error('category_id') is-invalid @enderror" name="category_id" value="{{ old('category_id', $product->category_id) }}" autofocus>
                @foreach($category as $category)
                    <option value="{{ $category->id }}" {{ $category->id == old('category_id', $product->category_id) ? 'selected' : '' }}>{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="mb-3 row">
        <label for="inputPassword" class="col-sm-2 col-form-label">Offer/label>
        <div class="col-sm-10">
            <select id="category_id" type="text" class="form-control @error('category_id') is-invalid @enderror" name="offer_id" value="{{ old('offer_id') }}" required autocomplete="Company_id" autofocus>
                @foreach($offer as $offers)
                    <option value="{{ $offers->id }}">{{ $offers->percent_of_discount }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">image</label>
        <input type="file" class="form-control" id="exampleFormControlInput1"  name="imge">
      </div>
    <div class="col-sm-10">
        <button >Update phone</button>
    </div>
</form>
@endsection
