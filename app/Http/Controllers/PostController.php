<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Gate;

class PostController extends Controller
{
    #postディレクトリのcreate.blade.phpを表示するという指示
    public function create(){
      return view('post.create');
    }

    //送信されたデータをPostモデルを使用してDBに保存する
    public function store(Request $request) {
      
      Gate::authorize('test');

      $validated = $request->validate([
        'title' => 'required|max:20',
        'body' => 'required|max:400',
      ]);

      // 投稿時にユーザーのidを、user_idに追加する
      //auth()->id();はログイン中のユーザーのidのこと。
      $validated['user_id'] = auth()->id();

      $post = Post::create($validated);
      return back()->with('message', '保存しました');
    }

    public function index() {
      //postsテーブルデータの全てを取得
      $posts = Post::all();

      // $posts = Post::where('user_id',1)->whereDate('created_at','<=', '2024-12-02')->get();

      // $posts = Post::find(14);

      // compact関数は変数をviewに与えるもの
      return view('post.index', compact('posts'));
    }

    

}
