@extends('admin.layout')
@section('content')


<form action={{ route('store.category') }} method="post"/>
@csrf
@method('POST')
    <div class="mb-3 row">
        <label for="staticEmail" class="col-sm-2 col-form-label">category_name</label>
        <div class="col-sm-10">
            <input type="text" class="form-control"  name="name" id="inputPassword">

        </div>
    </div>
    <div class="mb-3 row">
        <label for="inputPassword" class="col-sm-2 col-form-label">company/label>
        <div class="col-sm-10">
            <select id="category_id" type="text" class="form-control @error('category_id') is-invalid @enderror" name="Company_id" value="{{ old('Company_id') }}" required autocomplete="category_id" autofocus>
                @foreach($company as $company)
                    <option value="{{ $company->id }}">{{ $company->company_name }}</option>
                @endforeach
            </select>

        </div>
    </div>
    <div class="col-sm-10">
        <button >Add Category</button>
    </div>
</form>

@endsection
