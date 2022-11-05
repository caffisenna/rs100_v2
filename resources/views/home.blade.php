@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            @if (isset(Auth::user()->email_verified_at))
                @unless(Auth::user()->is_admin || Auth::user()->is_commi || Auth::user()->is_staff)
                    <div class="card" style="width:100%;">
                        <div class="card-header">
                            <h4>各種情報</h4>
                        </div>
                        <div class="card-body">
                            {{-- @if ($configs->create_application) --}}
                            <h3 class="uk-text-success">{{ Auth()->user()->name }}さん</h3>
                            <a href="{{ url('/user/entryForms') }}" class="btn btn-info btn-lg btn-block">申込情報</a>
                            {{-- @endif --}}

                            @if ($configs->elearning)
                                <a href="{{ url('/user/elearnings') }}" class="btn btn-info btn-lg btn-block">Eラーニング</a>
                            @endif

                            @if ($configs->healthcheck && isset($user->elearning->created_at))
                                <a href="{{ url('/user/healthcheck') }}" class="btn btn-info btn-lg btn-block">健康調査票</a>
                            @endif
                        </div>
                    </div>
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
                <div class="uk-card uk-card-secondary uk-card-body">
                    <h3 class="uk-card-title">注意</h3>
                    <p class="uk-text-danger">管理者としてログイン中です。<br>
                        データの削除、変更も可能なため操作にはご注意ください。<br>
                        表示量が多いためPCでの閲覧を推奨します。<br>
                        情報の取り扱いには充分ご注意ください。
                    </p>
                </div>
            @endif
        </div>
    </div>
@endsection
