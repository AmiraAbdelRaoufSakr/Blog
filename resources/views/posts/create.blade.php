@extends('layouts.app')

@section('title') Create Page @endsection

@section('content')

<form method="POST" action="{{route('posts.store')}}">
@csrf
  <div class="form-group">
    <label for="title">Title</label>
    <input type="text" class="form-control" id="title">
  </div>
  <div class="form-group">
    <label for="description">Description</label>
    <textarea class="form-control" id="description"> </textarea>
  </div>
  <div class="form-group">
    <label for="posted_by">Post Creator</label>
    <select class="form-control" id="post_creator">
          <option>Amira</option>
      </select>
  </div>
  <button type="submit" class="btn btn-success">Create Post</button>
  </form>
  @endsection