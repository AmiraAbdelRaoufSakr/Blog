<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Laravel\Socialite\Facades\Socialite;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
  
});
Route::group(['middleware' => ['auth']],function(){
Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
Route::post('/posts',[PostController::class, 'store'])->name('posts.store');
Route::get('/posts/{post}/edit',[PostController::class, 'edit'])->name('posts.edit');
Route::put('/posts/{post}',[PostController::class, 'update'])->name('posts.update');
Route::get('/posts/{post}',[PostController::class, 'show'])->name('posts.show');
Route::delete('/posts/{post}',[PostController::class, 'destroy'])->name('posts.destroy');
});
Auth::routes();
Route::get('/auth/redirect',[UserController::class, 'redirectToProvider']);
Route::get('/auth/callback',[UserController::class, 'handleProviderCallback']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

/*Route::get('/auth/redirect', function () {
    return Socialite::driver('github')->redirect();
});

Route::get('/auth/callback', function () {
    $user = Socialite::driver('github')->user();
    dd($user);
    // $user->token
});*/
Route::get('/auth/google/redirect', function () {
    return Socialite::driver('google')->redirect();

});

Route::get('/auth/google/callback', function () {
    $user = Socialite::driver('google')->user();
    dd($user);
    // $user->token
});