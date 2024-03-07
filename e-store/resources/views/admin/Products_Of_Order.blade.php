@extends('admin.layout')
@section('content')
<h2>Product_ofOrders</h2>
<table class="table">
    <thead>
        <tr>
            <th>Name_Product</th>
            <th>Company_Of_Product</th>
            <th>Category_Of_Product</th>
            <th>Price_For_One</th>
            <th>Quantity</th>
        </tr>
    </thead>
    @foreach ($PivotOrderProduct as $PivotOrderProducts)
    <tbody>
        <tr>
            <td>{{ $PivotOrderProducts->product->mobile_name}}</td>
            <td>{{$PivotOrderProducts->product->company->company_name  }}</td>
            <td>{{$PivotOrderProducts->product->category->name  }}</td>
            <td>{{ DB::table('products')->where('id', $PivotOrderProducts->product_id)->value('Price') }}</td>
            <td>{{$PivotOrderProducts->quantity }}</td>
        </tr>
    </tbody>
    @endforeach
    <tfoot>
        <tr>
            <td colspan="5" class="text-right">
                <a href="{{ route('admin.order') }}" class="btn btn-primary"><i class="fa fa-angle-left"></i>Back</a>
            </td>
        </tr>
    </tfoot>
</table>
</div>
@endsection
