@extends('layouts.app')

@section('title') Show Page @endsection

@section('content')

<div class="card">
    <div class="card-header">
      Post Info
    </div>
    <div class="card-body">
      <h5 class="card-title">Title:</h5>
      <p class="card-text">{{ $post['title'] }}</p>
      <h5 class="card-title">Description:</h5>
      <p class="card-text">{{ $post['description'] }}</p>
    </div>
</div>

<div class="card" style="margin-top:50px;">
    <div class="card-header">
      Post Creator Info
    </div>
    <div class="card-body">
      <h5 class="card-title">Name:-</h5>
      <p class="card-text">{{$user->name ? $user->name : 'user not found'}}</p>
      <h5 class="card-title">Email:-</h5>
      <p class="card-text">{{$user->email ? $user->email : 'user not found'}}</p>
      <h5 class="card-title">Created At:</h5>
      <p class="card-text">{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $post['created_at'])->format('D d M Y,h:m:s a') }}</p>
    </div>
</div>
@endsection