@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>お知らせ管理</h1>
                    <p class="uk-text-default">トップ画面に掲載するニュースを登録します。</p>
                </div>
                <div class="col-sm-6">
                    <a class="btn btn-primary float-right" href="{{ route('updates.create') }}">
                        新規追加
                    </a>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('flash::message')

        <div class="clearfix"></div>

        <div class="card">
            @include('updates.table')
        </div>
    </div>
@endsection
