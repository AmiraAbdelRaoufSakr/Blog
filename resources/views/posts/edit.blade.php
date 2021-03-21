@extends('layouts.app')

@section('title') Edit Page @endsection

@section('content')

<form method="POST"  action="{{route('posts.update',['post' => $post['id']])}}">

@csrf
@method("PUT")
  <div class="form-group">
    <label for="title">Title</label>
    <input type="text" name="title" class="form-control"value={{ $post['title'] }} id="title" placeholder={{ $post['title'] }}>
  </div>
  <div class="form-group">
    <label for="description">Description</label>
    <textarea class="form-control" name="description" id="description">{{ $post['description'] }}</textarea>
  </div>
  <div class="form-group">
    <label for="posted_by">Post Creator</label>
    <select class="form-control" name="user_id" id="post_creator"  placeholder={{ $post['posted_by'] }}>
    <option  value="{{ $post -> user ? $post->user->id : 'user not found' }}" selected >{{ $post -> user ? $post->user->name : 'user not found' }}</option>
       @foreach ($users as $user)
           <option  value="{{$user->id}}" >{{$user->name}}</option>
        @endforeach
      </select>
  </div>
  <button type="submit" class="btn btn-primary  text-white">Update</button>
  </form>
  @endsection