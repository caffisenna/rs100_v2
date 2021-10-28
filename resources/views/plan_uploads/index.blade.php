@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>歩行計画データアップロード</h1>
                </div>
                <div class="col-sm-6">
                    <a class="btn btn-primary float-right" href="{{ route('planUploads.create') }}">
                        新規にアップする
                    </a>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        <div>
            <div class="uk-card uk-card-default uk-card-body">
                <h3 class="uk-card-title">計画書のアップロード</h3>
                <p class="uk-text-warning">計画書は<a href="https://blog.rs100.info/wp-content/uploads/2021/10/hike_plan.xlsx">指定の書式(excel)</a>をダウンロードし入力し、隊長の捺印を取り付けたうえでアップロードしてください。<br>
                    PDF、ワード(docx)、エクセル(xlsx)、画像(jpg)形式でアップロードが可能です。</p>
            </div>
        </div>

        @include('flash::message')

        <div class="clearfix"></div>

        <div class="card">
            <div class="card-body p-0">
                @include('plan_uploads.table')

                <div class="card-footer clearfix float-right">
                    <div class="float-right">

                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection
