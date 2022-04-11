<?php

namespace App\Http\Controllers;

use App\Models\question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
  public function home()
  {
    // titleを取得
    $titles = question::select('questions.*')
      ->where('user_id', '=', \Auth::id())
      ->whereNull('deleted_at')
      ->orderBy('updated_at', 'DESC')
      ->get();

    return view('home', compact('titles'));
  }

  public function insert(Request $request)
  {
    $posts = $request->all();
    dd($posts);
    
    question::insert(['title' => $posts['title'], 'user_id' => \Auth::id()]);

    return redirect(route('home'));
  }

  public function create()
  {
    return view('create');
  }

  public function edit($id)
  {
    return view('edit');
  }

  public function update (Request $request) 
  {
    $posts = $request->all();
    
    question::insert(['question' => $posts['question'], 'answer' => $posts['answer'], 'user_id' => \Auth::id()]);
  }
}
