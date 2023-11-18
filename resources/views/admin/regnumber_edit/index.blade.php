@extends('layouts.app')

@section('content')
    <section class="content-header">
        <span class="uk-float-right">
            <a href="{{ url('/admin/registration_check') }}">加盟登録チェック</a></span>
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>登録番号修正</h1>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">
        @include('flash::message')
        <div class="clearfix"></div>
        <form method="POST" action="{{ route('regnumber_edit') }}" id="myForm">
            @csrf

            <input type="text" name="reg_number" id="reg_number" maxlength="11" required class="uk-input uk-form-large"
                placeholder="正しい登録番号を入力してEnter!">
                <input type="hidden" name="uuid" value="{{ $user->uuid }}">
        </form>
        <h3>参加者情報</h3>
        <ul>
            <li>氏名: <a href="{{ route('adminentries.show', [$user->user->id]) }}">{{ $user->user->name }}</a></li>
            <li>所属: {{ $user->prefecture }}連盟 {{ $user->district }}地区 {{ $user->dan_name }}団</li>
            <li>登録番号: <span class="uk-text-danger uk-text-bold">{{ $user->bs_id }}</span> (現在入力されているもの)</li>
        </ul>
    @endsection
