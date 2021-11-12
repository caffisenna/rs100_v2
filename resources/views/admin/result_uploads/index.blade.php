@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>画像チェック</h1>
                </div>
            </div>
            <ul class="uk-list">
                <li>スクショ内の「距離」と「グロスタイム」をチェックし、間違った結果が表示されていた編集ボタンから修正</li>
                <li>スクショの画像とスキャン結果がマッチしていればチェックボタンを押す</li>
                </ul>
        </div>
    </section>

    <div class="content px-3">

        @include('flash::message')

        <div class="clearfix"></div>

        <div class="card">
            <div class="card-body p-0">
                画像数: {{ $resultUploads->count() }}
                @include('admin.result_uploads.table')

                <div class="card-footer clearfix float-right">
                    <div class="float-right">

                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection
