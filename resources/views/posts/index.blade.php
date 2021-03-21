@extends('layouts.app')

@section('title') Index Page @endsection

@section('content')
<a href="{{route('posts.create')}}" class="btn btn-success" style="margin-bottom: 20px;float:right">Create Post</a>
    <table class="table">
  <thead>
 
    <tr>
      <th scope="col">#</th>
      <th scope="col">Title</th>
      <th scope="col">Posted By</th>
      <th scope="col">Created At</th>
      <th scope="col">Action</th>
    </tr>
   
  </thead>
  <tbody>
  @foreach ($posts as $post)
    <tr>
      <th scope="row">{{$post -> id}}</th>
      <td>{{$post -> title}}</td>
      <td>{{ $post -> user ? $post->user->name : 'user not found' }}</td>
      <td>{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $post['created_at'])->format('Y-m-d') }}</td>
      <td>
      <div class="btn-group" role="group" aria-label="Basic example">
      <a href="{{ route('posts.show',['post' => $post['id']]) }}" class="btn btn-info  text-white"    style="margin-bottom: 20px;">View</a>
        <a href="{{ route('posts.edit',['post' => $post['id']]) }}" class="btn btn-primary  text-white" style="margin-bottom: 20px;">Edit</a>
        <form method="POST"  action="{{route('posts.destroy',['post' => $post['id']])}}">
        @csrf
       @method("DELETE")
       <button type="submit" class="btn btn-danger  text-white"  style="margin-bottom: 20px;" onclick="return confirm('Are you sure?')" ><i class="fa fa-trash"></i>Delete</button>
      </div>
    </tr>
    @endforeach
  </tbody>
</table>


@endsection