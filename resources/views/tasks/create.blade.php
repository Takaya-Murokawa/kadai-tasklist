@extends('layouts.app')

@section('content')

<!-- ここにページ毎のコンテンツを書く -->
    <h1>新規作成ページ</h1>

    <div class="row">
        <div class="col-6">
            <!--フォームの追加-->
            {!! Form::model($task_view, ['route' => 'tasks.store']) !!}
            
                <div class="form-group">
                    {!! Form::label('status', 'ステータス:') !!}
                    {!! Form::text('status', null, ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('content', 'メッセージ:') !!}
                    {!! Form::text('content', null, ['class' => 'form-control']) !!}
                </div>

                {!! Form::submit('投稿', ['class' => 'btn btn-primary']) !!}

            {!! Form::close() !!}
        </div>
    </div>

@endsection