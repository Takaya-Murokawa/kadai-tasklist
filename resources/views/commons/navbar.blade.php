<header class="mb-4">
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
        {{-- トップページへのリンク 　上のナビゲーションバー--}}
        <a class="navbar-brand" href="/">TaskList</a>

        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#nav-bar">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="nav-bar">
            <ul class="navbar-nav mr-auto"></ul>
            <ul class="navbar-nav">
                {{-- メッセージ作成ページへのリンク --}}
                <li class="nav-item">{!! link_to_route('tasks.create', '新規タスクの追加', [], ['class' => 'nav-link']) !!}</li>
            </ul>
        </div>
        
        
        <ul class="nav navbar-nav navbar-right">
            {{-- ユーザ登録ページへのリンク --}}
            <li>{!! link_to_route('signup.get', 'Signup', [], ['class' => 'nav-link']) !!}</li>
            {{-- ログインページへのリンク --}}
            <li><a href="#">Login</a></li>
        </ul>
        
    </nav>
</header>