<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>{{ config('app.name') }}</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>

    <!-- UIkit CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.7.3/dist/css/uikit.min.css" />

    <!-- UIkit JS -->
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.7.3/dist/js/uikit.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.7.3/dist/js/uikit-icons.min.js"></script>
</head>

<body class="uk-container">
    <p class="uk-text-success">@include('flash::message')</p>
    @if ($entryForm->id)
        @if (is_null($entryForm->sm_confirmation))
            <div class="uk-card">
                <div class="uk-card-header">
                    <h3 class="uk-card-title">団の承認</h3>
                </div>
                <div class="uk-card-body">
                    以下のスカウトが第54回RS100kmハイクに参加申込をしています。<br>参加を承認する場合は以下のボタンをクリックしてください。
                </div>
                <div class="uk-card-footer">
                    {{ Form::open(['confirm_post']) }}
                    {!! Form::hidden('confirm', $entryForm->uuid) !!}

                    <div class="card-footer">
                        {!! Form::submit('承認する', ['class' => 'uk-button uk-button-primary uk-button-large']) !!}
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        @else
            <p class="uk-text-danger">{{ $entryForm->sm_confirmation }}に参加承認済みです。</p>
        @endif
    @else
        <p class="uk-text-warning">対象のスカウトが見つかりません。正しいリンクからアクセスしてください。</p>
    @endif

    @if(isset($entryForm))
    <table class=" uk-table uk-table-striped">
        <thead>
            <tr>
                <th>項目</th>
                <th>内容</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>申込ID</td>
                <td>{{ $entryForm->id }}</td>
            </tr>
            <tr>
                <td>氏名</td>
                <td>{{ $entryForm->name }} ({{ $entryForm->furigana }})</td>
            </tr>
            <tr>
                <td>所属</td>
                <td>{{ $entryForm->district }}地区 {{ $entryForm->dan_name }}団</td>
            </tr>
            <tr>
                <td>生年月日</td>
                <td>{{ $entryForm->birth_day }}</td>
            </tr>
            <tr>
                <td>性別</td>
                <td>{{ $entryForm->gender }}</td>
            </tr>

            <!-- Zip Field -->
            <tr>
                <td>郵便番号</td>
                <td>{{ $entryForm->zip }}</td>
            </tr>

            <!-- Address Field -->
            <tr>
                <td>住所</td>
                <td>{{ $entryForm->address }}</td>
            </tr>

            <!-- Telephone Field -->
            <tr>
                <td>電話番号</td>
                <td>{{ $entryForm->telephone }}</td>
            </tr>

            <!-- Cellphone Field -->
            <tr>
                <td>ケータイ</td>
                <td>{{ $entryForm->cellphone }}</td>
            </tr>

            <!-- 50Km Exp Field -->
            <tr>
                <td>50kmハイク経験</td>
                <td>{{ $entryForm->exp_50km }}</td>
            </tr>

            <!-- Parent Name Field -->
            <tr>
                <td>保護者氏名</td>
                <td>{{ $entryForm->parent_name }}</td>
            </tr>

            <!-- Parent Name Furigana Field -->
            <tr>
                <td>保護者ふりがな</td>
                <td>{{ $entryForm->parent_name_furigana }}</td>
            </tr>

            <!-- Parent Relation Field -->
            <tr>
                <td>保護者続柄</td>
                <td>{{ $entryForm->parent_relation }}</td>
            </tr>

            <!-- Emer Phone Field -->
            <tr>
                <td>緊急連絡先</td>
                <td>{{ $entryForm->emer_phone }}</td>
            </tr>

            <!-- Sm Name Field -->
            <tr>
                <td>隊長氏名</td>
                <td>{{ $entryForm->sm_name }}</td>
            </tr>

            <!-- Sm Position Field -->
            <tr>
                <td>役務</td>
                <td>{{ $entryForm->sm_position }}</td>
            </tr>
            <tr>
                <td>団の承認</td>
                <td>{{ $entryForm->sm_confirmation }}</td>
            </tr>
        </tbody>
        @endif
    </table>
</body>

</html>
