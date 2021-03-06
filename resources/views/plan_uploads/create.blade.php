@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>結果をアップロード</h1>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">
        <div>
            <div class="uk-card uk-card-default uk-card-body">
                <h3 class="uk-card-title">計画書のアップロード</h3>
                <p class="uk-text-warning">計画書はPDF、ワード(docx)、エクセル(xlsx)、画像(jpg)形式でアップロードしてください。</p>
            </div>
        </div>

        <div class="card">

            {!! Form::open(['route' => 'planUploads.store', 'files' => true]) !!}

            <div class="card-body">

                <div class="row">
                    @include('plan_uploads.fields')
                </div>

            </div>

            <div class="card-footer">
                {!! Form::submit('アップロード', ['class' => 'btn btn-primary']) !!}
                <a href="{{ route('planUploads.index') }}" class="btn btn-default">キャンセル</a>
            </div>

            {!! Form::close() !!}

        </div>
    </div>
@endsection
