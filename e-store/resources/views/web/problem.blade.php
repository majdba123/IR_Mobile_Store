
@extends('web.layout')
@section('content')

<form action="{{ route('problem.store') }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('POST')
      <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">description</label>
        <textarea class="form-control" name="Text_of_problem" id="exampleFormControlTextarea1" rows="3"></textarea>
      </div>

      <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">file</label>
        <input type="file" name="file" accept=".csv, .txt">
      </div>
    <button type="submit">Submit Problem</button>
</form>
@endsection
