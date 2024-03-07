@extends('web.layout')
@section('content')
<h2>User Details</h2>
<form action="{{ route('profile.store') }}" method="post">
    @csrf
    @method('post')
    <label for="name_of_the_city">Name of the City:</label><br>
    <input type="text" id="name_of_the_city" name="name_of_the_city"><br>

    <label for="number_of_the_street">Number of the Street:</label><br>
    <input type="text" id="number_of_the_street" name="number_of_the_street"><br>

    <label for="number_of_building">Number of Building:</label><br>
    <input type="text" id="number_of_building" name="number_of_building"><br>

    <label for="phone">Phone:</label><br>
    <input type="text" id="phone" name="phone"><br>

    <input type="submit" value="Submit">
</form>
@endsection
