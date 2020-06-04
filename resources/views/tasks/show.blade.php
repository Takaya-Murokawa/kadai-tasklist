@extends('layouts.app')

@section('content')

<!-- ここにページ毎のコンテンツを書く -->
<!--<h1>id = {{ $task_view->id }} の詳細ページ</h1>-->
<h1>詳細ページ</h1>

    <table class="table table-bordered">
        <tr>
            <th>id</th>
            <td>{{ $task_view->id }}</td>
        </tr>
        <tr>
            <th>ステータス</th>
            <td>{{ $task_view->status }}</td>
        </tr>
        <tr>
            <th>タスク</th>
            <td>{{ $task_view->content }}</td>
        </tr>
    </table>
    
    {{-- メッセージ編集ページへのリンク  --}}
    {{-- ['task' => $task_view->id] URIの'task'に$task_viewを代入 --}}
    {!! link_to_route('tasks.edit', 'このメッセージを編集', ['task' => $task_view->id], ['class' => 'btn btn-light']) !!}
    
    {{-- メッセージ削除フォーム --}}
    {!! Form::model($task_view, ['route' => ['tasks.destroy', $task_view->id], 'method' => 'delete']) !!}
        {!! Form::submit('削除', ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@endsection