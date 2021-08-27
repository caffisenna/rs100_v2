@extends('layouts.app')
{{-- {{ dd($configs->create_application) }} --}}
@section('content')
    <div class="container">
        <div class="row">
            @if (isset(Auth::user()->email_verified_at))
                @if ($configs->create_application == 1)
                    <a href="{{ url('/user/entryForms') }}" class="btn btn-info btn-lg btn-block">申込書</a>
                @endif

                @if ($configs->elearning)
                    <a href="{{ url('/user/elearnings') }}" class="btn btn-info btn-lg btn-block">Eラーニング</a>
                @endif

                @if ($configs->healthcheck)
                    <a href="#" class="btn btn-info btn-lg btn-block">健康調査書</a>
                @endif
                <a href="#" class="btn btn-info btn-lg btn-block">競技開始</a>
                <a href="#" class="btn btn-info btn-lg btn-block">リタイア申請</a>
                <a href="#" class="btn btn-info btn-lg btn-block">設定</a>

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
