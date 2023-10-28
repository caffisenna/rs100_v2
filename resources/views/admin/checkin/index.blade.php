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
            <h3>登録番号でチェックイン</h3>
            <p class="uk-text-warning">参加者のQRコードをスキャン</p>
            <input type="text" name="reg_number" id="reg_number" oninput="limitInput(this); checkInputLength(this);"
                maxlength="11" required class="uk-input uk-form-large">
        </form>

        <form method="POST" action="{{ url('/admin/checkin') }}" id="myForm">
            @csrf
            <h3>ゼッケンでチェックイン</h3>
            {{-- ゼッケンは手入力のためjsでauto submitはさせない --}}
            <p class="uk-text-warning">IDに書かれているゼッケンを手入力(ゼッケンを入力したらEnter!!!)</p>
            <input type="text" name="zekken" id="zekken" maxlength="3" required class="uk-input uk-form-large"
                oninput="this.value = this.value.replace(/[^0-9]/g, '');">
        </form>
    @endsection

    <script>
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
