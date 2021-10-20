@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>結果を手入力</h1>
                </div>
                <p class="uk-text-danger">このフォームで登録された歩行データは表彰対象から除外されます</p>
            </div>
        </div>
    </section>

    <div class="content px-3">

        <div class="card">

            {!! Form::open(['route' => 'resultInputs.store']) !!}

            <div class="card-body">

                <div class="row">
                    @include('result_inputs.fields')
                </div>

            </div>

            <div class="card-footer">
                {!! Form::submit('保存する', ['class' => 'btn btn-primary']) !!}
                <a href="{{ route('resultInputs.index') }}" class="btn btn-default">キャンセル</a>
            </div>

            {!! Form::close() !!}

        </div>
    </div>
@endsection
