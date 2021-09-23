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

        <div class="card">
            <div class="card-body p-0">
                @include('result_uploads.table')
            </div>

        </div>
    </div>

@endsection
