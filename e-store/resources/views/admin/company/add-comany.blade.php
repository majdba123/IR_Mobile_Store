@extends('admin.layout')
@section('content')


<form action={{ route('store.comany') }} method="post"/>
@csrf
@method('POST')
    <div class="mb-3 row">
        <label for="staticEmail" class="col-sm-2 col-form-label">company_name</label>
        <div class="col-sm-10">
            <input type="text" class="form-control"  name="company_name" id="inputPassword">

        </div>
    </div>
    <div class="mb-3 row">

        <label for="inputPassword" class="col-sm-2 col-form-label">company_address</label>
        <div class="col-sm-10">
        <input type="text" class="form-control"  name="company_address"id="inputPassword">

        </div>
    </div>

    <div class="col-sm-10">
        <button >Add company</button>
    </div>
</form>
@endsection
