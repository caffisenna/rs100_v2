@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>歩行データアップロード</h1>
                </div>
                <div class="col-sm-6">
                    {{-- アップロード上限を10枚に --}}
                    @if ($resultUploads->count() < 10)
                        <a class="btn btn-primary float-right" href="{{ route('resultUploads.create') }}">
                            アップロードする
                        </a>
                    @else
                        <p class="uk-text-danger">アップロード上限数を超えました</p>
                    @endif
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('flash::message')

        <div class="clearfix"></div>
        <p class="uk-text-success">あと{{ 10 - $resultUploads->count() }}枚アップロード可能</p>
        <ul class="uk-list">
            <li>合計タイム: {{ $resultUploads->hms }}</li>
            <li>総距離: {{ $resultUploads->distance_sum }}<span class="uk-text-small">km</span></li>
        </ul>
        <ul class="uk-list">
            <li class="uk-text-danger">これからアップする画像は全て11/14分として扱われます。(11/13分の画像はアップしないでください)</li>
            <li class="uk-text-warning">上記の集計値は速報値です。実行委員会でチェック後に確定します。</li>
            <li class="uk-text-warning">大会の公式記録が確定するまではTATTAアプリでの歩行記録は削除しないようにしてください。</li>
            <li class="uk-text-warning">実行委員会で歩行記録を確認した画像は削除できません。</li>
        </ul>

        <div class="card">
            <div class="card-body p-0">
                @include('result_uploads.table')
            </div>

        </div>
    </div>

@endsection
