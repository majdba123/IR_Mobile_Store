@extends('admin.layout')
@section('content')


@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form action={{ route('store.phone') }} method="post" enctype="multipart/form-data"/>
@csrf
@method('POST')
    <div class="mb-3 row">
        <label for="staticEmail" class="col-sm-2 col-form-label">name</label>
        <div class="col-sm-10">
            <input type="text" class="form-control"  name="mobile_name" id="inputPassword">

        </div>
    </div>
    <div class="mb-3 row">
        <label for="staticEmail" class="col-sm-2 col-form-label">Cpu_spsecfication</label>
        <div class="col-sm-10">
            <input type="text" class="form-control"  name="Cpu_spsecfication" id="inputPassword">

        </div>
    </div>
    <div class="mb-3 row">
        <label for="staticEmail" class="col-sm-2 col-form-label">Gpu_spsecfication</label>
        <div class="col-sm-10">
            <input type="text" class="form-control"  name="Gpu_spsecfication" id="inputPassword">

        </div>
    </div>

    <div class="mb-3 row">
        <label for="staticEmail" class="col-sm-2 col-form-label">battery_spsecfication</label>
        <div class="col-sm-10">
            <input type="text" class="form-control"  name="battery_spsecfication" id="inputPassword">

        </div>
    </div>

    <div class="mb-3 row">
        <label for="staticEmail" class="col-sm-2 col-form-label">Front_camera_spsecfication</label>
        <div class="col-sm-10">
            <input type="text" class="form-control"  name="Front_camera_spsecfication" id="inputPassword">

        </div>
    </div>

    <div class="mb-3 row">
        <label for="staticEmail" class="col-sm-2 col-form-label">Back_camera_spsecfication</label>
        <div class="col-sm-10">
            <input type="text" class="form-control"  name="Back_camera_spsecfication" id="inputPassword">

        </div>
    </div>

    <div class="mb-3 row">
        <label for="staticEmail" class="col-sm-2 col-form-label">Screen_Size</label>
        <div class="col-sm-10">
            <input type="text" class="form-control"  name="Screen_Size" id="inputPassword">

        </div>
    </div>


    <div class="mb-3 row">
        <label for="staticEmail" class="col-sm-2 col-form-label">Type_of_charge</label>
        <div class="col-sm-10">
            <input type="text" class="form-control"  name="Type_of_charge" id="inputPassword">

        </div>
    </div>

    <div class="mb-3 row">
        <label for="staticEmail" class="col-sm-2 col-form-label">Price</label>
        <div class="col-sm-10">
            <input type="text" class="form-control"  name="Price" id="inputPassword">

        </div>
    </div>

    <div class="mb-3 row">
        <label for="inputPassword" class="col-sm-2 col-form-label">company/label>
        <div class="col-sm-10">
            <select id="category_id" type="text" class="form-control @error('category_id') is-invalid @enderror" name="Company_id" value="{{ old('Company_id') }}" required autocomplete="Company_id" autofocus>
                @foreach($company as $company)
                    <option value="{{ $company->id }}">{{ $company->company_name }}</option>
                @endforeach
            </select>

        </div>
    </div>

    <div class="mb-3 row">
        <label for="inputPassword" class="col-sm-2 col-form-label">category/label>
        <div class="col-sm-10">
            <select id="category_id" type="text" class="form-control @error('category_id') is-invalid @enderror" name="category_id" value="{{ old('category_id') }}" required autocomplete="category_id" autofocus>
                @foreach($category as $c)
                    <option value="{{ $c->id }}">{{ $c->name }}</option>
                @endforeach
            </select>

        </div>
    </div>

    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">image</label>
        <input type="file" class="form-control" id="exampleFormControlInput1"  name="imge">
      </div>
    <div class="col-sm-10">
        <button >Add phone</button>
    </div>
</form>
@endsection
