@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>Eラーニング受講</h1>
                    <h4>全ての設問に正解すると修了になります。</h4>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        {{-- @include('adminlte-templates::common.errors') --}}
        {{-- @include('flash::message') --}}
        <div class="card">

            {!! Form::open(['route' => 'elearnings.store']) !!}

            <div class="card-body">

                <div class="row">
                    @include('elearnings.fields')
                </div>

            </div>

            <div class="card-footer">
                {!! Form::submit('回答する', ['class' => 'btn btn-primary']) !!}
                <a href="{{ route('elearnings.index') }}" class="btn btn-default">キャンセル</a>
            </div>

            {!! Form::close() !!}

        </div>
    </div>
@endsection
