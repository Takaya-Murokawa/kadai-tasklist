@extends('layouts.app')

@section('content')

<!-- ここにページ毎のコンテンツを書く -->
    <h1>タスク管理アプリケーション</h1>
    
    <!--{{-- ユーザ一覧 --}}-->
    {{--@include('tasks.users')--}}
    @if (Auth::check())
        <h2>ユーザー名:{{ Auth::user()->name }}</h2>
        @if (count($tasks) > 0)
            <table class="table table-striped">
                
                <thead>
                    <tr>
                        <th>id</th>
                        <th>ステータス</th>
                        <th>タスク</th>
                    </tr>
                </thead>
                <tbody>
                    <!--変数置き換え-->
                    @foreach ($tasks as $task)
                    <tr>
                       <!--{{-- メッセージ詳細ページへのリンク --}}-->
                        <td>{!! link_to_route('tasks.show', $task->id, ['task' => $task->id]) !!}</td>
                        <td>{{ $task->status }}</td>
                        <td>{{ $task->content }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{-- メッセージ作成ページへのリンク  下のボタン--}}
            {!! link_to_route('tasks.create', '新規タスクの追加', [], ['class' => 'btn btn-primary']) !!}
        @endif
    
    @else
        <div class="center jumbotron">
            <div class="text-center">
                <h1>ユーザー登録してください</h1>
                {{-- ユーザ登録ページへのリンク --}}
                {!! link_to_route('signup.get', 'Sign up now!', [], ['class' => 'btn btn-lg btn-primary']) !!}
            </div>
        </div>
    @endif
    
        
    
@endsection