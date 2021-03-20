@extends('layouts.app')

@section('title') Index Page @endsection

@section('content')
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
      <th scope="row">{{$post ['id']}}</th>
      <td>{{$post ['title']}}</td>
      <td>{{$post ['posted_by']}}</td>
      <td>{{$post ['created_at']}}</td>
      <td>
      <div class="btn-group" role="group" aria-label="Basic example">
        <button type="button" class="btn btn-info  text-white"    style="margin-bottom: 20px;">View</button>
        <button type="button" class="btn btn-primary  text-white" style="margin-bottom: 20px;">Edit</button>
        <button type="button" class="btn btn-danger  text-white"  style="margin-bottom: 20px;">Delete</button>
      </div>
    </tr>
    @endforeach
  </tbody>
</table>


@endsection