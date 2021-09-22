@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>歩行データアップロード</h1>
                </div>
                <div class="col-sm-6">
                    @if ($resultUploads->count() < 5)
                        <a class="btn btn-primary float-right" href="{{ route('resultUploads.create') }}">
                            新規にアップする
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

        <div class="card">
            <div class="card-body p-0">
                @include('result_uploads.table')

                <div class="card-footer clearfix float-right">
                    <div class="float-right">

                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection
