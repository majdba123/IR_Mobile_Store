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
<form action={{ route('update.category',$category->id) }} method="post"/>
@csrf
@method('Put')
    <div class="mb-3 row">
        <label for="staticEmail" class="col-sm-2 col-form-label">category_name</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" value="{{ $category->name }}" name="name" id="inputPassword">

        </div>
    </div>
    <div class="mb-3 row">
        <label for="inputPassword" class="col-sm-2 col-form-label">Company</label>
        <div class="col-sm-10">
            <select id="category_id" type="text" class="form-control @error('category_id') is-invalid @enderror" name="Company_id" value="{{ old('Company_id', $category->Company_id) }}" autofocus>
                @foreach($companies as $company)
                    <option value="{{ $company->id }}" {{ $company->id == old('Company_id', $category->Company_id) ? 'selected' : '' }}>{{ $company->company_name }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-sm-10">
        <button >Update Category</button>
    </div>
</form>
@endsection
