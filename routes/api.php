<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/register', 'Auth\RegisterController@register')->name('register');
Route::post('/login', 'Auth\LoginController@login')->name('login');
Route::post('/logout', 'Auth\LoginController@logout')->name('logout');
Route::get('/user', fn() => Auth::user())->name('user');
// 写真投稿
Route::post('/photos', 'PhotoController@create')->name('photo.create');
// 写真詳細
Route::get('/photos/{id}', 'PhotoController@show')->name('photo.show');
// 写真一覧あああ
Route::get('/photos', 'PhotoController@index')->name('photo.index');
// コメント
Route::post('/photos/{photo}/comments', 'PhotoController@addComment')->name('photo.comment');
// いいね
Route::put('/photos/{id}/like', 'PhotoController@like')->name('photo.like');

// いいね解除
Route::delete('/photos/{id}/like', 'PhotoController@unlike');

// トークンリフレッシュ
Route::get('/reflesh-token', function (Request $request) {
  $request->session()->regenerateToken();

  return response()->json();
});

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
