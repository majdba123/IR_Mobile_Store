@extends('web.layout')
@section('content')
<form action="{{ route('update.profile',$user->id) }}" method="POST">
    @csrf
    @method('PUT')
    <label for="name_of_the_city">Name of the City:</label><br>
    <input type="text" id="name_of_the_city" value={{ $address->name_of_the_city }} name="name_of_the_city"><br>

    <label for="number_of_the_street">Number of the Street:</label><br>
    <input type="text" id="number_of_the_street" value={{ $address->number_of_the_street }} name="number_of_the_street"><br>

    <label for="number_of_building">Number of Building:</label><br>
    <input type="text" id="number_of_building"   value={{ $address->number_of_building}} name="number_of_building"><br>

    <label for="phone">Phone:</label><br>
    <input type="text" id="phone" value="{{ $user->phone }}" name="phone"><br>

    <input type="submit" value="Submit">
</form>
@endsection
