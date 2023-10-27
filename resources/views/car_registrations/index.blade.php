@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>駐車許可申請</h1>
                </div>
                <div class="col-sm-6">
                    <a class="btn btn-primary float-right" href="{{ route('car_registrations.create') }}">
                        申請フォーム
                    </a>
                </div>
            </div>
        </div>
    </section>
    @if (Auth::guest())
        @include('flash::message')
        <p class="uk-text-default">第56回100kmハイクのスタート&ゴール地点 ひよどり山キャンプ場に車両で来場する際には事前登録が必要です。<br>
            ご希望の方は以下ボタンからの申請フォーム移動してください。<br>
            <a class="btn btn-primary" href="{{ route('car_registrations.create') }}">
                申請フォーム
            </a>
        </p>
        <h3>注意事項</h3>
        <ul class="uk-list uk-list-bullet">
            <li>後日実行委員会より駐車許可証をメールにてお送りします</li>
            <li>台数制限などにより、全ての方に駐車許可証を発行できかねますことをご了承下さい</li>
            <li>許可証発行手数料として車両1台につき300円の駐車料を徴収致します(東京連盟に所属の方は各地区に請求いたします)</li>
            <li class="uk-text-danger">ローバースカウトの車両での来場は認められません(運転者がRSの支援者を含む)</li>
            <li>運転中及び、駐車中に発生した事故については実行委員会では関知しないことをご了承下さい</li>
        </ul>
    @endif
    @if (!Auth::guest() && Auth::user()->is_admin)
        <div class="content px-3">

            @include('flash::message')

            <div class="clearfix"></div>

            <div class="card">
                @include('car_registrations.table')
            </div>
        </div>
    @endif
@endsection
