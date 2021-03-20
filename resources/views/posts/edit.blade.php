@extends('layouts.app')

@section('title') Edit Page @endsection

@section('content')

<form method="POST"  action="{{route('posts.update',['post' => $post['id']])}}">

@csrf
@method("PUT")
  <div class="form-group">
    <label for="title">Title</label>
    <input type="text" class="form-control" id="title" placeholder={{ $post['title'] }}>
  </div>
  <div class="form-group">
    <label for="description">Description</label>
    <textarea class="form-control" id="description">{{ $post['description'] }}</textarea>
  </div>
  <div class="form-group">
    <label for="posted_by">Post Creator</label>
    <select class="form-control" id="post_creator" placeholder={{ $post['posted_by'] }}>
          <option>Amira</option>
      </select>
  </div>
  <button type="submit" class="btn btn-primary  text-white">Update</button>
  </form>
  @endsection