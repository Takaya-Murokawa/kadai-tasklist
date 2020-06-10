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
        $data = [];
        if (\Auth::check()) { // 認証済みの場合
            // 認証済みユーザを取得
            $user = \Auth::user();
            // ユーザの投稿の一覧を作成日時の降順で取得
            $tasks = $user->tasks()->orderBy('created_at', 'desc')->paginate(10);

            $data = [
                'user' => $user,
                'tasks' => $tasks,
            ];
        }
        
        return view('tasks.index', $data);
        
        // Welcomeビューでそれらを表示
        
        // メッセージ一覧を取得
        // $tasks_controller= Task::all();

        //メッセージ一覧ビューでそれを表示
        // return view('tasks.index', [  //resources/views/Task/index.blade.php
        //     'task_view' => $tasks,
        // ]);
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
        // バリデーション
        //required:何か必要
        //max:10  最大10文字
        $request->validate([
            'status' => 'required|max:10', 
            'content' => 'required|max:255',
        ]);
        
       
        
        // メッセージを作成
        // $task_controller = new Task;
        // $task_controller->status = $request->status;  
        // $task_controller->content = $request->content;
        // $task_controller->save();
        
        $request->user()->tasks()->create([
            'status' => $request->status,
            'content' => $request->content,
        ]);
        
        // $request->user()->tasks()->create([
        //     'content' => $request->content,
        // ]);
        
        
        

        // 前のURLへリダイレクトさせる
        return back();
        // トップページへリダイレクトさせる
        // return redirect('/');
        // return view('tasks.index', $data);
        
        
    }

    // getでmessages/（任意のid）にアクセスされた場合の「取得表示処理」
    public function show($id)
    {
        // //
        // idの値でユーザを検索して取得
       

        // ユーザ詳細ビューでそれを表示
        
        
        
        
        
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
        // バリデーション
        $request->validate([
            'status' => 'required|max:10',  
            'content' => 'required|max:255',
        ]);
        
        // idの値でメッセージを検索して取得
        $task_controller = Task::findOrFail($id);
        // メッセージを更新
        $task_controller->status = $request->status;
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