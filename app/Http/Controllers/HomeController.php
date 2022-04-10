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


    // $data = [
    //   "msg" => "作成したページはありません。" . "\n" . "右下の＋ボタンを押して問題を作成してください。"
    // ];

    // titleを取得
    $titles = question::select('questions.*')
      ->where('user_id', '=', \Auth::id())
      ->whereNull('deleted_at')
      ->orderBy('updated_at', 'DESC')
      ->get();

    return view('home', compact('titles'));
  }

  public function post(Request $request)
  {
    // if (isset($request)) {
    //   $request->validate(['title' => 'required']);
    // }
    $posts = $request->all();

    question::insert(['title' => $posts['title'], 'user_id' => \Auth::id()]);

    return redirect(route('home'));
  }

  public function create()
  {
    return view('create');
  }

  public function edit(Request $request)
  {
    return view('edit');
  }
}
