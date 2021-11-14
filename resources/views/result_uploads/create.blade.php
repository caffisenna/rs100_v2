@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>結果をアップロード</h1>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        {{-- @include('adminlte-templates::common.errors') --}}

        <div class="card">

            {!! Form::open(['route' => 'resultUploads.store', 'files' => true]) !!}

            <div class="card-body">
                <p class="uk-text-warning">[アップロード]をタップした後は連打をせず、少し待って下さい。</p>

                <div class="row">
                    @include('result_uploads.fields')
                </div>

            </div>

            <div class="card-footer">
                {!! Form::submit('アップロード', ['class' => 'btn btn-primary']) !!}
                <a href="{{ route('resultUploads.index') }}" class="btn btn-default">キャンセル</a>
            </div>

            {!! Form::close() !!}

        </div>
    </div>
@endsection
