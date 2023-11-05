@extends('layouts.app')

@section('content')
    <link rel="stylesheet" type="text/css" href="{{ url('/datatables/jquery.dataTables.css') }}">
    <script type="text/javascript" charset="utf8" src="{{ url('/datatables/jquery.dataTables.js') }}"></script>
    <script src="{{ url('/datatables/dataTables.fixedHeader.min.js') }}"></script>
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>チェックイン</h1>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">
        @include('flash::message')
        <div class="clearfix"></div>
        <form method="POST" action="{{ url('/admin/checkin') }}" id="myForm">
            @csrf

            <input type="text" name="reg_number" id="reg_number" oninput="limitInput(this); checkInputLength(this);"
                maxlength="11" required class="uk-input uk-form-large" placeholder="登録証QRをスキャン、もしくはゼッケンを手入力">
        </form>

        <h3>How to use</h3>
        <ul>
            <li>登録証のQRをスキャンして<span class="uk-text-danger">「404 見つかりません」</span>が出たらこのページに戻り、ゼッケンで受付してください</li>
            <li>ゼッケン番号は半角数字で1〜3桁を入力!</li>
            <li>ゼッケン番号を入力したらEnterで確定!</li>
            <li>チェックインを取り消す場合は <a href="{{ url('/admin/checkin/done') }}">チェックイン済み一覧</a> から該当者を削除してください。</li>
        </ul>
    @endsection

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // ページが読み込まれたときにフィールドにフォーカスを設定
            var regNumberField = document.getElementById("reg_number");
            regNumberField.focus();

            // フォーカスが外れたときに自動的にフォーカスを戻す
            regNumberField.addEventListener("blur", function() {
                setTimeout(function() {
                    regNumberField.focus();
                }, 0);
            });
        });

        function limitInput(inputField) {
            // 8桁から11桁までの数字のみを許可
            inputField.value = inputField.value.replace(/\D/g, '').substring(0, 11);
        }

        function checkInputLength(inputField) {
            const value = inputField.value;
            const length = value.length;

            if (length >= 8 && length <= 11) {
                // 9桁から11桁の場合、フォームを自動送信
                inputField.form.submit();
            }
        }
    </script>
