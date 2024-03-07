@extends('web.layout')
@section('content')
<div class="card-group">
    @foreach ( $category as $category )
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $category->name }}</h5>
            <td>{{ DB::table('companies')->where('id', $category->Company_id)->value('company_name') }}</td>
            <a href="{{ route('category.product',$category->id) }}" class="btn btn-primary">show Product </a>
        </div>
        </div>

    @endforeach


</div>
@endsection
