@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>申込書編集</h1>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('adminlte-templates::common.errors')

        {{-- @include('flash::message') --}}

        {{-- {{ $message }} --}}

        <div class="card">

            {!! Form::model($entryForm, ['route' => ['entryForms.update', $entryForm->id], 'method' => 'patch']) !!}

            <div class="card-body">
                <div class="row">
                    @include('entry_forms.fields')
                </div>
            </div>

            <div class="card-footer">
                {!! Form::submit('更新', ['class' => 'btn btn-primary']) !!}
                <a href="{{ route('entryForms.index') }}" class="btn btn-default">キャンセル</a>
            </div>

           {!! Form::close() !!}

        </div>
    </div>
@endsection
