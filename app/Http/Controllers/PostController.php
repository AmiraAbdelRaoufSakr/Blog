<?php

namespace App\Http\Controllers;
use App\Models\Post;

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
  
  public function create()
  {
    return view('posts.create');
  }

  public function store()
  {
      
      return redirect()->route('posts.index');
  }
  public function edit()
  {
    $post = ['id' => 1, 'title' => 'learn php', 'description' => 'In this post we are going to learn php', 'posted_by' => 'Amira', 'created_at' => '2021-03-20'];

    return view('posts.edit', [
        'post' => $post,
    ]);
}

  public function update()
  {
      
      return redirect()->route('posts.index');
  }

  public function show()
  {
    $post = ['id' => 1, 'title' => 'learn php', 'description' => 'In this post we are going to learn php', 'posted_by' => 'Amira','email'=>'amira@gmail.com', 'created_at' => '2021-03-20'];
    
    return view('posts.show', [
        'post' => $post,
    ]); 
  }
}
