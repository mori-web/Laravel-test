<?php

namespace App\Http\Controllers;


use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class OldPostController extends Controller
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

    //一覧ページの表示
    public function index() {
      //postsテーブルデータの全てを取得
      $posts = Post::all();
      return view('post.index', compact('posts'));
    }

    //個別投稿の表示
    public function show(Post $post) {
      return view('post.show', compact('post'));
    }

    //編集の表示
    public function edit(Post $post) {
      return view('post.edit', compact('post'));
    }

    //編集されたデータをアップデートする
    public function update(Request $request, Post $post) {

      $validated = $request->validate([
        'title' => 'required|max:20',
        'body' => 'required|max:400',
      ]);

      // 投稿時にユーザーのidを、user_idに追加する
      
      $validated['user_id'] = auth()->id();
      $post->update($validated);
      $request->session()->flash('message', '更新しました');

      return back();
    }

    // 削除の処理
    public function destroy(Request $request, Post $post) {
      $post->delete();
      $request->session()->flash('message', '削除しました');
      return redirect()->route('post.index');
    }

}
