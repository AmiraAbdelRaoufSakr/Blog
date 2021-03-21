<?php

namespace App\Http\Controllers;
use App\Models\Post;
use App\Models\User;
use Carbon\Carbon;

use Illuminate\Http\Request;

class PostController extends Controller
{
  public function index()
  {
      $posts = Post::all(); 
      return view('posts.index',[
          'posts' =>$posts
      ]);
  } 
  //---------------------------------------------------------
  
  public function create()
  {
    return view('posts.create',[
      'users' => User::all()
  ]);
    return view('posts.create');
  }

  public function store(Request $request)
  {
     
      $post = new Post;
      $post->title = $request->title;
      $post->description = $request->description;
      $post->user_id = $request->user_id;
      $post->save();
      return redirect()->route('posts.index');
  }
  //-------------------------------------------------------------------
  public function edit($postId)
  {
    $post = Post::find($postId);
   // $userName = User::find($post->user_id);
    
    return view('posts.edit', [
        'post' => $post,
        'user' => User::find($post->user_id)
    ]);
}

  public function update(Request $request,$postId)
  {
    $post =  Post::find($postId);
    $post->title = $request->title;
    $post->description = $request->description;
    $post->user_id = $request->user_id;
    $post->save();
      
      return redirect()->route('posts.index');
  }
  //----------------------------------------------------------

  public function show($postId)
  {
    $post = Post::find($postId);
    
    return view('posts.show', [
        'post' => $post,
        'user' => User::find($post->user_id)
    ]); 
  }
  //----------------------------------------------------------
  public function destroy($postId)
  {
    $post = Post::find($postId);
    $post->delete();
    
          
  
    return redirect()->route('posts.index');
  }
//-----------------------------------------------------------
}
