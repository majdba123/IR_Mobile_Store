@extends('admin.layout')
@section('content')
company update

<form action={{ route('update.company',$company->id) }} method="post"/>
@csrf
@method('Put')
    <div class="mb-3 row">
        <label for="staticEmail" class="col-sm-2 col-form-label">company_name</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" value="{{ $company->company_name }}" name="company_name" id="inputPassword">

        </div>
    </div>
    <div class="mb-3 row">

        <label for="inputPassword" class="col-sm-2 col-form-label">company_address</label>
        <div class="col-sm-10">
        <input type="text" class="form-control" value="{{ $company->company_address }}" name="company_address"id="inputPassword">

        </div>
    </div>

    <div class="col-sm-10">
        <button >Update company</button>
    </div>
</form>
@endsection
