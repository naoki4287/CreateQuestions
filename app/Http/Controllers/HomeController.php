<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
  public function index()
  {
    $data = [
      "msg" => "作成したページはありません。" . "\n" . "右下の＋ボタンを押して問題を作成してください。"
    ];
    return view('index', $data);
  }

  public function post(Request $request)
  {
    if (!isset($request)) {
      $posts = $request->all();
      $title = $request->validate(['title' => 'required']);
  
    }
    $questions = DB::insert('insert into questions (title) values (? b)');
  
      $data = [
        'title' => $title
      ];


    return view('index', $data);
  }

  public function create () 
  {
    return view('create');
  }

  public function edit(Request $request)
  {
    return view('edit');
  }
}
