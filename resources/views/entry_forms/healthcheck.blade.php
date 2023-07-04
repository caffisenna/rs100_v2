<html lang="ja">

<head>
    <title>健康調査票</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <style>
        @font-face {
            font-family: migmix;
            font-style: normal;
            font-weight: normal;
            src: url("{{ storage_path('fonts/migmix-2p-regular.ttf') }}") format('truetype');
        }

        body {
            font-family: migmix;
            line-height: 100%;
        }

        table td {
            border: solid 1px;
        }
    </style>
</head>

<body>
    <p style="text-align:left">
        <img src="{{ url('/images/rs100km_55th.png') }}" alt="" style="height:70px;">
    </p>
    <p style="font-size:large; text-align:center;">第56回東京連盟ローバースカウト100kmハイク<br>
        健康調査票 兼 Eラーニング修了証</p>
    <p class="">ゼッケン: {{ $entryForm->entryform->zekken }}</p>

    <table>
        <tbody>
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
        </tbody>
    </table>
    <p style="font-size:large">私は以下の項目に該当する症状が<span style="color:red">一つもありません。</span></p>
    <ol>
        <li>熱がある、熱感がある。</li>
        <li>疲労感が残っている。</li>
        <li>昨夜の睡眠が十分にとれなかった。</li>
        <li>ハイク前の食事や水分をきちんと摂れなかった。</li>
        <li>かぜ症状（微熱、頭痛、のどの痛み、咳、鼻水）がある。</li>
        <li>胸や背中の不快感や痛みがある。動悸・息切れがある。</li>
        <li>腹痛、下痢がある。吐き気がある。</li>
        <li>ハイクの計画が不十分である。</li>
    </ol>

    <p style="font-size:x-large">自署: ________________________________________</p>

    <p style="color:red">注意事項</p>
    <ul>
        <li>この健康調査票はハイク受付時に提示してスタッフからチェックを受けて下さい</li>
        <li>ハイク中は必ず携行してください。</li>
    </ul>
</body>

</html>
