@extends('layouts.app')
{{-- {{ dd($configs->create_application) }} --}}
@section('content')
    <div class="container">
        <div class="row">
            @if (isset(Auth::user()->email_verified_at))
                @unless(Auth::user()->is_admin || Auth::user()->is_commi)
                    <div class="card" style="width:100%;">
                        <div class="card-header">
                            <h5>各種申請書</h5>
                        </div>
                        <div class="card-body">
                            @if ($configs->create_application)
                                <a href="{{ url('/user/entryForms') }}" class="btn btn-info btn-lg btn-block">申込書</a>
                            @endif

                            @if ($configs->elearning)
                                <a href="{{ url('/user/elearnings') }}" class="btn btn-info btn-lg btn-block">Eラーニング</a>
                            @endif

                            @if ($configs->healthcheck)
                                <a href="#" class="btn btn-info btn-lg btn-block">健康調査書</a>
                            @endif

                            @if ($configs->user_upload)
                                <a href="{{ url('/user/resultUploads') }}" class="btn btn-info btn-lg btn-block">結果アップロード</a>
                            @endif
                        </div>
                    </div>

                    {{-- <div class="card" style="width:100%;">
                        <div class="card-header">
                            <h5>開始と終了</h5>
                        </div>
                        <div class="card-body">
                            <a href="#" class="btn btn-info btn-lg btn-block">ハイク開始</a>
                            <a href="#" class="btn btn-info btn-lg btn-block">ハイク終了</a>
                            <a href="#" class="btn btn-info btn-lg btn-block">リタイア申請</a>
                        </div>
                    </div> --}}
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
