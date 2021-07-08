<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
  public function index()
  {
    //ログインユーザーを取得する
    $user = Auth::user();
    //ログインユーザーに紐づくフォルダを1つ取得する
    $folder = $user->folders()->first();
    //まだ1つもフォルダを作っていなければホームページへ
    if(is_null($folder)) {
      return view('home');
    }
    //フォルダがあればそのフォルダのタスク一覧にリダイレクト
    return redirect()->route('tasks.index', [
      'id' => $folder->id,
    ]);
    
  }
}
