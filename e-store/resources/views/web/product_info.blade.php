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
            <th>rating</th>
        </tr>
    </thead>
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
            <td> <a class="nav-link" href="{{ route('review.show', $products->id) }}">Show Rating</a></td>
    </tbody>
</table>
<div class="card-body">
    <form  action="{{ route('review.store', $products->id) }}" method="POST">
        @csrf
        @method('Post')
        <div class="form-group row">
            <label for="rating" class="col-md-4 col-form-label text-md-right">{{ __('Rating') }}</label>
            <div class="col-md-6">
                <input id="rating" type="number" class="form-control" name="rating" value="{{ old('rating') }}" min="1" max="5"  autofocus>
            </div>
        </div>
        <div class="form-group row">
            <label for="review" class="col-md-4 col-form-label text-md-right">{{ __('Review') }}</label>
            <div class="col-md-6">
                <textarea id="review" rows="4" class="form-control @error('review') is-invalid @enderror" name="review" value="{{ old('review') }}" required autocomplete="review"></textarea>
            </div>
        </div>
        <div class="form-group row mb-0">
            <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-primary">
                    {{ __('Submit Review') }}
                </button>
            </div>
        </div>
    </form>
</div>
@endsection
