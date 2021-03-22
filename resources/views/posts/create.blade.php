@extends('layouts.app')

@section('title') Create Page @endsection

@section('content')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="POST" action="{{route('posts.store')}}">
@csrf
  <div class="form-group">
    <label for="title">Title</label>
    <input type="text" name="title" class="form-control" id="title">
  </div>
  <div class="form-group">
    <label for="description">Description</label>
    <textarea class="form-control" name='description' id="description"> </textarea>
  </div>
  <div class="form-group">
    <label for="posted_by">Post Creator</label>
    <select class="form-control" name="user_id" id="post_creator">
        @foreach ($users as $user)
           <option  value="{{$user->id}}" >{{$user->name}}</option>
        @endforeach
      </select>
  </div>
  <button type="submit" class="btn btn-success">Create Post</button>
  </form>
  @endsection