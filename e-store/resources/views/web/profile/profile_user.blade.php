@extends('web.layout')
@section('content')
<div class="container">
    @php
        $id=0;
    @endphp
    @php
         $x=5;
    @endphp
    <h2>Profile User</h2>
    <button class="btn btn-primary"><a class="nav-link "href="{{ route('profile.edit'  , $id ) }}">edit your profile </a></button>
    <button class="btn btn-primary"><a class="nav-link "href="{{ route('profile.show' , $x) }}">add your profile  </a></button>
    <button class="btn btn-primary"><a class="nav-link "href="{{ route('history.order') }}">Order_History  </a></button>


        <div class="col-md-4">
            <img src="" alt="User Image" class="img-responsive">
            <h3></h3>
            <p></p>
        </div>
        <div class="col-md-8">
            <h3>Personal Information</h3>
            <p><strong>Name_Of_User: {{ $user-> name}}</strong> </p>
            <p><strong>email_Of_User: {{ $user-> email}}</strong> </p>
            <p><strong>City:</strong> @if(isset($address->name_of_the_city)) {{ $address->name_of_the_city }} @else {{ $cityNotFound }} @endif</p>
            <p><strong>Street:</strong> @if(isset($address->number_of_the_street)) {{ $address->number_of_the_street }} @else {{ $streetNotFound }} @endif</p>
            <p><strong>Building:</strong> @if(isset($address->number_of_building)) {{ $address->number_of_building }} @else {{ $buildingNotFound }} @endif</p>
            <p><strong>Phone: {{ $user->phone }}</strong></p>
        </div>

    </div>

</div>
@endsection
