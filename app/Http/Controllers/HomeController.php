<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateRequest;
use App\Http\Requests\EditRequest;
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

  public function insert(CreateRequest $request)
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

  public function update (EditRequest $request) 
  {
    $posts = $request->all();
    $edit_title = $posts['titleID'];
    question_answer::insert(['question' => $posts['question'], 'answer' => $posts['answer'], 'title_id' => $posts['titleID'], 'user_id' => \Auth::id()]);

    return redirect()->back()->with(['edit_title' => $edit_title]);
  }

  public function delete (Request $request)
  {
    title::find($request->titleID)->delete();
    return redirect()->back();
  }

  public function questions($id)
  {
    $edit_title = title::find($id);
    $question_answers = question_answer::select('question_answers.*')
      ->where('user_id', '=', \Auth::id())
      ->whereNull('deleted_at')
      ->orderBy('updated_at', 'DESC')
      ->get();

    return view('questions', compact('question_answers', 'edit_title'));
  }
}
