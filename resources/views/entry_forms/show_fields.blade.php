<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.17.1/dist/css/uikit.min.css" />

<table class="uk-table uk-table-striped uk-table-hover">
    <thead>
        <tr>
            <th>項目</th>
            <th>内容</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>氏名</td>
            <td>{{ $entryForm->user->name }}({{ $entryForm->furigana }})</td>
        </tr>
        <tr>
            <td>email</td>
            <td>{{ $entryForm->user->email }}</td>
        </tr>
        <tr>
            <td>所属</td>
            <td>{{ $entryForm->prefecture }}連盟 {{ $entryForm->district }}地区 {{ $entryForm->dan_name }}団</td>
        </tr>
        <tr>
            <td>登録番号</td>
            <td>{{ $entryForm->bs_id }}</td>
        </tr>
        <tr>
            <td>性別</td>
            <td>{{ $entryForm->gender }}</td>
        </tr>
        <tr>
            <td>生年月日</td>
            <td>{{ $entryForm->birth_day->format('Y年m月d日') }} ({{ \Carbon\Carbon::parse($entryForm->birth_day)->age }}才)</td>
        </tr>
        <tr>
            <td>住所</td>
            <td>〒{{ $entryForm->zip }}<br>{{ $entryForm->address }}</td>
        </tr>
        <tr>
            <td>電話</td>
            <td>自宅: {{ $entryForm->telephone }}<br>ケータイ: {{ $entryForm->cellphone }}</td>
        </tr>
        <tr>
            <td>長距離ハイクの経験</td>
            <td>{{ $entryForm->exp_50km }}</td>
        </tr>
        <tr>
            <td>代表スカウト</td>
            <td>{{ $entryForm->captain }}</td>
        </tr>
        <tr>
            <td>保護者</td>
            <td>{{ $entryForm->parent_name }} ({{ $entryForm->parent_name_furigana }})<br>続柄:{{ $entryForm->parent_relation }}</td>
        </tr>
        <tr>
            <td>保護者</td>
            <td>緊急連絡先: {{ $entryForm->emer_phone }}</td>
        </tr>
        <tr>
            <td>隊長・団委員長</td>
            <td>{{ $entryForm->sm_name }} ({{ $entryForm->sm_position }})</td>
        </tr>
        <tr>
            <td>隊・団の承認</td>
            <td>{{ $entryForm->sm_confirmation }}</td>
        </tr>
        <tr>
            <td>バディの可否(男性のみ)</td>
            <td>{{ $entryForm->buddy_ok }}</td>
        </tr>
        <tr>
            <td>バディの紹介(女性のみ)</td>
            <td>{{ $entryForm->buddy_match }}</td>
        </tr>
        <tr>
            <td>バディのタイプ</td>
            <td>{{ $entryForm->buddy_type }}</td>
        </tr>
        <tr>
            <td>バディ(1)</td>
            <td>@if($entryForm->buddy1_name){{ $entryForm->buddy1_name }}<br>
                所属団: {{ $entryForm->buddy1_dan }}@endif</td>
        </tr>
        <tr>
            <td>バディ(2)</td>
            <td>@if($entryForm->buddy2_name){{ $entryForm->buddy2_name }}<br>
                所属団: {{ $entryForm->buddy2_dan }}@endif</td>
        </tr>

    </tbody>
</table>
