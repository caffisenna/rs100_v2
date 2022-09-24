{{-- {{ dd($entryForm) }} --}}
<html lang="ja">

<head>
    <title>pdf output test</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" type="text/css" href="{{ url('css/uikit.min.css') }}" media="all">
    <style>
        @font-face {
            font-family: migmix;
            font-style: normal;
            font-weight: normal;
            src: url("{{ storage_path('fonts/migmix-2p-regular.ttf') }}") format('truetype');
            /* src: url("{{ storage_path('fonts/ipag.ttf') }}") format('truetype'); */
        }

        /* @font-face {
            font-family: migmix;
            font-style: bold;
            font-weight: bold;
            src: url("{{ storage_path('fonts/migmix-2p-bold.ttf') }}") format('truetype');
        } */

        body {
            font-family: migmix;
            line-height: 60%;
        }

        /* .main_image {
            width: 100%;
            text-align: center;
            margin: 10px 0;
        }

        .main_image img {
            width: 90%;
        } */
    </style>
</head>

<body>
    <p class="uk-text-large uk-text-center">第55回東京連盟ローバースカウト100kmハイク参加申込書</p>
    <p class="uk-text-right uk-text-small">データ入力日時:{{ $entryForm->entryform->updated_at }}<br>
        申込書番号:{{ $entryForm->entryform->id }}</p>

    <table class="uk-table uk-table-striped uk-table-small uk-text-small">
        <tbody class="uk-text-small">
            <tr>
                <td>基本情報</td>
                <td>{{ $entryForm->name }}({{ $entryForm->entryform->furigana }})
                    【性別:】{{ $entryForm->entryform->gender }}</td>
            </tr>
            <tr>
                <td>所属</td>
                <td>{{ $entryForm->entryform->prefecture }}連盟 {{ $entryForm->entryform->district }}地区
                    {{ $entryForm->entryform->dan_name }}団 【登録番号:】 {{ $entryForm->entryform->bs_id }}
                </td>
            </tr>
            <tr>
                <td>生年月日</td>
                <td>{{ $entryForm->entryForm->birth_day->format('Y年m月d日') }}
                    ({{ \Carbon\Carbon::parse($entryForm->entryform->birth_day)->age }}才)</td>
            </tr>
            <tr>
                <td>住所</td>
                <td>〒{{ $entryForm->entryform->zip }} {{ $entryForm->entryform->address }}</td>
            </tr>
            <tr>
                <td>本人連絡先</td>
                <td>【自宅:】 {{ $entryForm->entryform->telephone }} 【ケータイ:】 {{ $entryForm->entryform->cellphone }}<br>
                    【email:】 {{ $entryForm->email }}
                </td>
            </tr>
            <tr>
                <td>保護者</td>
                <td>{{ $entryForm->entryform->parent_name }}
                    ({{ $entryForm->entryform->parent_name_furigana }})
                    【続柄:】{{ $entryForm->entryform->parent_relation }}<br>
                    【緊急連絡先:】 {{ $entryForm->entryform->emer_phone }}
                </td>
            </tr>
            <tr>
                <td>隊長・団委員長</td>
                <td>{{ $entryForm->entryform->sm_name }} ({{ $entryForm->entryform->sm_position }})【隊・団の承認:】
                    {{ $entryForm->entryform->sm_confirmation }}</td>
            </tr>
            <tr>
                <td>長距離ハイクの経験</td>
                <td>{{ $entryForm->entryform->exp_50km }}</td>
            </tr>
            @if ($entryForm->entryform->gender == '男')
                <tr>
                    <td>バディの可否(男性のみ)</td>
                    <td>{{ $entryForm->entryform->buddy_ok }}</td>
                </tr>
            @else
                <tr>
                    <td>バディの紹介(女性のみ)</td>
                    <td>{{ $entryForm->entryform->buddy_match }}</td>
                </tr>
            @endif
            <tr>
                <td>バディのタイプ</td>
                <td>{{ $entryForm->entryform->buddy_type }}</td>
            </tr>
            <tr>
                <td>バディ情報</td>
                <td>
                    @if ($entryForm->entryform->buddy1_name)
                        {{ $entryForm->entryform->buddy1_name }} 【所属団:】 {{ $entryForm->entryform->buddy1_dan }}
                    @endif
                    @if ($entryForm->entryform->buddy2_name)
                        <br>{{ $entryForm->entryform->buddy2_name }} 【所属団:】 {{ $entryForm->entryform->buddy2_dan }}
                    @endif
                </td>
            </tr>
            <tr>
                <td>県連盟の承認</td>
                <td>承認日:<br>承認者:</td>
            </tr>

        </tbody>
    </table>
</body>

</html>
