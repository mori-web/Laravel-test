<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
use App\Http\Controllers\PostController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


// /*------------------------------------------------------------
// オリジナル
// ------------------------------------------------------------*/
// #/testというURLがルートに送られてきたら、TestControllerのtestファンクションを実行する。このRoute処理を-name('test')で「test」という名前を名付ける
// // テストページへのルート
// Route::get('/test', [TestController::class, 'test'])->name('test');

// // フォームページへのアクセスルート
// Route::get('post/create', [PostController::class, 'create']);
// // Route::get('post/create', [PostController::class, 'create'])->middleware(['auth','admin']);


// // 投稿データの作成ルート
// Route::post('post', [PostController::class, 'store'])->name('post.store');

// // Route::middleware(['auth','admin'])->group(function(){
//   // Route::get('post', [PostController::class, 'index']);
//   // Route::get('post/create', [PostController::class, 'create']);
// // });

// // 一覧画面のルート
// Route::get('post', [PostController::class, 'index'])->name('post.index');

// // 個別投稿の表示
// Route::get('post/show/{post}', [PostController::class, 'show'])->name('post.show');

// //編集用のルート表示
// Route::get('post/{post}/edit', [PostController::class, 'edit'])->name('post.edit');
// //更新時のルート処理
// Route::patch('post/{post}', [PostController::class, 'update'])->name('post.update');

// //削除のルート表示
// Route::delete('post/{post}', [PostController::class, 'destroy'])->name('post.destroy');

//リソース用コントローラ
Route::resource('post', PostController::class);





