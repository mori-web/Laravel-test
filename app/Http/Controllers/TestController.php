<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class TestController extends Controller
{
    //どのファイルを表示するか指定
    public function test() {
      $users = User::all();
      return view('test', compact('users'));
      #view('test') = testのviewを表示する
      #$users = User::all();は、usersテーブルに入っているレコードをすべて取得して、$users変数に格納する
      #compactは、testのViewにusersという変数を渡すという意味。
    }
}
