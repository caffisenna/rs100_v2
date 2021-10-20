@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>結果編集</h1>
                </div>
                <p class="uk-text-warning">手入力した結果を編集します</p>
            </div>
        </div>
    </section>

    <div class="content px-3">

        <div class="card">

            {!! Form::model($resultInputs, ['route' => ['resultInputs.update', $resultInputs->id], 'method' => 'patch']) !!}

            <div class="card-body">
                <div class="row">
                    @include('result_inputs.fields')
                </div>
            </div>

            <div class="card-footer">
                {!! Form::submit('更新する', ['class' => 'btn btn-primary']) !!}
                <a href="{{ route('resultInputs.index') }}" class="btn btn-default">キャンセル</a>
            </div>

            {!! Form::close() !!}

        </div>
    </div>
@endsection
