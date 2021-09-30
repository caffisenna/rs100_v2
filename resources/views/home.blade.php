@extends('layouts.app')
{{-- {{ dd($configs->create_application) }} --}}
@section('content')
    <div class="container">
        <div class="row">
            @if (isset(Auth::user()->email_verified_at))
                @unless(Auth::user()->is_admin || Auth::user()->is_commi)
                    <div class="card" style="width:100%;">
                        <div class="card-header">
                            <h4>各種申請書</h4>
                        </div>
                        <div class="card-body">
                            @if ($configs->create_application)
                                <a href="{{ url('/user/entryForms') }}" class="btn btn-info btn-lg btn-block">申込書</a>
                            @endif

                            @if ($configs->elearning)
                                <a href="{{ url('/user/elearnings') }}" class="btn btn-info btn-lg btn-block">Eラーニング</a>
                            @endif

                            @if ($configs->plan_upload)
                                <a href="{{ url('/user/planUploads') }}" class="btn btn-info btn-lg btn-block">計画書アップロード</a>
                            @endif

                            @if ($configs->result_upload)
                                <a href="{{ url('/user/resultUploads') }}" class="btn btn-info btn-lg btn-block">結果アップロード</a>
                            @endif
                        </div>
                    </div>
                    @if ($configs->status_day1)
                        <div class="card" style="">
                            <div class="card-header">
                                <h4>ステータス報告(1日目)</h4>
                            </div>
                            <div class="card-body">
                                <a href="#" class="btn btn-warning btn-lg btn-block">ハイク開始(定刻〜10:00までにスタートする場合)</a>
                                <a href="#" class="btn btn-warning btn-lg btn-block">ハイク終了(1日目のハイクを終了する場合)</a>
                                <a href="#" class="btn btn-danger btn-lg btn-block">棄権(途中リタイア / 1日目を棄権する場合)</a>
                                <a href="#" class="btn btn-danger btn-lg btn-block">棄権(全日程を棄権する場合)</a>
                            </div>
                        </div>
                    @endif
                    @if ($configs->status_day2)
                        <div class="card" style="">
                            <div class="card-header">
                                <h4>ステータス報告(2日目)</h4>
                            </div>
                            <div class="card-body">
                                <a href="#" class="btn btn-warning btn-lg btn-block">ハイク開始(定刻〜10:00までにスタートする場合)</a>
                                <a href="#" class="btn btn-warning btn-lg btn-block">ハイク終了(2日目のハイクを終了する場合)</a>
                                <a href="#" class="btn btn-danger btn-lg btn-block">棄権(途中リタイア / 2日目を棄権する場合)</a>
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
