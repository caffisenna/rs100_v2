@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>体温を追記</h1>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('adminlte-templates::common.errors')

        <div class="card">

            {!! Form::model($temps, ['route' => ['temps.update', $temps->id], 'method' => 'patch']) !!}

            <div class="card-body">
                <div class="row">
                    @include('temps.fields')
                </div>
            </div>

            <div class="card-footer">
                {!! Form::submit('更新する', ['class' => 'btn btn-primary']) !!}
                <a href="{{ route('temps.index') }}" class="btn btn-default">キャンセル</a>
            </div>

            {!! Form::close() !!}

        </div>
    </div>
@endsection
