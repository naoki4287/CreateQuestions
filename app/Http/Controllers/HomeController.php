<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateRequest;
use App\Http\Requests\MakeRequest;
use App\Http\Requests\UpdateRequest;
use App\Models\question_answer;
use App\Models\title;
use Illuminate\Http\Request;

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
    unset($posts['_token']);
    title::insert(['title' => $posts['title'], 'user_id' => \Auth::id()]);

    return redirect(route('home'));
  }

  public function create()
  {
    return view('create');
  }

  public function add($id)
  {
    $add_title = title::find($id);
    return view('add', compact('add_title'));
  }

  public function make(MakeRequest $request)
  {
    $posts = $request->all();
    unset($posts['_token']);
    $add_title = $posts['titleID'];
    question_answer::insert(['question' => $posts['question'], 'answer' => $posts['answer'], 'title_id' => $posts['titleID'], 'user_id' => \Auth::id()]);

    return redirect()->back()->with(['add_title' => $add_title]);
  }

  public function questionlists($id)
  {
    $title = title::find($id);
    $question_answers = question_answer::select('question_answers.*')
      ->where('user_id', '=', \Auth::id())
      ->whereNull('deleted_at')
      ->orderBy('updated_at', 'DESC')
      ->get();
    return view('questionlists', compact('title', 'question_answers'));
  }

  public function edit($id)
  {
    $question_answer = question_answer::find($id);
    return view('edit', compact('question_answer'));
  }

  public function update(UpdateRequest $request)
  {
    $QAID = question_answer::find($request->QAID);
    $QAID->fill($request->all())->save();
    return redirect()->back()->with(['QAID', $QAID]);
    // return redirect()->route('questionlists')->with(['']);
  }

  public function delete(Request $request)
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

    return view('questions', compact('question_answers'));
  }
}
