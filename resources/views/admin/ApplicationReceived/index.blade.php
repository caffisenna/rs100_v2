@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>申込書到着確認</h1>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">
        @include('flash::message')
        <div class="clearfix"></div>
        <p class="">他県連から事務局に申込書が届いたら以下のフォームに入力してください</p>
        <div class="card">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="uk-table uk-table-striped" id="entryForms-table">
                        <tr>
                            <th>ゼッケン</th>
                            <td>{{ $user->zekken }}</td>
                        </tr>


                        <tr>
                            <th>氏名</th>
                            <td>{{ $user->user->name }} ({{ $user->furigana }}) {{ $user->gender }}

                            </td>
                        </tr>

                        <tr>
                            <th>所属</th>
                            <td>{{ $user->prefecture }}連盟 {{ $user->district }}地区 {{ $user->dan_name }}
                                {{ $user->dan_number }}
                            </td>
                        </tr>
                    </table>
                </div>

            </div>
        </div>
        <h2>情報入力</h2>
        <p class="">申込書に記載の情報を転記してください</p>
        {!! Form::open(['route' => 'isApplicationReceived']) !!}
        {!! Form::hidden('id', $user->uuid) !!}

        <h3>団・隊の承認</h3>
        {!! Form::label('sm_name', '隊長もしくは団委員長氏名:') !!}
        {!! Form::text('sm_name', isset($user->sm_name) ? $user->sm_name : null, [
            'class' => 'form-control',
            'required',
        ]) !!}

        {!! Form::label('sm_position', '役務:') !!}
        {!! Form::select('sm_position', ['' => '', 'RS隊長' => 'RS隊長', '団委員長' => '団委員長'], $user->sm_position, [
            'class' => 'form-control custom-select',
            'required',
        ]) !!}

        {!! Form::label('sm_confirmation', '承認日:') !!}
        {!! Form::date('sm_confirmation', $user->sm_confirmation ? $user->sm_confirmation : null, [
            'class' => 'form-control',
            'required',
        ]) !!}

        <h3>県連盟の承認</h3>
        {!! Form::label('commi_ok', 'コミ承認日(県コミの承認):') !!}
        {!! Form::date('commi_ok', $user->commi_ok ? $user->commi_ok : null, ['class' => 'form-control', 'required']) !!}

        {!! Form::submit('作成', ['class' => 'btn btn-primary']) !!}
        {!! Form::close() !!}
    </div>
@endsection
