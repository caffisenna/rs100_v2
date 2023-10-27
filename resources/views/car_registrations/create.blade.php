@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>車両情報登録</h1>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('adminlte-templates::common.errors')

        <div class="card">

            {!! Form::open(['route' => 'car_registrations.store']) !!}

            <div class="card-body">
                <p class="uk-text-default">第56回100kmハイクのスタート&ゴール地点 ひよどり山キャンプ場に車両で来場する際には事前登録が必要です。ご希望の方は以下のフォームに入力してください。</p>
                <h3>注意事項</h3>
                <ul class="uk-list uk-list-bullet">
                    <li>下記フォームに入力ください。後日実行委員会より駐車許可証をメールにてお送りします</li>
                    <li>台数制限などにより、全ての方に駐車許可証を発行できかねますことをご了承下さい</li>
                    <li>許可証発行手数料として車両1台につき300円の駐車料を徴収致します(東京連盟に所属の方は各地区に請求いたします)</li>
                    <li>ローバースカウトの車両での来場は認められません(運転者がRSの支援者を含む)</li>
                    <li>運転中及び、駐車中に発生した事故については実行委員会では関知しないことをご了承下さい</li>
                    <li class="uk-text-danger">当申請にあたり、上記全ての事項に了承したこととなります。</li>
                </ul>
                <div class="row">
                    @include('car_registrations.fields')
                </div>

            </div>

            <div class="card-footer">
                {!! Form::submit('登録', ['class' => 'btn btn-primary']) !!}
                <a href="{{ route('car_registrations.index') }}" class="btn btn-default"> キャンセル </a>
            </div>

            {!! Form::close() !!}

        </div>
    </div>
@endsection
