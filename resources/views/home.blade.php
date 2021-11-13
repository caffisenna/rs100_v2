@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            @if (isset(Auth::user()->email_verified_at))
                @unless(Auth::user()->is_admin || Auth::user()->is_commi || Auth::user()->is_staff)
                    <div class="card" style="width:100%;">
                        <div class="card-header">
                            <h4>各種申請書</h4>
                        </div>
                        <div class="card-body">
                            <p class="uk-text-danger">重要!<br>
                                体温を計測し、結果を入力してから歩行を開始して下さい。<a href="{{ url('/user/temps') }}">[体温を入力する]</a><br>
                                歩行の開始と終了はこのページの下部からボタンを押してください。
                            </p>
                            {{-- @if ($configs->create_application) --}}
                            <h3 class="uk-text-success">{{ Auth()->user()->name }}さんの参加ID: {{ Auth()->id() }}</h3>
                            <a href="{{ url('/user/entryForms') }}" class="btn btn-info btn-lg btn-block">申込書</a>
                            {{-- @endif --}}

                            @if ($configs->elearning)
                                <a href="{{ url('/user/elearnings') }}" class="btn btn-info btn-lg btn-block">Eラーニング</a>
                            @endif

                            @if ($configs->healthcheck)
                                <a href="{{ url('/user/planUploads') }}" class="btn btn-info btn-lg btn-block">計画書アップロード</a>
                            @endif

                            @if ($configs->user_upload)
                                <a href="{{ url('/user/resultUploads') }}" class="btn btn-info btn-lg btn-block">結果アップロード</a>
                                <a href="{{ url('/user/resultInputs') }}" class="btn btn-info btn-lg btn-block">結果手入力</a>
                            @endif
                            {{-- @if ($configs->temps_link) --}}
                            @if($configs->temp_ok = 'true')
                                <a href="{{ url('/user/temps') }}" class="btn btn-info btn-lg btn-block">体温計測</a>
                            @endif
                            @if ($configs->show_status_link)
                                <a href="/public" class="btn btn-info btn-lg btn-block">ステータス一覧</a>
                            @endif
                        </div>
                    </div>
                    @if ($configs->status_day1)
                        <div class="card" style="">
                            <div class="card-header">
                                <h4>ステータス報告(1日目)</h4>
                            </div>
                            <div class="card-body">
                                @if (empty($status->whole_retire))
                                    @if (isset($status->day1_start_time))
                                        <p class="">歩行開始: {{ $status->day1_start_time }}</p>
                                    @else
                                        @if (empty($status->day1_retire))
                                            <a href="{{ url('/user/status_update?q=day1_start') }}"
                                                class="btn btn-warning btn-lg btn-block"
                                                onclick="return confirm('1日目のハイクを開始しますか?');">ハイク開始(1日目のハイクを開始する場合)</a>
                                        @endif
                                    @endif

                                    @if (isset($status->day1_end_time))
                                        <p class="">歩行終了: {{ $status->day1_end_time }}</p>
                                    @else
                                        @if (empty($status->day1_retire))
                                            <a href="{{ url('/user/status_update?q=day1_stop') }}"
                                                class="btn btn-warning btn-lg btn-block"
                                                onclick="return confirm('1日目のハイクを終了しますか?');">ハイク終了(1日目のハイクを終了する場合)</a>
                                        @endif
                                    @endif
                                @endif
                            </div>
                        </div>
                    @endif
                    @if ($configs->status_day2)
                        <div class="card" style="">
                            <div class="card-header">
                                <h4>ステータス報告(2日目)</h4>
                            </div>
                            <div class="card-body">
                                @if (empty($status->whole_retire))
                                    @if (isset($status->day2_start_time))
                                        <p class="">歩行開始: {{ $status->day2_start_time }}</p>
                                    @else
                                        @if (empty($status->day2_retire))
                                            <a href="{{ url('/user/status_update?q=day2_start') }}"
                                                class="btn btn-warning btn-lg btn-block"
                                                onclick="return confirm('2日目のハイクを開始しますか?');"
                                                class="btn btn-warning btn-lg btn-block">ハイク開始(2日目のハイクを開始する場合)</a>
                                        @endif
                                    @endif

                                    @if (isset($status->day2_end_time))
                                        <p class="">歩行終了: {{ $status->day2_end_time }}</p>
                                    @else
                                        @if (empty($status->day2_retire))
                                            <a href="{{ url('/user/status_update?q=day2_stop') }}"
                                                class="btn btn-warning btn-lg btn-block"
                                                onclick="return confirm('2日目のハイクを終了しますか?');"
                                                class="btn btn-warning btn-lg btn-block">ハイク終了(2日目のハイクを終了する場合)</a>
                                        @endif
                                    @endif
                                @endif
                            </div>
                        </div>
                    @endif
                    @if ($configs->status_day1 || $configs->status_day2)
                        <div class="card" style="">
                            <div class="card-header">
                            </div>
                            <div class="card-body">
                                @if (empty($status->whole_retire))
                                    <a href="{{ url('/user/status_update?q=whole_retire') }}"
                                        class="btn btn-danger btn-lg btn-block"
                                        onclick="return confirm('全日程を棄権しますか?');">棄権・リタイア(ハイク全体でこれ以上歩かない場合)</a>
                                @else
                                    <p class="uk-text-danger">リタイア日時: {{ $status->whole_retire }}</p>
                                @endif
                            </div>
                        </div>
                    @endif
                @endunless

            @else
                <div class="card">
                    <h5 class="card-header text-danger">メール認証が完了していません</h5>
                    <div class="card-body">
                        <h5 class="card-title"></h5>
                        <p class="card-text">{{ Auth::user()->email }}宛にメールを送信しています。<br>
                            メールに記載しているリンクから認証を完了させてください。</p>
                        <form action="{{ url('/') }}/email/verification-notification" method="post">
                            @csrf
                            <button type="submit" class="btn btn-primary">認証リンクを再送する</button>
                        </form>
                        @if (session('message'))
                            <div class="text-success">
                                {{ session('message') }}
                            </div>
                        @endif
                    </div>
                </div>
            @endif

            {{-- 管理者のみ表示 --}}
            @if (Auth::user()->is_admin)
                <div class="uk-card uk-card-secondary uk-card-body uk-width-1-2@m">
                    <h3 class="uk-card-title">注意</h3>
                    <p class="uk-text-danger">管理者としてログイン中です。<br>
                        データの削除、変更も可能なため操作にはご注意ください。<br>
                        表示量が多いためPCでの閲覧を推奨します。<br>
                        情報の取り扱いには充分ご注意ください。
                    </p>
                </div>

                <div class="uk-card uk-card-default uk-card-body uk-width-1-2@m">
                    <h3 class="uk-card-title">メニュー</h3>
                    <ul class="uk-list">
                        <li><a href="admin/reach50100" class="uk-button uk-button-primary">ランキングボード</a></li>
                        <li><a href="/public" class="uk-button uk-button-primary">歩行状況(一般公開用)</a></li>
                        <li><a href="/status" class="uk-button uk-button-primary">歩行状況(詳細)</a></li>
                    </ul>
                    その他のメニューは左上の<span uk-icon="menu"></span>よりアクセスしてください。
                </div>
            @endif
        </div>
    </div>
@endsection
