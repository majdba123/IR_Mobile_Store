
@extends('admin.layout')
@section('content')
<div class="container">

    <h2>Orders</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Order_id</th>
                <th>count_of_items_in_order</th>
                <th>user_name</th>
                <th>total_price</th>
                <th>event</th>
            </tr>
        </thead>
        @foreach ($order as $orders)
        <tbody>
            <tr>
                <td>{{$orders-> id }}</td>
                <td>{{$orders-> count_of_items_in_order }}</td>
                <td>{{ DB::table('users')->where('id', $orders->user_id)->value('name') }}</td>
                <td>{{$orders-> total_price }}</td>


                <td>
                    <a href="{{route('product.order' , $orders-> id) }}"><button class="btn btn-primary">Show Products of order</button></a>
                </td>
            </tr>
        </tbody>
        @endforeach
        <tfoot>
            <tr>
                <td colspan="5" class="text-right">
                    <span class="card-text"><strong>Count_Of_Order :{{ $recordCount }}</strong></span>
                </td>
            </tr>
        </tfoot>
    </table>
</div>

@endsection
