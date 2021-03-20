<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
  public function index()
  {
      $posts = [
        ['id' => 1, 'title' => 'learn php', 'posted_by' => 'Amira', 'created_at' => "2021-03-20"],
        ['id' => 2, 'title' => 'Laravel', 'posted_by' => 'Sakr', 'created_at' => '2021-04-15'],
        ['id' => 3, 'title' => 'Nodejs', 'posted_by' => 'Omar', 'created_at' => '2021-06-01'],
      ];
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
}
