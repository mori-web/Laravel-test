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


/*------------------------------------------------------------
オリジナル
------------------------------------------------------------*/
#/testというURLがルートに送られてきたら、TestControllerのtestファンクションを実行する。このRoute処理を-name('test')で「test」という名前を名付ける
Route::get('/test', [TestController::class, 'test'])->name('test');

#/post/createというURLがルートに送られてきたら、PostControllerのcreateファンクションを実行する。このRoute処理を-name('test')で「test」という名前を名付ける
Route::get('post/create', [PostController::class, 'create']);

Route::post('post', [PostController::class, 'store'])->name('post.store');
