@extends('web.layout')


@section('content')
<table id="cart" class="table table-bordered">
    <thead>
        <tr>
            <th>name</th>
            <th>Price</th>
            <th>quantity</th>
            <th>event</th>
            <th>Company</th>
            <th>category</th>
        </tr>
    </thead>
    <tbody>
        @php $total = 0 @endphp
        @if(session('cart'))
            @foreach(session('cart') as $id => $details)
                <tr rowId="{{ $id }}">
                    <td data-th="Product">
                        <div class="row">
                            <div class="col-sm-12">
                                <h4 class="nomargin">{{ $details['name'] }}</h4>
                            </div>
                        </div>
                    </td>
                    <td data-th="Price">${{ $details['price'] }}</td>

                    <td data-th="Subtotal" class="text-center">
                        <form action="{{route('update.sopping.cart',$id)}}" method="post">
                            @csrf
                            @method('Put')
                            <input type="number" name="quantity" min="1" value="{{ $details['quantity'] }}" class="form-control mb-2">
                            <button type="submit" class="btn btn-primary">edit</button>
                         </form>
                    </td>
                    <td class="actions">
                        <form action="{{route('delete.cart.product',$id)}}" method="POST" >
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                         </form>
                    </td>
                    <td data-th="Price">{{ DB::table('companies')->where('id',  $details['Company_id'])->value('company_name') }}</td>
                    {{ DB::table('categories')->where('id', $details['category_id'])->value('name') }}
                    <td data-th="Price">{{ DB::table('categories')->where('id', $details['category_id'])->value('name') }}</td>
                </tr>
            @endforeach
        @endif
    </tbody>
    <tfoot>
        <tr>
            <td colspan="5" class="text-right">
                <span class="card-text"><strong>{{ $totalPrice }}</strong></span>
                <a href="{{ route('web') }}" class="btn btn-primary"><i class="fa fa-angle-left"></i> Continue Shopping</a>
                <a href="{{ route('Order.Place') }}" class="btn btn-primary"><i class="fa fa-angle-left"></i>Place Order</a>


            </td>
        </tr>
    </tfoot>
</table>
@endsection
