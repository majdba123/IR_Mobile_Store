@extends('web.layout')
@section('content')
<div class="card-group">
    @foreach ( $company as $company )
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $company->company_name }}</h5>
            <p class="card-text"><small class="text-muted">{{ $company->company_address }}</small></p>
            <a href="{{ route('company.product',$company->id) }}" class="btn btn-primary">show Product </a>
        </div>
        </div>

    @endforeach


</div>
@endsection
