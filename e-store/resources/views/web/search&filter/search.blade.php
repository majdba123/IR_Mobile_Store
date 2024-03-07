@extends('web.layout')
@section('content')

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
        </tr>
    </thead>

    @foreach($products as $products2)
        <tbody>
            <tr>
                <th>{{$products2->mobile_name }}</th>
                <th>{{$products2->Cpu_spsecfication }}</th>
                <th>{{$products2->Gpu_spsecfication }}</th>
                <th>{{$products2->battery_spsecfication  }}</th>
                <th>{{$products2->Front_camera_spsecfication }}</th>
                <th>{{$products2->Back_camera_spsecfication}}</th>
                <th>{{$products2->Screen_Size }}</th>
                <th>{{$products2->Type_of_charge  }}</th>
                <th>{{$products2->Price}}</th>
                <td><img src="{{ asset('imageproduct/'.$products2->imge) }}" width="100" height="100" alt="{{ $products2->name }}"/></td>
                <td>{{ DB::table('companies')->where('id', $products2->Company_id)->value('company_name') }}</td>
                <td>{{ DB::table('categories')->where('id', $products2->category_id)->value('name') }}</td>
        </tbody>
    @endforeach
</table>
@endsection
