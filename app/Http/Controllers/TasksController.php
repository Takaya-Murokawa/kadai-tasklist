<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Task;

class TasksController extends Controller
{
    // getでmessages/にアクセスされた場合の「一覧表示処理」
    public function index()
    {
        //
        // メッセージ一覧を取得
        $tasks_controller= Task::all();

        // メッセージ一覧ビューでそれを表示
        return view('tasks.index', [  //resources/views/Task/index.blade.php
            'task_view' => $tasks_controller,
        ]);
    }

    // getでmessages/createにアクセスされた場合の「新規登録画面表示処理」
    public function create()
    {
        //
        $task_controller = new Task;

        // メッセージ作成ビューを表示
        return view('tasks.create', [
            'task_view' => $task_controller,
        ]);
    }

    // postでmessages/にアクセスされた場合の「新規登録処理」
    public function store(Request $request)
    {
        //
        // メッセージを作成
        $task_controller = new Task;
        $task_controller->content = $request->content;
        $task_controller->save();

        // トップページへリダイレクトさせる
        return redirect('/');
    }

    // getでmessages/（任意のid）にアクセスされた場合の「取得表示処理」
    public function show($id)
    {
        //
        // idの値でメッセージを検索して取得
        $task_controller = Task::findOrFail($id);

        // メッセージ詳細ビューでそれを表示
        return view('tasks.show', [
            'task_view' => $task_controller,
             ]);
    }

    // getでmessages/（任意のid）/editにアクセスされた場合の「更新画面表示処理」
    public function edit($id)
    {
        //
        // idの値でメッセージを検索して取得
        $task_controller = Task::findOrFail($id);

        // メッセージ編集ビューでそれを表示
        return view('tasks.edit', [
            'task_view' => $task_controller,
        ]);
       
    }

    // putまたはpatchでmessages/（任意のid）にアクセスされた場合の「更新処理」
    public function update(Request $request, $id)
    {
        //
        // idの値でメッセージを検索して取得
        $task_controller = Task::findOrFail($id);
        // メッセージを更新
        $task_controller->content = $request->content;
        $task_controller->save();

        // トップページへリダイレクトさせる
        return redirect('/');
    }

    // deleteでmessages/（任意のid）にアクセスされた場合の「削除処理」
    public function destroy($id)
    {
        //
        // idの値でメッセージを検索して取得
        $task_controller = Task::findOrFail($id);
        // メッセージを削除
        $task_controller->delete();

        // トップページへリダイレクトさせる
        return redirect('/');
    }
}