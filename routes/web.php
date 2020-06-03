<?php

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

// Route::get('/', function () {
//     return view('welcome');
// });
// デフォルトのコメント部分は省略

Route::get('/', 'TasksController@index');

Route::resource('tasks', 'TasksController');


// Route::get('/', function () {
//     return view('welcome');
// });

// // CRUD
// // メッセージの個別詳細ページ表示
// Route::get('tasks/{id}', 'TasksController@show');
// // メッセージの新規登録を処理（新規登録画面を表示するためのものではありません）
// Route::post('tasks', 'TasksController@store');
// // メッセージの更新処理（編集画面を表示するためのものではありません）
// Route::put('tasks/{id}', 'TasksController@update');
// // メッセージを削除
// Route::delete('tasks/{id}', 'TasksController@destroy');


// // index: showの補助ページ
// Route::get('Task', 'TasksController@index')->name('Task.index');
// // create: 新規作成用のフォームページ
// Route::get('Task/create', 'TasksController@create')->name('Task.create');
// // edit: 更新用のフォームページ
// Route::get('Task/{id}/edit', 'TasksController@edit')->name('Task.edit');


// Route::resource('tasks', 'TasksController');
// // 複写機能（ボタン）
// Route::get('tasks/{id}/copy', 'TasksController@copy');