@extends('layouts.app')

@section('content')

<!-- ここにページ毎のコンテンツを書く -->
<!--<h1>id: {{ $task_view->id }} のタスク編集ページ</h1>-->
<h1>編集ページ</h1>

    <div class="row">
        <div class="col-6">
            {!! Form::model($task_view, ['route' => ['tasks.update', $task_view->id], 'method' => 'put']) !!}

                <div class="form-group">
                    {!! Form::label('content', 'メッセージ:') !!}
                    {!! Form::text('content', null, ['class' => 'form-control']) !!}
                </div>

                {!! Form::submit('更新', ['class' => 'btn btn-primary']) !!}

            {!! Form::close() !!}
        </div>
    </div>

@endsection