<?php

namespace App\Http\Controllers;

use App\Models\question_answer;
use App\Models\title;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
  public function home()
  {
    // titleを取得
    $titles = title::select('titles.*')
      ->where('user_id', '=', \Auth::id())
      ->whereNull('deleted_at')
      ->orderBy('updated_at', 'DESC')
      ->get();

    return view('home', compact('titles'));
  }

  public function insert(Request $request)
  {
    $posts = $request->all();
    
    title::insert(['title' => $posts['title'], 'user_id' => \Auth::id()]);

    return redirect(route('home'));
  }

  public function create()
  {
    return view('create');
  }

  public function edit($id)
  {
    $edit_title = title::find($id);
    return view('edit', compact('edit_title'));
  }

  public function update (Request $request) 
  {
    $posts = $request->all();
    
    question_answer::insert(['question' => $posts['question'], 'answer' => $posts['answer'], 'user_id' => \Auth::id()]);

    return view('edit');
  }
}
