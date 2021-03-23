<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
use App\Models\Post;
use App\Http\Resources\PostResource;
use Illuminate\Http\Request;



class PostController extends Controller
{
    public function index()
  {
      $posts = Post::all(); 
      $posts=Post::paginate(20);
      return PostResource::collection($posts);
  } 

  public function show($postId)
  {
    $post = Post::find($postId); 
    return new PostResource($post);
  }

  public function store(StorePostRequest $request)
  {
      $post = new Post;
      $post->title = $request->title;
      $post->description = $request->description;
      $post->user_id = $request->user_id;
      $post->save();
      return new PostResource($post);
  }
}
