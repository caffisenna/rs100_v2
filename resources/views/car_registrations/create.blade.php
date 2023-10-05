@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>車両情報登録</h1>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('adminlte-templates::common.errors')

        <div class="card">

            {!! Form::open(['route' => 'car_registrations.store']) !!}

            <div class="card-body">

                <div class="row">
                    @include('car_registrations.fields')
                </div>

            </div>

            <div class="card-footer">
                {!! Form::submit('登録', ['class' => 'btn btn-primary']) !!}
                <a href="{{ route('car_registrations.index') }}" class="btn btn-default"> キャンセル </a>
            </div>

            {!! Form::close() !!}

        </div>
    </div>
@endsection
