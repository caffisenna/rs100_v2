@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>申込修正</h1>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('adminlte-templates::common.errors')

        <div class="card">

            {!! Form::model($entryForm, ['route' => ['adminentries.update', $entryForm->id], 'method' => 'patch']) !!}

            <div class="card-body">
                <div class="row">
                    @include('admin.entry_forms.fields')
                </div>
            </div>

            <div class="card-footer">
                {!! Form::submit('更新', ['class' => 'btn btn-primary']) !!}
                <a href="{{ route('adminentries.index') }}" class="btn btn-default">キャンセル</a>
            </div>

            {!! Form::close() !!}

        </div>
    </div>
@endsection
