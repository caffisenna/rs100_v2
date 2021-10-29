@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            @if (isset(Auth::user()->email_verified_at))
                @unless(Auth::user()->is_admin || Auth::user()->is_commi || Auth::user()->is_staff)
                    <div class="card" style="width:100%;">
                        <div class="card-header">
                            <h4>各種申請書123</h4>
                        </div>
                        <div class="card-body">
                            @if ($configs->create_application)
                                <a href="{{ url('/user/entryForms') }}" class="btn btn-info btn-lg btn-block">申込書</a>
                            @endif

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
                            @if ($configs->temps_link)
                                <a href="{{ url('/user/temps') }}" class="btn btn-info btn-lg btn-block">体温計測</a>
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

                                    @if (isset($status->day1_retire))
                                        <p class="">1日目リタイア: {{ $status->day1_retire }}</p>
                                    @else
                                        @if (empty($status->day1_end_time))
                                            <a href="{{ url('/user/status_update?q=day1_retire') }}"
                                                class="btn btn-danger btn-lg btn-block"
                                                onclick="return confirm('1日目のハイクを棄権しますか?');">棄権(1日目を棄権する場合)</a>
                                        @endif
                                    @endif
                                    @if (empty($status->whole_retire))
                                        <a href="{{ url('/user/status_update?q=whole_retire') }}"
                                            class="btn btn-danger btn-lg btn-block"
                                            onclick="return confirm('全日程を棄権しますか?');">棄権(全日程を棄権する場合)</a>
                                    @else
                                        <p class="">全日程リタイア: {{ $status->whole_retire }}</p>
                                    @endif
                                @else
                                    <p class="">全日程リタイア: {{ $status->whole_retire }}</p>
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
                                    @if (empty($status->day2_end_time) && empty($status->day2_retire))
                                        <a href="{{ url('/user/status_update?q=day2_retire') }}"
                                            class="btn btn-danger btn-lg btn-block" onclick="return confirm('2日目のハイクを棄権しますか?');"
                                            class="btn btn-danger btn-lg btn-block">棄権(2日目を棄権する場合)</a>
                                    @endif

                                    @if (isset($status->day2_retire))
                                        <p class="">2日目リタイア: {{ $status->day2_retire }}</p>
                                    @endif
                                @else
                                    <p class="">全日程リタイア: {{ $status->whole_retire }}</p>
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
        </div>
    </div>
@endsection
