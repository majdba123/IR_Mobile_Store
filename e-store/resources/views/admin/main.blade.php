@extends('admin.layout')
@section('content')
<div class="container">


    <h2>company</h2>

    <table class="table">

        <thead>

            <tr>

                <th>company_name</th>
                <th>company_address</th>
                <th>event</th>


            </tr>
        </thead>
        @foreach ($companies as $company )
            <tbody>
                <tr>
                    <td>{{ $company->company_name }}</td>
                    <td>{{ $company->company_address }}</td>
                    <td>
                        <a href="{{ route('company.update',$company->id) }}"><button class="btn btn-danger">update</button></a>
                        <form action="{{ route('company.destroy',$company->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                    </td>
                </tr>


            </tbody>
            @endforeach
    </table>

    <h2>Categiry</h2>

    <table class="table">
        <thead>
            <tr>
                <th>name of category</th>
                <th>name of company</th>
                <th>event</th>
            </tr>
        </thead>
        @foreach ($category as $category )
        <tbody>
            <tr>
                <td>{{ $category->name }}</td>
                <td>{{ DB::table('companies')->where('id', $category->Company_id)->value('company_name') }}</td>
                <td>
                    <a href="{{ route('category.update',$category->id) }}"><button class="btn btn-danger">update</button></a>
                    <form action="{{ route('category.destroy',$category->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                </td>
            </tr>
        </tbody>
        @endforeach
     </table>

    <h2>product</h2>

    <table class="table">

        <thead>
            <tr>
                <th>mobile_name</th>
                <th>Cpu_spsecfication</th>
                <th>Gpu_spsecfication</th>
                <th>battery_spsecfication</th>
                <th>Front_camera_spsecfication</th>
                <th>Back_camera_spsecfication</th>
                <th>Screen_Size</th>
                <th>Type_of_charge</th>
                <th>Price</th>
                <th>imge</th>
                <th>name of comany</th>
                <th>name of category</th>
                <th>event</th>
            </tr>
        </thead>
        @foreach ($products as $products)
        <tbody>
            <tr>
                <th>{{$products-> mobile_name }}</th>
                <th>{{$products-> Cpu_spsecfication }}</th>
                <th>{{$products-> Gpu_spsecfication }}</th>
                <th>{{$products->battery_spsecfication  }}</th>
                <th>{{$products-> Front_camera_spsecfication }}</th>
                <th>{{$products->  Back_camera_spsecfication}}</th>
                <th>{{$products-> Screen_Size }}</th>
                <th>{{$products->Type_of_charge  }}</th>
                <th>{{$products->  Price}}</th>
                <td><img src="{{ asset('imageproduct/'.$products->imge) }}" width="100" height="100" alt="{{ $products->name }}"/></td>
                <td>{{ DB::table('companies')->where('id', $products->Company_id)->value('company_name') }}</td>
                <td>{{ DB::table('categories')->where('id', $products->category_id)->value('name') }}</td>
                <td>
                    <a href="{{ route('product.update',$products->id) }}"><button class="btn btn-danger">update</button></a>
                    <form action="{{ route('products.destroy',$products->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                </td>
            </tr>

        </tbody>
        @endforeach

    </table>
</div>

@endsection
