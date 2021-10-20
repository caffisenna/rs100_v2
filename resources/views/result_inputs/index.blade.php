@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>結果登録</h1>
                    <p class="uk-text-danger">このフォームで登録された歩行データは表彰対象から除外されます</p>
                </div>
                <div class="col-sm-6">
                    <a class="btn btn-primary float-right" href="{{ route('resultInputs.create') }}">
                        新規登録
                    </a>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">
        @include('flash::message')
        <div class="clearfix"></div>

        <div class="card">
            <div class="card-body p-0">
                @include('result_inputs.table')

            </div>

        </div>
    </div>

@endsection
