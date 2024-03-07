@extends('web.layout')
@section('content')

<div class="container">
            <label class="form-label" for="form1">Search by name</label>
            <form action="{{ route('search.search') }}" method="GET" >
                @csrf
                @method('GET')
                <input type="text" id="form1"  name="quiry" class="form-control" />
                 </br>
                <button type="submit" class="btn btn-primary" data-mdb-ripple-init>
                <i class="fas fa-search"></i>
                </button>
            </form>
</div>
</br>
<form method="GET" action="{{ route('respone.filter') }}">
    <div class="row">
        <div class="col-md-6">
            <label for="company">Company:</label>
            <select id="company" name="company" class="form-control">
                <option value="">Select a company</option>
                @foreach($company as $company)
                    <option value="{{ $company->id }}" {{ request('company') == $company->id ? 'selected' : '' }}>{{ $company->company_name }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-6">
            <label for="category">Category:</label>
            <select id="category" name="category" class="form-control">
                <option value="">Select a category</option>
                @foreach($category as $category)
                    <option value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
    </div>
</br>
    <button type="submit" class="btn btn-primary">Filter</button>
</form>
@endsection
