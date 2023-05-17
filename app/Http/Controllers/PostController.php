<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function create(){
      #postディレクトリのcreate.blade.phpを表示するという指示
      return view('post.create');
    }

    //送信されたデータをPostモデルを使用してDBに保存する
    public function store(Request $request) {

      $validated = $request->validate([
        'title' => 'required|max:20',
        'body' => 'required|max:400',
      ]);

      $post = Post::create($validated);

      return back()->with('message', '保存しました');
    }

}
