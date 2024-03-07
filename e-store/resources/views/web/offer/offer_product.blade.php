@extends('web.layout')
@section( 'content')

<div class="card-group">
    @foreach ( $products as $product )
    <div class="card">
        <img class="card-img-top" src="{{ asset('imageproduct/'.$product->imge) }}" width="50px" height="150px" alt="Card image cap">
        <div class="card-body">
            <h5 class="card-title">{{ $product->mobile_name }}</h5>
            <p class="card-text">{{ DB::table('companies')->where('id', $product->Company_id)->value('company_name') }}</p>
            <p class="card-text">Orginal_price:         <small class="text-muted">{{$product->Price }}</small></p>
            <p class="card-text">Price After_Discount   <small class="text-muted">{{ $product->discounted_price}}</small></p>
            <a href="{{ route('web.product_deatails',$product->id ) }}" class="btn btn-primary">show more deatails </a>
            <form action="{{ route('add.cart',$product->id) }}" method="post">
                @csrf
                    <input type="number" name="quantity" min="1" value="1" class="form-control mb-2">
                    <button type="submit" class="btn btn-primary">Add to Cart</button>
                </form>
        </div>
        </div>
    @endforeach
</div>


@endsection
