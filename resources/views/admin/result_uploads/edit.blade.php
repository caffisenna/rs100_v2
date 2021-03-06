@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>Edit Result Upload</h1>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('adminlte-templates::common.errors')

        <div class="card">

            {!! Form::model($resultUpload, ['route' => ['adminresultUploads.update', $resultUpload->id], 'method' => 'patch', 'files' => true]) !!}

            <div class="card-body">
                <div class="row">
                    @include('admin.result_uploads.fields')
                </div>
            </div>
            <img src="{{ url('/') . '/images/user_uploads/' . $resultUpload->image_path }}" width="250px" uk-img>

            <div class="card-footer">
                {!! Form::submit('更新', ['class' => 'btn btn-primary']) !!}
                <a href="{{ route('adminresultUploads.index') }}" class="btn btn-default">キャンセル</a>
            </div>

           {!! Form::close() !!}

        </div>
    </div>
@endsection
