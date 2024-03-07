@extends('web.layout')

@section('content')
@foreach($review as $reviews)
    <div class="d-flex flex-row">
        <img src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/avatar-3.webp" alt="avatar"
        class="rounded-circle d-flex align-self-center me-3 shadow-1-strong" width="60">
        <div class="pt-1">
        <p class="fw-bold mb-0">{{ DB::table('users')->where('id', $reviews->user_id )->value('name') }}</p>
        <p class="small text-muted">{{ $reviews->number_of_rate_for_product }}</p>
        <p class="small text-muted">{{ $reviews->comment }}</p>
        </div>
    </div>
@endforeach

@endsection
